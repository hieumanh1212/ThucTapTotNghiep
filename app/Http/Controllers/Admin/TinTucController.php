<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use App\Http\Requests\StoreTinTucRequest;
use App\Http\Requests\UpdateTinTucRequest;
use App\Http\Requests;
use Psy\CodeCleaner\IssetPass;
use Illuminate\Support\Facades\DB;
class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListTinTuc= DB::table('tin_tucs')
                    ->select('tin_tucs.*');
        if(isset(request()->Key_TinTuc))
        {
            $ListTinTuc = $ListTinTuc->where('ma_tin_tuc', 'like', '%'.request()->Key_TinTuc.'%');
            $ListTinTuc = $ListTinTuc->orwhere('tieu_de', 'like', '%'.request()->Key_TinTuc.'%');
        }
        if(isset(request()->NameSort))
            $ListTinTuc = $ListTinTuc->orderBy(request()->NameSort, request()->Sort);
        $ListTinTuc = $ListTinTuc->latest('created_at')->paginate(5);
        return view('Admin.TinTuc.TinTuc', ['Data_TinTuc'=> $ListTinTuc,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AutoGenerateId = new CommonFunction(); 
        return view('Admin.TinTuc.CreateTinTuc', ['auto_ma_tin_tuc' => $AutoGenerateId->autoGenerateId('TT', TinTuc::class, 'ma_tin_tuc')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTinTucRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTinTucRequest $request)
    {
        if(TinTuc::create([
            'ma_tin_tuc' => $request->ma_tin_tuc,
            'anh_dai_dien' => $this->uploadImage($request),
            'tieu_de' => $request->tieu_de,
            'noi_dung' => $request->noi_dung
        ]))
        {
            return redirect('Admin/TinTuc')->with('ThemTinTuc_ThanhCong', 'Thêm thành công mã tin tức: '.$request->all()['ma_tin_tuc']);
        }
        return redirect('Admin/TinTuc')->with('ThemTinTuc_Error', 'Thêm không thành công mã tin tức: '.$request->all()['ma_tin_tuc']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function show( $matinTuc)
    {
        return view('Admin.TinTuc.DetailTinTuc', ['Data_TinTuc' => TinTuc::where('ma_tin_tuc', $matinTuc)->first()]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function edit($matinTuc)
    {
        return view('Admin.TinTuc.EditTinTuc', ['Data_TinTuc' => TinTuc::where('ma_tin_tuc', $matinTuc)->first()]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTinTucRequest  $request
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTinTucRequest $request,  $matinTuc)
    {
        //dd($request->all());
        $olddata = TinTuc::find($matinTuc);
        if(isset($olddata))
        {
            $fileName = $this->uploadImage($request);
            if($fileName!='')
                $olddata->anh_dai_dien = $fileName;
            $olddata->tieu_de = $request->all()['tieu_de'];
            $olddata->noi_dung = $request->all()['noi_dung'];
            $olddata->save();
            return redirect('Admin/TinTuc')->with('SuaTinTuc_ThanhCong', 'Sửa thành công mã tin tức: '.$matinTuc);
        }
        
        return redirect('Admin/TinTuc')->with('SuaTinTuc_Error', 'Sửa không thành công mã tin tức: '.$matinTuc);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function destroy($matinTuc)
    {
        if(TinTuc::Where('ma_tin_tuc', $matinTuc)->delete())
            return redirect('Admin/TinTuc')->with('XoaTinTuc_ThanhCong', 'Xóa thành công mã tin tức: '.$matinTuc);
        return redirect('Admin/TinTuc')->with('XoaTinTuc_Error', 'Xóa không thành công mã tin tức: '.$matinTuc);
        
    }

    public function uploadImage($request)
    {
        $fileName = '';
        if ($request->hasFile('anh_dai_dien')) 
        {
            $file = $request->anh_dai_dien;
            $fileName = $file->getClientOriginalName();
            $ext = $request->anh_dai_dien->extension();
            $fileName = time().'-TinTuc.'.$ext;
            $file->move(public_path('IMG_TinTuc/'), $fileName);
        }
        return $fileName;
    }
}
