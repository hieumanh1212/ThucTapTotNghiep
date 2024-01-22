<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDonBan;
use App\Models\HoaDonNhap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_HomeController extends Controller
{
    public function ShowLayOutAdmin_Staff()
    {
        //request()->session()->put('User', 'Admin');
        session(['User' => 'Admin']);
        //session()->forget('User');
        return view('layout.Admin_NhanVien.layout');
    }
    //Thống kê doanh thu
    public function Index()
    {
        session(['User' => 'Admin']);
        // //request()->session()->put('User', 'Admin');
        // session(['User' => 'Admin']);
        // //session()->forget('User');
        // return view('layout.Admin_NhanVien.layout');

        // Ngày hôm nay
        $doanhthuhomnay = HoaDonBan::whereDate('ngay_tao_hoa_don', today())->where('tinh_trang_hoa_don', 'Đã hoàn thành')->sum('tong_tien_hdb');
        $sohoadonhomnay = HoaDonBan::whereDate('ngay_tao_hoa_don', today())->where('tinh_trang_hoa_don', 'Đã hoàn thành')->count();
        $sohoadonthangnay = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', now()->month)
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->count();
        // Tháng này
        $doanhthuthangnay = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', now()->month)
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        //Đổi định dạng
        $doanhthuhomnay_dinhdang = number_format($doanhthuhomnay, 0, ',', '.');
        $doanhthuthangnay_dinhdang = number_format($doanhthuthangnay, 0, ',', '.');

        // Biểu đồ trái
        //Năm hiện tại
        $totalsByMonth = [];

        // Duyệt qua từ tháng 1 đến tháng 12
        for ($month = 1; $month <= 12; $month++) {
            $total = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year)
                ->whereMonth('ngay_tao_hoa_don', $month)
                ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
                ->sum('tong_tien_hdb');


            // Lưu tổng số tiền của từng tháng vào mảng
            $totalsByMonth[$month] = $total;
        }

        //Năm hiện tại - 0
        $totalsByMonth0 = [];

        // Duyệt qua từ tháng 1 đến tháng 12
        for ($month = 1; $month <= 12; $month++) {
            $total = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year)
                ->whereMonth('ngay_tao_hoa_don', $month)
                ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
                ->sum('tong_tien_hdb');


            // Lưu tổng số tiền của từng tháng vào mảng
            $totalsByMonth0[$month] = $total;
        }

        //Năm hiện tại - 1
        $totalsByMonth1 = [];

        // Duyệt qua từ tháng 1 đến tháng 12
        for ($month = 1; $month <= 12; $month++) {
            $total = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 1)
                ->whereMonth('ngay_tao_hoa_don', $month)
                ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
                ->sum('tong_tien_hdb');


            // Lưu tổng số tiền của từng tháng vào mảng
            $totalsByMonth1[$month] = $total;
        }

        //Năm hiện tại - 2
        $totalsByMonth2 = [];

        // Duyệt qua từ tháng 1 đến tháng 12
        for ($month = 1; $month <= 12; $month++) {
            $total = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 2)
                ->whereMonth('ngay_tao_hoa_don', $month)
                ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
                ->sum('tong_tien_hdb');


            // Lưu tổng số tiền của từng tháng vào mảng
            $totalsByMonth2[$month] = $total;
        }


        //Biểu đồ phải so sánh 3 năm
        $totalsByYear = [];
        // Duyệt qua từ tháng 1 đến tháng 12
        for ($year = now()->year;; $year--) {
            $total = HoaDonBan::whereYear('ngay_tao_hoa_don', $year)
                ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
                ->sum('tong_tien_hdb');

            // Lưu tổng số tiền của từng tháng vào mảng
            $totalsByYear[$year] = $total;

            if ($year == now()->year - 2) {
                break;
            }
        }

        //Top sản phẩm bán chạy nhất
        $sanphambanchay = DB::table('chi_tiet_hoa_don_bans')
            ->select('san_phams.ma_san_pham', 'san_phams.ten_san_pham', DB::raw('SUM(chi_tiet_hoa_don_bans.so_luong_ban) as tong_so_luong'))
            ->join('hoa_don_bans', 'chi_tiet_hoa_don_bans.ma_hoa_don_ban', '=', 'hoa_don_bans.ma_hoa_don_ban')
            ->join('chi_tiet_san_phams', 'chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham', '=', 'chi_tiet_san_phams.ma_chi_tiet_san_pham')
            ->join('san_phams', 'chi_tiet_san_phams.ma_san_pham', '=', 'san_phams.ma_san_pham')
            ->where('hoa_don_bans.tinh_trang_hoa_don', '=', 'Đã hoàn thành')
            ->groupBy('san_phams.ma_san_pham', 'san_phams.ten_san_pham')
            ->get();

        //Khách hàng tiềm năng
        $khachhangtiemnang = DB::table('hoa_don_bans')
            ->select('hoa_don_bans.ma_khach_hang', 'khach_hangs.ten_khach_hang', 'khach_hangs.dien_thoai', 'khach_hangs.email', 'khach_hangs.dia_chi', DB::raw('COUNT(hoa_don_bans.ma_khach_hang) as so_lan_xuat_hien'))
            ->join('khach_hangs', 'hoa_don_bans.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
            ->where('hoa_don_bans.tinh_trang_hoa_don', 'Đã hoàn thành')
            ->groupBy('hoa_don_bans.ma_khach_hang', 'khach_hangs.ten_khach_hang', 'khach_hangs.dien_thoai', 'khach_hangs.email', 'khach_hangs.dia_chi')
            ->orderBy('so_lan_xuat_hien', 'desc')
            ->limit(3) // Giới hạn kết quả cho 3 bản ghi
            ->get();

        return view('Admin/ThongKe', compact('sohoadonhomnay', 'sohoadonthangnay', 'doanhthuhomnay_dinhdang', 'doanhthuthangnay_dinhdang', 'totalsByMonth', 'totalsByMonth0', 'totalsByMonth1', 'totalsByMonth2', 'totalsByYear', 'sanphambanchay', 'khachhangtiemnang'));
    }

    //Tính số lượng sản phẩm đã bán được trong quý gồm 3 tháng x y z
    public function SoLuongDaBan($x, $y, $z, $year)
    {
        $soluongdaban = DB::table('hoa_don_bans')
            ->select(DB::raw('SUM(so_luong_ban) as tong_ban'))
            ->join('chi_tiet_hoa_don_bans', 'hoa_don_bans.ma_hoa_don_ban', '=', 'chi_tiet_hoa_don_bans.ma_hoa_don_ban')
            ->where('hoa_don_bans.tinh_trang_hoa_don', 'Đã hoàn thành')
            ->whereYear('ngay_tao_hoa_don', $year)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [$x, $y, $z])
            ->get();
        return $soluongdaban;
    }

    //Tính tổng số lượng sản phẩm đã nhập trong quý gồm 3 tháng x y z
    public function TongSoLuongNhap($x, $y, $z, $year)
    {
        $soluongdanhap = DB::table('hoa_don_nhaps')
            ->select(DB::raw('SUM(so_luong_nhap) as tong_nhap'))
            ->join('chi_tiet_hoa_don_nhaps', 'hoa_don_nhaps.ma_hoa_don_nhap', '=', 'chi_tiet_hoa_don_nhaps.ma_hoa_don_nhap')
            ->whereYear('ngay_nhap', $year)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [$x, $y, $z])
            ->get();
        return $soluongdanhap;
    }

    //Thống kê lợi nhuận
    public function LoiNhuan()
    {
        // Năm hiện tại
        //Tiền nhập hàng
        $tiennhaphangquy1_hientai = HoaDonNhap::whereYear('ngay_nhap', now()->year)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [1, 2, 3])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy2_hientai = HoaDonNhap::whereYear('ngay_nhap', now()->year)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [4, 5, 6])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy3_hientai = HoaDonNhap::whereYear('ngay_nhap', now()->year)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [7, 8, 9])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy4_hientai = HoaDonNhap::whereYear('ngay_nhap', now()->year)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [10, 11, 12])
            ->sum('tong_tien_hdn');

        //Doanh thu
        $doanhthuquy1_hientai = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [1, 2, 3])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');

        $doanhthuquy2_hientai = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [4, 5, 6])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        $doanhthuquy3_hientai = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [7, 8, 9])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        $doanhthuquy4_hientai = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [10, 11, 12])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        //Đổi định dạng
        $loinhuanquy1_hientai = number_format($doanhthuquy1_hientai - $tiennhaphangquy1_hientai, 0, ',', '.');
        $loinhuanquy2_hientai = number_format($doanhthuquy2_hientai - $tiennhaphangquy2_hientai, 0, ',', '.');
        $loinhuanquy3_hientai = number_format($doanhthuquy3_hientai - $tiennhaphangquy3_hientai, 0, ',', '.');
        $loinhuanquy4_hientai = number_format($doanhthuquy4_hientai - $tiennhaphangquy4_hientai, 0, ',', '.');

        $tiennhaphangquy1_hientai_dinhdang = number_format($tiennhaphangquy1_hientai, 0, ',', '.');
        $tiennhaphangquy2_hientai_dinhdang = number_format($tiennhaphangquy2_hientai, 0, ',', '.');
        $tiennhaphangquy3_hientai_dinhdang = number_format($tiennhaphangquy3_hientai, 0, ',', '.');
        $tiennhaphangquy4_hientai_dinhdang = number_format($tiennhaphangquy4_hientai, 0, ',', '.');

        $doanhthuquy1_hientai_dinhdang = number_format($doanhthuquy1_hientai, 0, ',', '.');
        $doanhthuquy2_hientai_dinhdang = number_format($doanhthuquy2_hientai, 0, ',', '.');
        $doanhthuquy3_hientai_dinhdang = number_format($doanhthuquy3_hientai, 0, ',', '.');
        $doanhthuquy4_hientai_dinhdang = number_format($doanhthuquy4_hientai, 0, ',', '.');


        //Số lượng đã bán
        //Quý 1
        if ((int) $this->TongSoLuongNhap(1, 2, 3, now()->year)->first()->tong_nhap == 0) {
            $soluongdabanquy1_hientai = 0;
        } else {
            $soluongdabanquy1_hientai = (int) $this->SoLuongDaBan(1, 2, 3, now()->year)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(1, 2, 3, now()->year)->first()->tong_nhap;
        }
        //Quý 2
        if ((int) $this->TongSoLuongNhap(4, 5, 6, now()->year)->first()->tong_nhap == 0) {
            $soluongdabanquy2_hientai = 0;
        } else {
            $soluongdabanquy2_hientai = (int) $this->SoLuongDaBan(4, 5, 6, now()->year)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(4, 5, 6, now()->year)->first()->tong_nhap;
        }
        //Quý 3
        if ((int) $this->TongSoLuongNhap(7, 8, 9, now()->year)->first()->tong_nhap == 0) {
            $soluongdabanquy3_hientai = 0;
        } else {
            $soluongdabanquy3_hientai = (int) $this->SoLuongDaBan(7, 8, 9, now()->year)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(7, 8, 9, now()->year)->first()->tong_nhap;
        }
        //Quý 4
        if ((int) $this->TongSoLuongNhap(10, 11, 12, now()->year)->first()->tong_nhap == 0) {
            $soluongdabanquy4_hientai = 0;
        } else {
            $soluongdabanquy4_hientai = (int) $this->SoLuongDaBan(10, 11, 12, now()->year)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(10, 11, 12, now()->year)->first()->tong_nhap;
        }

        // Năm hiện tại - 1
        //Tiền nhập hàng
        $tiennhaphangquy1_hientai1 = HoaDonNhap::whereYear('ngay_nhap', now()->year - 1)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [1, 2, 3])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy2_hientai1 = HoaDonNhap::whereYear('ngay_nhap', now()->year - 1)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [4, 5, 6])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy3_hientai1 = HoaDonNhap::whereYear('ngay_nhap', now()->year - 1)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [7, 8, 9])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy4_hientai1 = HoaDonNhap::whereYear('ngay_nhap', now()->year - 1)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [10, 11, 12])
            ->sum('tong_tien_hdn');

        //Doanh thu
        $doanhthuquy1_hientai1 = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 1)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [1, 2, 3])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');

        $doanhthuquy2_hientai1 = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 1)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [4, 5, 6])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        $doanhthuquy3_hientai1 = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 1)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [7, 8, 9])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        $doanhthuquy4_hientai1 = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 1)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [10, 11, 12])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        //Đổi định dạng
        $loinhuanquy1_hientai1 = number_format($doanhthuquy1_hientai1 - $tiennhaphangquy1_hientai1, 0, ',', '.');
        $loinhuanquy2_hientai1 = number_format($doanhthuquy2_hientai1 - $tiennhaphangquy2_hientai1, 0, ',', '.');
        $loinhuanquy3_hientai1 = number_format($doanhthuquy3_hientai1 - $tiennhaphangquy3_hientai1, 0, ',', '.');
        $loinhuanquy4_hientai1 = number_format($doanhthuquy4_hientai1 - $tiennhaphangquy4_hientai1, 0, ',', '.');

        $tiennhaphangquy1_hientai1_dinhdang = number_format($tiennhaphangquy1_hientai1, 0, ',', '.');
        $tiennhaphangquy2_hientai1_dinhdang = number_format($tiennhaphangquy2_hientai1, 0, ',', '.');
        $tiennhaphangquy3_hientai1_dinhdang = number_format($tiennhaphangquy3_hientai1, 0, ',', '.');
        $tiennhaphangquy4_hientai1_dinhdang = number_format($tiennhaphangquy4_hientai1, 0, ',', '.');

        $doanhthuquy1_hientai1_dinhdang = number_format($doanhthuquy1_hientai1, 0, ',', '.');
        $doanhthuquy2_hientai1_dinhdang = number_format($doanhthuquy2_hientai1, 0, ',', '.');
        $doanhthuquy3_hientai1_dinhdang = number_format($doanhthuquy3_hientai1, 0, ',', '.');
        $doanhthuquy4_hientai1_dinhdang = number_format($doanhthuquy4_hientai1, 0, ',', '.');

        //Số lượng đã bán
        //Quý 1
        if ((int) $this->TongSoLuongNhap(1, 2, 3, now()->year - 1)->first()->tong_nhap == 0) {
            $soluongdabanquy1_hientai1 = 0;
        } else {
            $soluongdabanquy1_hientai1 = (int) $this->SoLuongDaBan(1, 2, 3, now()->year - 1)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(1, 2, 3, now()->year - 1)->first()->tong_nhap;
        }
        //Quý 2
        if ((int) $this->TongSoLuongNhap(4, 5, 6, now()->year - 1)->first()->tong_nhap == 0) {
            $soluongdabanquy2_hientai1 = 0;
        } else {
            $soluongdabanquy2_hientai1 = (int) $this->SoLuongDaBan(4, 5, 6, now()->year - 1)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(4, 5, 6, now()->year - 1)->first()->tong_nhap;
        }
        //Quý 3
        if ((int) $this->TongSoLuongNhap(7, 8, 9, now()->year - 1)->first()->tong_nhap == 0) {
            $soluongdabanquy3_hientai1 = 0;
        } else {
            $soluongdabanquy3_hientai1 = (int) $this->SoLuongDaBan(7, 8, 9, now()->year - 1)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(7, 8, 9, now()->year - 1)->first()->tong_nhap;
        }
        //Quý 4
        if ((int) $this->TongSoLuongNhap(10, 11, 12, now()->year - 1)->first()->tong_nhap == 0) {
            $soluongdabanquy4_hientai1 = 0;
        } else {
            $soluongdabanquy4_hientai1 = (int) $this->SoLuongDaBan(10, 11, 12, now()->year - 1)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(10, 11, 12, now()->year - 1)->first()->tong_nhap;
        }

        // Năm hiện tại - 2
        //Tiền nhập hàng
        $tiennhaphangquy1_hientai2 = HoaDonNhap::whereYear('ngay_nhap', now()->year - 2)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [1, 2, 3])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy2_hientai2 = HoaDonNhap::whereYear('ngay_nhap', now()->year - 2)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [4, 5, 6])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy3_hientai2 = HoaDonNhap::whereYear('ngay_nhap', now()->year - 2)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [7, 8, 9])
            ->sum('tong_tien_hdn');
        $tiennhaphangquy4_hientai2 = HoaDonNhap::whereYear('ngay_nhap', now()->year - 2)
            ->whereIn(DB::raw('MONTH(ngay_nhap)'), [10, 11, 12])
            ->sum('tong_tien_hdn');

        //Doanh thu
        $doanhthuquy1_hientai2 = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 2)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [1, 2, 3])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');

        $doanhthuquy2_hientai2 = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 2)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [4, 5, 6])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        $doanhthuquy3_hientai2 = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 2)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [7, 8, 9])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');
        $doanhthuquy4_hientai2 = HoaDonBan::whereYear('ngay_tao_hoa_don', now()->year - 2)
            ->whereIn(DB::raw('MONTH(ngay_tao_hoa_don)'), [10, 11, 12])
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->sum('tong_tien_hdb');


        //Số lượng đã bán
        //Quý 1
        if ((int) $this->TongSoLuongNhap(1, 2, 3, now()->year - 2)->first()->tong_nhap == 0) {
            $soluongdabanquy1_hientai2 = 0;
        } else {
            $soluongdabanquy1_hientai2 = (int) $this->SoLuongDaBan(1, 2, 3, now()->year - 2)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(1, 2, 3, now()->year - 2)->first()->tong_nhap;
        }
        //Quý 2
        if ((int) $this->TongSoLuongNhap(4, 5, 6, now()->year - 2)->first()->tong_nhap == 0) {
            $soluongdabanquy2_hientai2 = 0;
        } else {
            $soluongdabanquy2_hientai2 = (int) $this->SoLuongDaBan(4, 5, 6, now()->year - 2)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(4, 5, 6, now()->year - 2)->first()->tong_nhap;
        }
        //Quý 3
        if ((int) $this->TongSoLuongNhap(7, 8, 9, now()->year - 2)->first()->tong_nhap == 0) {
            $soluongdabanquy3_hientai2 = 0;
        } else {
            $soluongdabanquy3_hientai2 = (int) $this->SoLuongDaBan(7, 8, 9, now()->year - 2)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(7, 8, 9, now()->year - 2)->first()->tong_nhap;
        }
        //Quý 4
        if ((int) $this->TongSoLuongNhap(10, 11, 12, now()->year - 2)->first()->tong_nhap == 0) {
            $soluongdabanquy4_hientai2 = 0;
        } else {
            $soluongdabanquy4_hientai2 = (int) $this->SoLuongDaBan(10, 11, 12, now()->year - 2)->first()->tong_ban * 100 / (int) $this->TongSoLuongNhap(10, 11, 12, now()->year - 2)->first()->tong_nhap;
        }



        //Đổi định dạng
        $loinhuanquy1_hientai2 = number_format($doanhthuquy1_hientai2 - $tiennhaphangquy1_hientai2, 0, ',', '.');
        $loinhuanquy2_hientai2 = number_format($doanhthuquy2_hientai2 - $tiennhaphangquy2_hientai2, 0, ',', '.');
        $loinhuanquy3_hientai2 = number_format($doanhthuquy3_hientai2 - $tiennhaphangquy3_hientai2, 0, ',', '.');
        $loinhuanquy4_hientai2 = number_format($doanhthuquy4_hientai2 - $tiennhaphangquy4_hientai2, 0, ',', '.');

        $tiennhaphangquy1_hientai2_dinhdang = number_format($tiennhaphangquy1_hientai2, 0, ',', '.');
        $tiennhaphangquy2_hientai2_dinhdang = number_format($tiennhaphangquy2_hientai2, 0, ',', '.');
        $tiennhaphangquy3_hientai2_dinhdang = number_format($tiennhaphangquy3_hientai2, 0, ',', '.');
        $tiennhaphangquy4_hientai2_dinhdang = number_format($tiennhaphangquy4_hientai2, 0, ',', '.');

        $doanhthuquy1_hientai2_dinhdang = number_format($doanhthuquy1_hientai2, 0, ',', '.');
        $doanhthuquy2_hientai2_dinhdang = number_format($doanhthuquy2_hientai2, 0, ',', '.');
        $doanhthuquy3_hientai2_dinhdang = number_format($doanhthuquy3_hientai2, 0, ',', '.');
        $doanhthuquy4_hientai2_dinhdang = number_format($doanhthuquy4_hientai2, 0, ',', '.');
        return view(
            'Admin/ThongKeLoiNhuan',
            compact(
                'doanhthuquy1_hientai_dinhdang',
                'doanhthuquy2_hientai_dinhdang',
                'doanhthuquy3_hientai_dinhdang',
                'doanhthuquy4_hientai_dinhdang',
                'tiennhaphangquy1_hientai_dinhdang',
                'tiennhaphangquy2_hientai_dinhdang',
                'tiennhaphangquy3_hientai_dinhdang',
                'tiennhaphangquy4_hientai_dinhdang',
                'loinhuanquy1_hientai',
                'loinhuanquy2_hientai',
                'loinhuanquy3_hientai',
                'loinhuanquy4_hientai',
                'soluongdabanquy1_hientai',
                'soluongdabanquy2_hientai',
                'soluongdabanquy3_hientai',
                'soluongdabanquy4_hientai',
                'doanhthuquy1_hientai1_dinhdang',
                'doanhthuquy2_hientai1_dinhdang',
                'doanhthuquy3_hientai1_dinhdang',
                'doanhthuquy4_hientai1_dinhdang',
                'tiennhaphangquy1_hientai1_dinhdang',
                'tiennhaphangquy2_hientai1_dinhdang',
                'tiennhaphangquy3_hientai1_dinhdang',
                'tiennhaphangquy4_hientai1_dinhdang',
                'loinhuanquy1_hientai1',
                'loinhuanquy2_hientai1',
                'loinhuanquy3_hientai1',
                'loinhuanquy4_hientai1',
                'soluongdabanquy1_hientai1',
                'soluongdabanquy2_hientai1',
                'soluongdabanquy3_hientai1',
                'soluongdabanquy4_hientai1',
                'doanhthuquy1_hientai2_dinhdang',
                'doanhthuquy2_hientai2_dinhdang',
                'doanhthuquy3_hientai2_dinhdang',
                'doanhthuquy4_hientai2_dinhdang',
                'tiennhaphangquy1_hientai2_dinhdang',
                'tiennhaphangquy2_hientai2_dinhdang',
                'tiennhaphangquy3_hientai2_dinhdang',
                'tiennhaphangquy4_hientai2_dinhdang',
                'loinhuanquy1_hientai2',
                'loinhuanquy2_hientai2',
                'loinhuanquy3_hientai2',
                'loinhuanquy4_hientai2',
                'soluongdabanquy1_hientai2',
                'soluongdabanquy2_hientai2',
                'soluongdabanquy3_hientai2',
                'soluongdabanquy4_hientai2',
            )
        );
    }

    //Thống kê hóa đơn
    public function HoaDon()
    {
        //Tháng hiện tại
        $thanghientai = date('m');

        $sohoadondahoanthanh_hientai = DB::table('hoa_don_bans')
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', $thanghientai)
            ->count('ma_hoa_don_ban');

        $sohoadondanggiao_hientai = DB::table('hoa_don_bans')
            ->where('tinh_trang_hoa_don', 'Đang giao')
            ->whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', $thanghientai)
            ->count('ma_hoa_don_ban');

        $sohoadondahuy_hientai = DB::table('hoa_don_bans')
            ->where('tinh_trang_hoa_don', 'Đã hủy')
            ->whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', $thanghientai)
            ->count('ma_hoa_don_ban');

        $hoadondahuy = DB::table('hoa_don_bans')
            ->select('ma_hoa_don_ban', 'ngay_tao_hoa_don', 'tong_tien_hdb', 'ghi_chu')
            ->where('tinh_trang_hoa_don', 'Đã hủy')
            ->whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', $thanghientai)
            ->get();

        return view('Admin/ThongKeHoaDon', compact('thanghientai', 'sohoadondahoanthanh_hientai', 'sohoadondanggiao_hientai', 'sohoadondahuy_hientai', 'hoadondahuy'));
    }

    public function ThongKeHoaDon(Request $request)
    {
        $thang = $request->input('thang');
        //Tháng hiện tại

        $sohoadondahoanthanh = DB::table('hoa_don_bans')
            ->where('tinh_trang_hoa_don', 'Đã hoàn thành')
            ->whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', $thang)
            ->count('ma_hoa_don_ban');

        $sohoadondanggiao = DB::table('hoa_don_bans')
            ->where('tinh_trang_hoa_don', 'Đang giao')
            ->whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', $thang)
            ->count('ma_hoa_don_ban');

        $sohoadondahuy = DB::table('hoa_don_bans')
            ->where('tinh_trang_hoa_don', 'Đã hủy')
            ->whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', $thang)
            ->count('ma_hoa_don_ban');

        $hoadondahuy = DB::table('hoa_don_bans')
            ->select('ma_hoa_don_ban', 'ngay_tao_hoa_don', 'tong_tien_hdb', 'ghi_chu')
            ->where('tinh_trang_hoa_don', 'Đã hủy')
            ->whereYear('ngay_tao_hoa_don', now()->year)
            ->whereMonth('ngay_tao_hoa_don', $thang)
            ->get();

        return response()->json([
            'sohoadondahoanthanh' => $sohoadondahoanthanh,
            'sohoadondanggiao' => $sohoadondanggiao,
            'sohoadondahuy' => $sohoadondahuy,
            'hoadondahuy' => $hoadondahuy
        ]);
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
