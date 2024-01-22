<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\HoaDonBan;
use App\Models\SanPham;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        dd(session('userInfo.ma_khach_hang'));
        $product = new SanPham();
        $products = $product->getProducts();
//        dd($products);
        if(isset($_GET['payment'])) {
            $order = new HoaDonBan();
            $userId =session('userInfo.ma_khach_hang');
            $fullName = $_GET['name'];
            $phoneNumber = $_GET['phone'];
            $address = $_GET['address'];
            $notes = $_GET['note'];
            $payment = $_GET['payment']=="cash"?0:1;
            $total = $_GET['total'];
            $order->updateOrderInfo($userId,$fullName,$phoneNumber,$address,$notes,$payment,$total);
        }
        $lastestProducts = SanPham::select('san_phams.*', 'the_loais.ten_the_loai')
            ->join('the_loais', 'san_phams.ma_the_loai', '=', 'the_loais.ma_the_loai')
            ->orderBy('created_at', 'desc')->take(4)->get();

        $news = TinTuc::orderBy('created_at', 'desc')->take(3)->get();

        return view('client.index', [
            'products' => $products,
            'lastestProducts' => $lastestProducts,
            'news' => $news,
        ]);
//        $products = $product->getAllProducts();
//        $categories = TheLoai::all();
    }

    //Khách hàng hủy hóa đơn
    public function huyHoaDon(Request $request)
    {
        $maHoaDon = $request->input('maHoaDon');
        $reason = $request->input('reason');

        $hoaDon = HoaDonBan::where('ma_hoa_don_ban', $maHoaDon)->first();

        if ($hoaDon) {
            $hoaDon->tinh_trang_hoa_don = 'Đã hủy';
            $hoaDon->ghi_chu = $reason;
            $hoaDon->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }
    }

    public function getProductDetailByIdForQuickViewModal($id)
    {
        $productDetail = SanPham::with(['details', 'colors', 'sizes', 'images'])
            ->where('ma_san_pham', $id)
            ->first();

        return response()->json($productDetail);

    }
}
