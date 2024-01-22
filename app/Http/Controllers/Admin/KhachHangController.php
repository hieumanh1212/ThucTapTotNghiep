<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use App\Models\HoaDonBan;
use App\Http\Requests\StoreKhachHangRequest;
use App\Http\Requests\UpdateKhachHangRequest;
use Illuminate\Support\Facades\DB;
class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListKhachHang= DB::table('khach_hangs')
                    ->select('khach_hangs.*');
        if(isset(request()->Key_KhachHang))
        {
            $ListKhachHang = $ListKhachHang->where('ma_khach_hang', 'like', '%'.request()->Key_KhachHang.'%');
            $ListKhachHang = $ListKhachHang->orwhere('ten_khach_hang', 'like', '%'.request()->Key_KhachHang.'%');
            $ListKhachHang = $ListKhachHang->orwhere('ngay_sinh', 'like', '%'.request()->Key_KhachHang.'%');
            $ListKhachHang = $ListKhachHang->orwhere('dia_chi', 'like', '%'.request()->Key_KhachHang.'%');
            $ListKhachHang = $ListKhachHang->orwhere('dien_thoai', 'like', '%'.request()->Key_KhachHang.'%');
            $ListKhachHang = $ListKhachHang->orwhere('gioi_tinh', 'like', '%'.request()->Key_KhachHang.'%');
            $ListKhachHang = $ListKhachHang->orwhere('email', 'like', '%'.request()->Key_KhachHang.'%');
        }
        if(isset(request()->NameSort))
            $ListKhachHang = $ListKhachHang->orderBy(request()->NameSort, request()->Sort);
        $ListKhachHang = $ListKhachHang->latest('created_at')->paginate(5);
        return view('Admin.KhachHang.KhachHang', ['Data_KhachHang'=> $ListKhachHang,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKhachHangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKhachHangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function show( $makhachHang)
    {
        $khachhang = DB::table('khach_hangs')
        ->join('tai_khoans', 'khach_hangs.ma_khach_hang', '=', 'tai_khoans.ma_khach_hang')
        ->select('khach_hangs.*', 'tai_khoans.*')
        ->where('khach_hangs.ma_khach_hang', '=', $makhachHang)
        ->first();


        $listHDB =  DB::table('hoa_don_Bans')
                ->join('khach_hangs', 'khach_hangs.ma_khach_hang', '=', 'hoa_don_Bans.ma_khach_hang')
                ->join('nhan_viens', 'nhan_viens.ma_nhan_vien', '=', 'hoa_don_Bans.ma_nhan_vien')
                ->leftjoin('vouchers', 'vouchers.ma_voucher', '=', 'hoa_don_Bans.ma_voucher')
                ->select('hoa_don_Bans.*', 'khach_hangs.*', 'vouchers.*', 'nhan_viens.*')
                ->where('khach_hangs.ma_khach_hang', '=', $makhachHang)
                ->latest('hoa_don_Bans.created_at')->paginate(5);
                return view('Admin.KhachHang.DetailKhachHang',
                [
                    'Data_KhachHang' => $khachhang,
                    'List_HDB' => $listHDB,
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function edit(KhachHang $khachHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKhachHangRequest  $request
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKhachHangRequest $request, KhachHang $khachHang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function destroy( $makhachHang)
    {
        if(HoaDonBan::where('ma_khach_hang', '=', $makhachHang)->count()==0)
        {
            KhachHang::Where('ma_khach_hang', $makhachHang)->delete();
            return redirect('Admin/KhachHang')->with('XoaKhachHang_ThanhCong', 'Xóa thành công mã Khách hàng: '.$makhachHang);
        }
        return redirect('Admin/KhachHang')->with('XoaKhachHang_Error', 'Xóa không thành công mã Khách hàng: '.$makhachHang.'(Khách hàng đã mua hàng tại website)');
    }
}
