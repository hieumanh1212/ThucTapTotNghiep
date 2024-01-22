<?php

namespace App\Http\Controllers\Client\Api;

use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDonBan;
use App\Models\ChiTietSanPham;
use App\Models\SanPhamYeuThich;
use Exception;
use Illuminate\Http\Request;

class WishlistAPIController extends Controller
{
    public function addToWishlist(Request $request)
    {
        try {
            $productDetail = new ChiTietSanPham();
            $productId = $request->productId;
            $sizeId = $request->sizeId;
            $colorId = $request->colorId;
            $userId = session('userInfo.ma_khach_hang');
            $productDetail = $productDetail->getProductDetailByProductInfo($productId, $sizeId, $colorId);
            $productDetailId = $productDetail->ma_chi_tiet_san_pham;
//        return $productDetailId;
            $dataAddToWishlist = [
                'ma_chi_tiet_san_pham' => $productDetailId,
                'ma_khach_hang' => $userId
            ];
//        return $dataAddToWishlist;
            return SanPhamYeuThich::create($dataAddToWishlist);
        }catch (\Exception $e) {
            return "Sản phẩm này đã có trong yêu thích";
        }
    }
    public function getAllProductInWishlist(Request $request){
        $wishlist = new SanPhamYeuThich();
        $userId = $this->getUserId($request);
        return $wishlist->getListWishList($userId);
    }
    public function deleteWishlistItem(Request $request){
        $userId = $this->getUserId($request);
        $productDetailId = $request->productDetailId;
        SanPhamYeuThich::where(['ma_chi_tiet_san_pham'=>$productDetailId,'ma_khach_hang'=>$userId])->delete();
        return 'delete successfully';
    }
    public function getSizeOfWishList(Request $request): int{
        return  count($this->getAllProductInWishlist($request));
    }


    public function getUserId()
    {
        return session('userInfo.ma_khach_hang');
    }
}
