<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDonBan;
use App\Models\ChiTietSanPham;
use App\Models\HoaDonBan;
use App\Models\MessageResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartAPIController extends Controller
{
    //--------------------------Main API--------------------------------------//

    //api add to cart
    public function addToCart(Request $request)
    {
        try {
            $order = new HoaDonBan();
            $user_id = $this->getUserId($request);
            $checkOrder = $order->getUserCartId($user_id);
            //no cart
            if ($checkOrder === -1) {
                return $this->userHasNotCart($request, $user_id);
            } //has cart
            else {
                return $this->userHasCart($request, $checkOrder);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //update quantity
    public function updateQuantityInCart(Request $request)
    {
        $order = new HoaDonBan();
        $orderDetail = new ChiTietHoaDonBan();
        $productDetail = new ChiTietSanPham();
        $productId = $request->productId;
        $sizeId = $request->sizeId;
        $colorId = $request->colorId;
        $quantity = $request->quantity;
        $unitPrice = $request->unitPrice;

        $productDetail = $productDetail->getProductDetailByProductInfo($productId, $sizeId, $colorId);
        $checkQuantity = $this->IsValidQuantityOfProduct($productDetail->ma_chi_tiet_san_pham, $quantity);
        if (!$checkQuantity) {
            return "Số lượng sản phẩm trong kho không đủ";
        }
        $orderId = $order->getUserCartId($this->getUserId($request));
        $checkExistsOrderDetail = $orderDetail->checkProductExistInOrder($productDetail->ma_chi_tiet_san_pham, $orderId);
        $newQuantity = (int)$quantity;
        return tap(ChiTietHoaDonBan::where(['ma_hoa_don_ban' => $orderId, 'ma_chi_tiet_san_pham' =>
            $productDetail->ma_chi_tiet_san_pham]))->update([
            'so_luong_ban' => $newQuantity,
            'thanh_tien' => $newQuantity * $unitPrice
        ])->first();
    }

    //delete item in cart
    public function deleteCartItem(Request $request)
    {
        $productDetail = new ChiTietSanPham();
        $order = new HoaDonBan();
        $orderId = $order->getUserCartId($this->getUserId($request));
        $productId = $request->productId;
        $sizeId = $request->sizeId;
        $colorId = $request->colorId;
        $productDetail = $productDetail->getProductDetailByProductInfo($productId, $sizeId, $colorId);
        $productDetailId = $productDetail->ma_chi_tiet_san_pham;
        ChiTietHoaDonBan::where(['ma_chi_tiet_san_pham' => $productDetailId, 'ma_hoa_don_ban' => $orderId])->delete();
        return 'delete successfully';
    }

    public function getUserCartItem(Request $request)
    {
//        $cartItems =
//        return "thinhdz";
        $order = new HoaDonBan();
        $orderDetail = new ChiTietHoaDonBan();
        $orderId = $order->getUserCartId($this->getUserId($request));
        if ($orderId == -1) {
            return "Chưa có sản phẩm nào";
        } else {
            return $orderDetail->getProductInCartByOrderId($orderId);
        }
    }

    public function getSizeOfCart(Request $request)
    {
        return $this->getUserCartItem($request) == "Chưa có sản phẩm nào" ? 0 : count($this->getUserCartItem($request));
    }

    public function applyVoucher(Request $request)
    {
        $order = new HoaDonBan();
        $userId = $this->getUserId($request);
        $orderId = $order->getUserCartId($userId);

    }

    //--------------------------Support function--------------------------------------//
    public function getUserId(Request $request)
    {
        return session('userInfo.ma_khach_hang');
    }

    public function userHasCart(Request $request, $orderId)
    {
        $orderDetail = new ChiTietHoaDonBan();
        $productDetail = new ChiTietSanPham();
        $productId = $request->productId;
        $sizeId = $request->sizeId;
        $colorId = $request->colorId;
        $quantity = $request->quantity;
        $unitPrice = $request->unitPrice;

        $productDetail = $productDetail->getProductDetailByProductInfo($productId, $sizeId, $colorId);
        $checkQuantity = $this->IsValidQuantityOfProduct($productDetail->ma_chi_tiet_san_pham, $quantity);
        if (!$checkQuantity) {
//            return response()->json(['status'=>400,'message'=>"Số lượng sản phẩm trong kho không đủ"]) ;
//            return response()->json(new MessageResponse(400,"Số lượng sản phẩm trong kho không đủ"));
            return "Số lượng sản phẩm trong kho không đủ";
        }
        $checkExistsOrderDetail = $orderDetail->checkProductExistInOrder($productDetail->ma_chi_tiet_san_pham, $orderId);
        //product does not exist in order
        if ($checkExistsOrderDetail == null) {
            $dataOfOrderDetails = [
                'ma_hoa_don_ban' => $orderId,
                'ma_chi_tiet_san_pham' => $productDetail->ma_chi_tiet_san_pham,
                'so_luong_ban' => $quantity,
                'thanh_tien' => (int)$unitPrice * (int)$quantity
            ];
            return ChiTietHoaDonBan::create($dataOfOrderDetails);
        } else {
            $newQuantity = (int)$checkExistsOrderDetail->so_luong_ban + (int)$quantity;
            return tap(ChiTietHoaDonBan::where(['ma_hoa_don_ban' => $orderId, 'ma_chi_tiet_san_pham' =>
                $productDetail->ma_chi_tiet_san_pham]))->update([
                'so_luong_ban' => $newQuantity,
                'thanh_tien' => $newQuantity * $unitPrice
            ])->first();
        }

    }

    public function userHasNotCart(Request $request, $user_id)
    {
        $commonFunctions = new CommonFunction();
        $productDetail = new ChiTietSanPham();
        $productId = $request->productId;
        $sizeId = $request->sizeId;
        $colorId = $request->colorId;
        $quantity = $request->quantity;
        $unitPrice = $request->unitPrice;

        $productDetail = $productDetail->getProductDetailByProductInfo($productId, $sizeId, $colorId);
        $checkQuantity = $this->IsValidQuantityOfProduct($productDetail->ma_chi_tiet_san_pham, $quantity);
        if (!$checkQuantity) {
//            return response()->json(['status'=>400,'message'=>"Số lượng sản phẩm trong kho không đủ"]) ;
            return "Số lượng sản phẩm trong kho không đủ";
        }
        $orderId = $commonFunctions->autoGenerateId('HDB', HoaDonBan::class, 'ma_hoa_don_ban');
        $dataOfOrder = [
            'ma_hoa_don_ban' => $orderId,
            'ngay_tao_hoa_don' => Carbon::now(),
            'trang_thai_thanh_toan' => 0,
            'tinh_trang_hoa_don' => 'Thêm giỏ hàng',
            'ma_khach_hang' => $user_id
        ];
        HoaDonBan::create($dataOfOrder);
        $dataOfOrderDetails = [
            'ma_hoa_don_ban' => $orderId,
            'ma_chi_tiet_san_pham' => $productDetail->ma_chi_tiet_san_pham,
            'so_luong_ban' => $quantity,
            'thanh_tien' => (int)$unitPrice * (int)$quantity
        ];
        return ChiTietHoaDonBan::create($dataOfOrderDetails);
    }

    public function IsValidQuantityOfProduct($productDetailsId, $quantity)
    {
        $productDetail = ChiTietSanPham::where('ma_chi_tiet_san_pham', '=', $productDetailsId)->first();
        if ((int)$productDetail->so_luong >= $quantity)
            return true;
        else
            return false;
    }
}
