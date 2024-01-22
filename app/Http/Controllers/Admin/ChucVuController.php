<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Http\Requests\StoreChucVuRequest;
use App\Http\Requests\UpdateChucVuRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommonFunction\CommonFunction;
class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListChucVu= DB::table('chuc_vus')
                    ->select('chuc_vus.*')
                    ->where('ma_chuc_vu', '<>', 'CV01');
        if(isset(request()->Key_ChucVu))
        {
            $ListChucVu = $ListChucVu->where('ma_chuc_vu', 'like', '%'.request()->Key_ChucVu.'%');
            $ListChucVu = $ListChucVu->orwhere('ten_chuc_vu', 'like', '%'.request()->Key_ChucVu.'%');
        }
        if(isset(request()->NameSort))
            $ListChucVu = $ListChucVu->orderBy(request()->NameSort, request()->Sort);
        $ListChucVu = $ListChucVu->latest('created_at')->paginate(5);
        return view('Admin.ChucVu.ChucVu', ['Data_ChucVu'=> $ListChucVu,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AutoGenerateId = new CommonFunction(); 
        return view('Admin.ChucVu.CreateChucVu', ['auto_ma_chuc_vu' => $AutoGenerateId->autoGenerateId('CV', ChucVu::class, 'ma_chuc_vu')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChucVuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChucVuRequest $request)
    {
        ChucVu::create(
        [
            'ma_chuc_vu' => $request->ma_chuc_vu,
            'ten_chuc_vu' => $request->ten_chuc_vu
        ]);
 
        return redirect('Admin/ChucVu')->with('ThemChucVu_ThanhCong', 'Thêm thành công mã chức vụ: '.$request->all()['ma_chuc_vu']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function show(ChucVu $chucVu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function edit( $machucvu)
    {
        return view('Admin.ChucVu.EditChucVu', ['Data_ChucVu' => ChucVu::where('ma_chuc_vu', $machucvu)->first()]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChucVuRequest  $request
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChucVuRequest $request,  $machucVu)
    {
        $olddata = ChucVu::find($machucVu);
        $olddata->ten_chuc_vu = $request->all()['ten_chuc_vu'];
        $olddata->save();
        return redirect('Admin/ChucVu')->with('SuaChucVu_ThanhCong', 'Sửa thành công mã chức vụ: '.$machucVu);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChucVu  $chucVu
     * @return \Illuminate\Http\Response
     */
    public function destroy( $machucVu)
    {
        $countmachucvu = DB::table('nhan_viens')->where('ma_chuc_vu', '=', $machucVu)->count();
        if($countmachucvu==0)
        {
            ChucVu::Where('ma_chuc_vu', $machucVu)->delete();
            return redirect('Admin/ChucVu')->with('XoaChucVu_ThanhCong', 'Xóa thành công mã chức vụ: '.$machucVu);
        }
        return redirect('Admin/ChucVu')->with('XoaChucVu_Error', 'Xóa không thành công mã chức vụ: '.$machucVu.'(Đã có nhân viên có chức vụ này)');


    }
}
