<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDonBan;
use App\Http\Requests\StoreHoaDonBanRequest;
use App\Http\Requests\UpdateHoaDonBanRequest;
use Illuminate\Support\Facades\DB;
class HoaDonBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listHDB =  DB::table('hoa_don_Bans')
                ->join('nhan_viens', 'nhan_viens.ma_nhan_vien', '=', 'hoa_don_Bans.ma_nhan_vien')
                ->join('khach_hangs', 'khach_hangs.ma_khach_hang', '=', 'hoa_don_Bans.ma_khach_hang')
                ->leftJoin('vouchers', 'vouchers.ma_voucher', '=', 'hoa_don_Bans.ma_voucher')
                ->select('hoa_don_Bans.*', 'khach_hangs.*', 'vouchers.*', 'nhan_viens.*')
                ->where('tinh_trang_hoa_don', '<>', 'Thêm giỏ hàngg');
        
        if(isset(request()->Key_HoaDonBan))
        {
            $listHDB = $listHDB->where('ma_hoa_don_ban', 'like', '%'.request()->Key_HoaDonBan.'%');
            $listHDB = $listHDB->orwhere('ngay_tao_hoa_don', 'like', '%'.request()->Key_HoaDonBan.'%');
            $listHDB = $listHDB->orwhere('ten_nhan_vien', 'like', '%'.request()->Key_HoaDonBan.'%');
            $listHDB = $listHDB->orwhere('ten_khach_hang', 'like', '%'.request()->Key_HoaDonBan.'%');
            $listHDB = $listHDB->orwhere('tinh_trang_hoa_don', 'like', '%'.request()->Key_HoaDonBan.'%');
            $listHDB = $listHDB->orwhere('trang_thai_thanh_toan', 'like', '%'.request()->Key_HoaDonBan.'%');
            $listHDB = $listHDB->orwhere('ten_voucher', 'like', '%'.request()->Key_HoaDonBan.'%');
            $listHDB = $listHDB->orwhere('tong_tien_hdb', 'like', '%'.request()->Key_HoaDonBan.'%');
        }
        if(isset(request()->NameSort))
            $listHDB = $listHDB->orderBy(request()->NameSort, request()->Sort);
            
        $listHDB = $listHDB->latest('hoa_don_Bans.created_at')->paginate(5);


        // $columnNames = !empty($listHDB) ? array_keys((array) $listHDB[0]) : [];
        // dd($columnNames);
  
        return view('Admin.HoaDonBan.HoaDonBan',
        [
            'Data_HoaDonBan' =>$listHDB
        ]);
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
     * @param  \App\Http\Requests\StoreHoaDonBanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHoaDonBanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoaDonBan  $hoaDonBan
     * @return \Illuminate\Http\Response
     */
    public function show($mahoaDonBan)
    {
        $HDB =  DB::table('hoa_don_bans')
                ->join('nhan_viens', 'nhan_viens.ma_nhan_vien', '=', 'hoa_don_bans.ma_nhan_vien')
                ->join('khach_hangs', 'khach_hangs.ma_khach_hang', '=', 'hoa_don_bans.ma_khach_hang')
                ->leftJoin('vouchers', 'vouchers.ma_voucher', '=', 'hoa_don_bans.ma_voucher')
                ->select('hoa_don_bans.*', 'khach_hangs.*', 'vouchers.*', 'nhan_viens.*')
                ->where('hoa_don_bans.ma_hoa_don_ban', '=', $mahoaDonBan)
                ->first();
        

        $listCTHDB = DB::table('chi_tiet_hoa_don_bans')
                ->join('chi_tiet_san_phams', 'chi_tiet_san_phams.ma_chi_tiet_san_pham', '=', 'chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham')
                ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
                ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
                ->join('san_phams', 'san_phams.ma_san_pham', '=', 'chi_tiet_san_phams.ma_san_pham')
                ->select('chi_tiet_hoa_don_bans.*', 'sizes.*', 'mau_sacs.*', 'chi_tiet_san_phams.*', 'san_phams.*')
                ->where('chi_tiet_hoa_don_bans.ma_hoa_don_ban', '=', $mahoaDonBan);

        return view('Admin.HoaDonBan.DetailHoaDonBan',
        [
            'Data_HoaDonBan' =>$HDB,
            'List_CTHDB' =>[$listCTHDB->get(), $listCTHDB->count()]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoaDonBan  $hoaDonBan
     * @return \Illuminate\Http\Response
     */
    public function edit(HoaDonBan $hoaDonBan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHoaDonBanRequest  $request
     * @param  \App\Models\HoaDonBan  $hoaDonBan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHoaDonBanRequest $request, HoaDonBan $hoaDonBan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HoaDonBan  $hoaDonBan
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoaDonBan $hoaDonBan)
    {
        //
    }
}
