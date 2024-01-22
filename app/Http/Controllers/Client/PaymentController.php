<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\ChiTietHoaDonBan;
use App\Models\ChiTietSanPham;
use App\Models\HoaDonBan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function showCheckoutView(Request $request){
        $order = new HoaDonBan();
        $orderDetail = new ChiTietHoaDonBan();
        $user = session('userInfo');
        $orderId = $order->getUserCartId(session('userInfo.ma_khach_hang'));
        $orderData = $orderDetail->getProductInCartByOrderId($orderId);
        if(count($orderData)==0){
            return redirect('carts');
        }
        $total=0;
        for ($i = 0; $i < count($orderData); $i++) {
            $total +=(int) $orderData[$i]->thanh_tien;
        }
//        dd($orderData);
        return view('client/Checkout',['total' => $total,'user'=>$user,'products'=>$orderData]);
    }
    public function paymentMethod(PaymentRequest $request){
        $productDetails = new ChiTietSanPham();
        $paymentOption = $request->get('payment');
        $fullName = $request->get('fullName');
        $phoneNumber = $request->get('phoneNumber');
        $address = $request->get('address');
        $note = $request->get('note');
        $total = $request->get('total');
        $products = json_decode($request->input('products'));
        foreach ($products as $product){
            $productDetails->updateProductQuantity($product->ma_chi_tiet_san_pham,$product->so_luong_ban);
        }
//        dd($products);
        if($paymentOption=="cash"){
            $strRedirect = "?payment=cash&name=$fullName&phone=$phoneNumber&address=$address&note=$note&total=$total";
            return redirect($strRedirect);
        }else{
           $this->VNPayPayment($request,$fullName,$phoneNumber,$address,$note,$total);
        }
    }
    public function VNPayPayment(PaymentRequest $request,$fullName,$phoneNumber,$address,$note,$total){

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/?payment=vnpay&name=$fullName&phone=$phoneNumber&address=$address&note=$note&total=$total";
        $vnp_TmnCode = "5XKHRT4L";//Mã website tại VNPAY
        $vnp_HashSecret = "HBGPBVPWWQNLNTXBLXNCWTGZNDPCXEGC"; //Chuỗi bí mật

        $vnp_TxnRef = Str::uuid()->toString(); //$request->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toan hoa don";
        $vnp_OrderType = " clothes shop";
        $vnp_Amount = $request->total * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            dd(json_encode($returnData));
        }

    }
}
