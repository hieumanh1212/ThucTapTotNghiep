<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietSanPham;
use App\Models\MauSac;
use App\Http\Requests\StoreMauSacRequest;
use App\Http\Requests\UpdateMauSacRequest;
use App\Models\NhaCungCap;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class MauSacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors= DB::table('mau_sacs')
            ->select('mau_sacs.*');
//        if(isset(request()->Key_NhaCungCap))
//        {
//            $ListNhaCungCap = $ListNhaCungCap->where('ma_nha_cung_cap', 'like', '%'.request()->Key_NhaCungCap.'%');
//            $ListNhaCungCap = $ListNhaCungCap->orwhere('ten_nha_cung_cap', 'like', '%'.request()->Key_NhaCungCap.'%');
//            $ListNhaCungCap = $ListNhaCungCap->orwhere('email', 'like', '%'.request()->Key_NhaCungCap.'%');
//            $ListNhaCungCap = $ListNhaCungCap->orwhere('so_dien_thoai', 'like', '%'.request()->Key_NhaCungCap.'%');
//        }
//        if(isset(request()->NameSort))
//            $ListNhaCungCap = $ListNhaCungCap->orderBy(request()->NameSort, request()->Sort);
        $colors = $colors->latest('created_at')->paginate(6);
        return view('Admin.MauSac.MauSac', ['colors'=> $colors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.MauSac.CreateColor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMauSacRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMauSacRequest $request)
    {
        $colorId = $request->ma_mau;
        $colorName = $request->mau;
        MauSac::create
        ([
            "ma_mau" => substr($colorId,1),
            "mau" => $colorName,
        ]);
        return redirect('Admin/MauSac')->with('message', 'Thêm thành công mã màu: '.$request->all()['ma_mau']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MauSac  $mauSac
     * @return \Illuminate\Http\Response
     */
    public function show(MauSac $mauSac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MauSac  $mauSac
     * @return \Illuminate\Http\Response
     */
    public function edit($colorId)
    {
        return view('Admin.MauSac.EditColor', ['color' => MauSac::where('ma_mau', $colorId)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMauSacRequest  $request
     * @param  \App\Models\MauSac  $mauSac
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMauSacRequest $request, $colorId)
    {
        $olddata = MauSac::find($colorId);
        $olddata->ma_mau = substr($request->ma_mau,1);
        $olddata->mau = $request->mau;
        $olddata->save();
        return redirect('Admin/MauSac')->with('message', 'Sửa thành công mã màu: '.$colorId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MauSac  $mauSac
     * @return \Illuminate\Http\Response
     */
    public function destroy($colorId)
    {
//        dd($colorId);
        if(ChiTietSanPham::where('ma_mau', '=', $colorId)->count()==0)
        {
            MauSac::Where('ma_mau', $colorId)->delete();
            return redirect('Admin/MauSac')->with('message', 'Xóa thành công mã màu: '.$colorId);
        }
        return redirect('Admin/MauSac')->with('errorColor', 'Xóa không thành công mã màu: '.$colorId.'(Đã tồn tại trong chi tiết sản phẩm )');
    }

    //check color exist
    public function checkColorExist($colorId){
        return !(MauSac::where(['ma_mau' => $colorId])->count() == 0);
    }
    public function checkColorNameExist($colorName){
        return !(MauSac::where(['mau' => $colorName])->count() == 0);
    }
}
