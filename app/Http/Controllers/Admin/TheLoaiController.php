<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use App\Http\Requests\StoreTheLoaiRequest;
use App\Http\Requests\UpdateTheLoaiRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Models\SanPham;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListTheLoai= DB::table('the_loais')
                    ->select('the_loais.*');
        if(isset(request()->Key_TheLoai))
        {
            $ListTheLoai = $ListTheLoai->where('ma_the_loai', 'like', '%'.request()->Key_TheLoai.'%');
            $ListTheLoai = $ListTheLoai->orwhere('ten_the_loai', 'like', '%'.request()->Key_TheLoai.'%');
        }
        if(isset(request()->NameSort))
            $ListTheLoai = $ListTheLoai->orderBy(request()->NameSort, request()->Sort);
        $ListTheLoai = $ListTheLoai->latest('created_at')->paginate(5);
        return view('Admin.TheLoai.TheLoai', ['Data_TheLoai'=> $ListTheLoai,]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AutoGenerateId = new CommonFunction(); 
        return view('Admin.TheLoai.CreateTheLoai', ['auto_ma_the_loai' => $AutoGenerateId->autoGenerateId('TL', TheLoai::class, 'ma_the_loai')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTheLoaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTheLoaiRequest $request)
    {
        TheLoai::create(
        [
            'ma_the_loai' => $request->ma_the_loai,
            'ten_the_loai' => $request->ten_the_loai
        ]);
     
        return redirect('Admin/TheLoai')->with('ThemTheLoai_ThanhCong', 'Thêm thành công mã thể loại: '.$request->all()['ma_the_loai']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function show(TheLoai $theLoai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function edit( $matheLoai)
    {
        return view('Admin.TheLoai.EditTheLoai', ['Data_TheLoai' => TheLoai::where('ma_the_loai', $matheLoai)->first()]);  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTheLoaiRequest  $request
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTheLoaiRequest $request,  $matheLoai)
    {
        $olddata = TheLoai::find($matheLoai);
        $olddata->ten_the_loai = $request->all()['ten_the_loai'];
        $olddata->save();
        return redirect('Admin/TheLoai')->with('SuaTheLoai_ThanhCong', 'Sửa thành công mã thể loại: '.$matheLoai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function destroy( $matheLoai)
    {
        $countmatheLoai = DB::table('san_phams')->where('ma_the_loai', '=', $matheLoai)->count();
        if($countmatheLoai==0)
        {
            TheLoai::Where('ma_the_loai', $matheLoai)->delete();
            return redirect('Admin/TheLoai')->with('XoaTheLoai_ThanhCong', 'Xóa thành công mã thể loại: '.$matheLoai);
        }
        return redirect('Admin/TheLoai')->with('XoaTheLoai_Error', 'Xóa không thành công mã thể loại: '.$matheLoai.'(Đã có sản phẩm có thể loại này)');
    }
}
