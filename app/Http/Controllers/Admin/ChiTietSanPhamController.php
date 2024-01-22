<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietSanPham;
use App\Http\Requests\StoreChiTietSanPhamRequest;
use App\Http\Requests\UpdateChiTietSanPhamRequest;
use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Models\Size;
use App\Models\MauSac;
use Illuminate\Support\Facades\DB;

class ChiTietSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $AutoGenerateId = new CommonFunction(); 
        return view('Admin.ChiTietSanPham.CreateChiTietSanPham',
        [
            'auto_ma_chi_tiet_san_pham' => $AutoGenerateId->autoGenerateId('CTSP', ChiTietSanPham::class, 'ma_chi_tiet_san_pham'),
            'Data_MauSac' =>MauSac::all(),
            'Data_Size' =>Size::all(),
            'ma_size' =>'',
            'ma_mau' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChiTietSanPhamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChiTietSanPhamRequest $request)
    {
        $ListChiTietSPExist = DB::table('chi_tiet_san_phams')->where('ma_san_pham', '=', $request->ma_san_pham)
                            ->where('ma_mau', '=', $request->ma_mau)
                            ->where('ma_size', '=', $request->ma_size)->count();
        if($ListChiTietSPExist==0)
        {
            ChiTietSanPham::create([
            'ma_chi_tiet_san_pham' => $request->ma_chi_tiet_san_pham,
            'so_luong' => 0,
            'trang_thai' => 0,
            'ma_san_pham' => $request->ma_san_pham,
            'ma_size' => $request->ma_size,
            'ma_mau' => $request->ma_mau ]);
            return redirect()->route('Admin.SanPham.show',  $request->ma_san_pham)->with('ThemChiTietSanPham_ThanhCong', 'Thêm thành công mã chi tiết sản phẩm: '.$request->ma_chi_tiet_san_pham); 
        }
        return redirect()->route('Admin.ChiTietSanPham.create', 
        [
            'ma_san_pham'=>$request->ma_san_pham, 
            'ten_san_pham'=>$request->ten_san_pham,
            'ma_size' => $request->ma_size,
            'ma_mau' => $request->ma_mau 
        ])->with('ThemChiTietSanPham_Error', 'Thêm không thành công mã sản phẩm: '.$request->ma_chi_tiet_san_pham.' (Đã tồn tại chi tiết sản phẩm này).'); 
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChiTietSanPham  $chiTietSanPham
     * @return \Illuminate\Http\Response
     */
    public function show(ChiTietSanPham $chiTietSanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChiTietSanPham  $chiTietSanPham
     * @return \Illuminate\Http\Response
     */
    public function edit($machiTietSanPham)
    {
        return view('Admin.ChiTietSanPham.EditChiTietSanPham', 
        [
            'Data_ChiTietSanPham' => ChiTietSanPham::where('ma_chi_tiet_san_pham', $machiTietSanPham)->first(), 
            'ten_san_pham'=>request()->ten_san_pham,
            'Data_MauSac' =>MauSac::all(),
            'Data_Size' =>Size::all()
        ]);  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChiTietSanPhamRequest  $request
     * @param  \App\Models\ChiTietSanPham  $chiTietSanPham
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChiTietSanPhamRequest $request, $machiTietSanPham)
    {
        $ListChiTietSPExist = DB::table('chi_tiet_san_phams')->where('ma_san_pham', '=', $request->ma_san_pham)
                            ->where('ma_mau', '=', $request->ma_mau)
                            ->where('ma_size', '=', $request->ma_size)->count();
        $massage = 'Sửa không thành công mã sản phẩm: '.$request->ma_chi_tiet_san_pham.' (Đã tồn tại chi tiết sản phẩm này).';
        $olddata = ChiTietSanPham::find($machiTietSanPham);
        if($ListChiTietSPExist==0)
        {
            
            $olddata->ma_size = $request->ma_size;
            $olddata->ma_mau = $request->ma_mau; 
            $olddata->save();
            return redirect()->route('Admin.SanPham.show',  $request->ma_san_pham)->with('SuaChiTietSanPham_ThanhCong', 'Sửa thành công mã chi tiết sản phẩm: '.$request->ma_chi_tiet_san_pham); 
        }
        else
        {
            if($olddata->ma_size == $request->ma_size && $olddata->ma_mau == $request->ma_mau)
                $massage = 'Bạn chưa thay đổi để cập nhật';    
        }
        return redirect()->route('Admin.ChiTietSanPham.edit', 
        [
            'ChiTietSanPham' => $machiTietSanPham,
            'ten_san_pham'=>$request->ten_san_pham,
        ])->with('SuaChiTietSanPham_Error', $massage ); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChiTietSanPham  $chiTietSanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy($machiTietSanPham)
    {
        if(DB::table('chi_tiet_hoa_don_bans')->where('ma_chi_tiet_san_pham', $machiTietSanPham)->count()==0 &&
        DB::table('chi_tiet_hoa_don_nhaps')->where('ma_chi_tiet_san_pham', $machiTietSanPham)->count()==0)
        {
      
            ChiTietSanPham::Where('ma_chi_tiet_san_pham', $machiTietSanPham)->delete();
            return redirect()->route('Admin.SanPham.show', request()->ma_san_pham)->with('XoaChiTietSanPham_ThanhCong', 'Xóa thành công mã chi tiết sản phẩm: '.$machiTietSanPham);
        }
        return redirect()->route('Admin.SanPham.show', request()->ma_san_pham)
        ->with('XoaChiTietSanPham_Error', 'Xóa không thành công mã chi tiết sản phẩm: '.$machiTietSanPham.'(Chi tiết sản phẩm đã có trong hóa đơn nhập/bán)');
    }
}
