<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDonNhap;
use App\Http\Requests\StoreHoaDonNhapRequest;
use App\Http\Requests\UpdateHoaDonNhapRequest;
use Illuminate\Support\Facades\DB;
class HoaDonNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listHDN =  DB::table('hoa_don_nhaps')
                ->join('nhan_viens', 'nhan_viens.ma_nhan_vien', '=', 'hoa_don_nhaps.ma_nhan_vien')
                ->join('nha_cung_caps', 'nha_cung_caps.ma_nha_cung_cap', '=', 'hoa_don_nhaps.ma_nha_cung_cap')
                ->select('hoa_don_nhaps.*', 'nha_cung_caps.*', 'nhan_viens.*');
        
        if(isset(request()->Key_HoaDonNhap))
        {
            $listHDN = $listHDN->where('ma_hoa_don_nhap', 'like', '%'.request()->Key_HoaDonNhap.'%');
            $listHDN = $listHDN->orwhere('ngay_nhap', 'like', '%'.request()->Key_HoaDonNhap.'%');
            $listHDN = $listHDN->orwhere('ten_nha_cung_cap', 'like', '%'.request()->Key_HoaDonNhap.'%');
            $listHDN = $listHDN->orwhere('ma_nhan_vien', 'like', '%'.request()->Key_HoaDonNhap.'%');
            $listHDN = $listHDN->orwhere('ten_nhan_vien', 'like', '%'.request()->Key_HoaDonNhap.'%');
            $listHDN = $listHDN->orwhere('tong_tien_hdn', 'like', '%'.request()->Key_HoaDonNhap.'%');
        }
        if(isset(request()->NameSort))
            $listHDN = $listHDN->orderBy(request()->NameSort, request()->Sort);
            
        $listHDN = $listHDN->latest('hoa_don_nhaps.created_at')->paginate(5);

        return view('Admin.HoaDonNhap.HoaDonNhap',
        [
            'Data_HoaDonNhap' =>$listHDN
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
     * @param  \App\Http\Requests\StoreHoaDonNhapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHoaDonNhapRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoaDonNhap  $hoaDonNhap
     * @return \Illuminate\Http\Response
     */
    public function show( $mahoaDonNhap)
    {
        
        $HDN =  DB::table('hoa_don_nhaps')
                ->join('nhan_viens', 'nhan_viens.ma_nhan_vien', '=', 'hoa_don_nhaps.ma_nhan_vien')
                ->join('nha_cung_caps', 'nha_cung_caps.ma_nha_cung_cap', '=', 'hoa_don_nhaps.ma_nha_cung_cap')
                ->select('hoa_don_nhaps.*', 'nhan_viens.*', 'nha_cung_caps.*')
                ->where('hoa_don_nhaps.ma_hoa_don_nhap', '=', $mahoaDonNhap)
                ->first();
        

        $listCTHDN = DB::table('chi_tiet_hoa_don_nhaps')
                ->join('chi_tiet_san_phams', 'chi_tiet_san_phams.ma_chi_tiet_san_pham', '=', 'chi_tiet_hoa_don_nhaps.ma_chi_tiet_san_pham')
                ->join('sizes', 'chi_tiet_san_phams.ma_size', '=', 'sizes.ma_size')
                ->join('mau_sacs', 'chi_tiet_san_phams.ma_mau', '=', 'mau_sacs.ma_mau')
                ->join('san_phams', 'san_phams.ma_san_pham', '=', 'chi_tiet_san_phams.ma_san_pham')
                ->select('chi_tiet_hoa_don_nhaps.*', 'sizes.*', 'mau_sacs.*', 'chi_tiet_san_phams.*', 'san_phams.*')
                ->where('chi_tiet_hoa_don_nhaps.ma_hoa_don_nhap', '=', $mahoaDonNhap);
               

        return view('Admin.HoaDonNhap.DetailHoaDonNhap',
        [
            'Data_HoaDonNhap' =>$HDN,
            'List_CTHDN' =>[$listCTHDN->get(), $listCTHDN->count()]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoaDonNhap  $hoaDonNhap
     * @return \Illuminate\Http\Response
     */
    public function edit(HoaDonNhap $hoaDonNhap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHoaDonNhapRequest  $request
     * @param  \App\Models\HoaDonNhap  $hoaDonNhap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHoaDonNhapRequest $request, HoaDonNhap $hoaDonNhap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HoaDonNhap  $hoaDonNhap
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoaDonNhap $hoaDonNhap)
    {
        //
    }
}
