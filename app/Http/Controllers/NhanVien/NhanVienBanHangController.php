<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\HoaDonBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\NhanVien;
use Illuminate\Support\Facades\Hash;


class NhanVienBanHangController extends Controller
{
    public function index()
    {
        session(['User' => 'NhanVienBanHang']);

        $danhsachsanpham = DB::table('san_phams')
            ->join('chi_tiet_san_phams', 'san_phams.ma_san_pham', '=', 'chi_tiet_san_phams.ma_san_pham')
            ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
            ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
            ->select('san_phams.ma_san_pham', 'chi_tiet_san_phams.ma_chi_tiet_san_pham', 'san_phams.ten_san_pham', 'mau_sacs.mau', 'sizes.size', 'chi_tiet_san_phams.so_luong')
            ->orderBy('san_phams.ten_san_pham')
            ->orderBy('chi_tiet_san_phams.ma_chi_tiet_san_pham')
            ->get();


        return view('NhanVien.NhanVienBanHang.NhanVienBanHang', compact('danhsachsanpham'));
    }
    public function DonHangChoXacNhan()
    {
        session(['User' => 'NhanVienBanHang']);
        $hoadonchoxacnhan = DB::table('hoa_don_bans')
            ->join('khach_hangs', 'hoa_don_bans.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
            ->select('hoa_don_bans.ma_hoa_don_ban', 'ngay_tao_hoa_don', 'khach_hangs.ten_khach_hang', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'tong_tien_hdb', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
            ->where('tinh_trang_hoa_don', 'Chờ xác nhận')
            ->get();


        return view('NhanVien.NhanVienBanHang.DonHangChoXacNhan', compact('hoadonchoxacnhan'));
    }

    //Xác nhận đơn hàng đang chờ xác nhận
    public function xacNhanDon(Request $request)
    {
        $maHoaDon = $request->input('maHoaDon');
        $maNhanVien = $request->input('maNhanVien');
        $hoaDon = HoaDonBan::where('ma_hoa_don_ban', $maHoaDon)->first();

        if ($hoaDon) {
            $hoaDon->tinh_trang_hoa_don = 'Đang giao';
            $hoaDon->ma_nhan_vien = $maNhanVien;
            $hoaDon->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }
    }

    public function DonHangDangGiao()
    {
        session(['User' => 'NhanVienBanHang']);
        $hoadondanggiao = DB::table('hoa_don_bans')
            ->join('khach_hangs', 'hoa_don_bans.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
            ->select('hoa_don_bans.ma_hoa_don_ban', 'ngay_tao_hoa_don', 'khach_hangs.ten_khach_hang', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'tong_tien_hdb', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
            ->where('ma_nhan_vien', session()->get('userInfo')->ma_nhan_vien)
            ->where('tinh_trang_hoa_don', 'Đang giao')
            ->get();


        return view('NhanVien.NhanVienBanHang.DonHangDangGiao', compact('hoadondanggiao'));
    }

    //Hoàn thành đơn hàng
    public function hoanThanhDon(Request $request)
    {
        $maHoaDon = $request->input('maHoaDon');
        $hoaDon = HoaDonBan::where('ma_hoa_don_ban', $maHoaDon)->first();

        if ($hoaDon) {
            $hoaDon->tinh_trang_hoa_don = 'Đã hoàn thành';
            $hoaDon->trang_thai_thanh_toan = 1;
            $hoaDon->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }
    }

    public function DonHangDaHoanThanh()
    {
        session(['User' => 'NhanVienBanHang']);
        $hoadondahoanthanh = DB::table('hoa_don_bans')
            ->join('khach_hangs', 'hoa_don_bans.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
            ->select('hoa_don_bans.ma_hoa_don_ban', 'ngay_tao_hoa_don', 'khach_hangs.ten_khach_hang', 'trang_thai_thanh_toan', 'tinh_trang_hoa_don', 'tong_tien_hdb', 'dia_chi_giao_hang', 'so_dien_thoai_nguoi_nhan', 'khach_hangs.email')
            ->where('ma_nhan_vien', session()->get('userInfo')->ma_nhan_vien)
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->get();


        return view('NhanVien.NhanVienBanHang.DonHangDaHoanThanh', compact('hoadondahoanthanh'));
    }


    public function showmodal2(Request $request)
    {
        $maHoaDon = $request->input('maHoaDon');
        $tinhtrang = $request->input('tinhTrang');
        $invoiceDetails = DB::table('hoa_don_bans')
            ->join('chi_tiet_hoa_don_bans', 'hoa_don_bans.ma_hoa_don_ban', '=', 'chi_tiet_hoa_don_bans.ma_hoa_don_ban')
            ->join('chi_tiet_san_phams', 'chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham', '=', 'chi_tiet_san_phams.ma_chi_tiet_san_pham')
            ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
            ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
            ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
            ->select(
                'hoa_don_bans.ngay_tao_hoa_don',
                'san_phams.ten_san_pham',
                'san_phams.anh_dai_dien',
                'sizes.size',
                'mau_sacs.mau',
                DB::raw('(chi_tiet_hoa_don_bans.thanh_tien / chi_tiet_hoa_don_bans.so_luong_ban) as giaban'),
                'chi_tiet_hoa_don_bans.so_luong_ban',
                'chi_tiet_hoa_don_bans.thanh_tien',
                'hoa_don_bans.tong_tien_hdb'
            )
            ->where('tinh_trang_hoa_don', $tinhtrang)
            ->where('hoa_don_bans.ma_hoa_don_ban', $maHoaDon)
            ->get();



        // Kiểm tra xem collection có dữ liệu hay không
        if ($invoiceDetails->isEmpty()) {
            // Trả về JSON thông báo nếu không tìm thấy hóa đơn
            return response()->json(['error' => 'Invoice not found'], 404);
        }

        // Trả về dữ liệu hóa đơn dưới dạng JSON
        return response()->json($invoiceDetails);
    }
}
