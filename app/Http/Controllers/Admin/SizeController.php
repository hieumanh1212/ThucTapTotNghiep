<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommonFunction\CommonFunction;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListSize= DB::table('sizes')
                    ->select('sizes.*');
        if(isset(request()->Key_Size))
        {
            $ListSize = $ListSize->where('ma_size', 'like', '%'.request()->Key_Size.'%');
            $ListSize = $ListSize->orwhere('size', 'like', '%'.request()->Key_Size.'%');
        }
        if(isset(request()->NameSort))
            $ListSize = $ListSize->orderBy(request()->NameSort, request()->Sort);
        $ListSize = $ListSize->latest('created_at')->paginate(5);
        return view('Admin.Size.Size', ['Data_Size'=> $ListSize,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AutoGenerateId = new CommonFunction(); 
        return view('Admin.Size.CreateSize', ['auto_ma_size' => $AutoGenerateId->autoGenerateId('size', Size::class, 'ma_size')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSizeRequest $request)
    {
        
        if(DB::table('sizes')->where('size', '=',  strtoupper($request->size))->count()==0)
        {
            Size::create(
            [
                'ma_size' => $request->ma_size,
                'size' => strtoupper($request->size)
            ]);
            
            return redirect('Admin/Size')->with('ThemSize_ThanhCong', 'Thêm thành công mã size: '.$request->all()['ma_size']);
        }
        return redirect()->route('Admin.Size.create', ['oldsize'=>$request->size])->with('ThemSize_Error', 'Thêm không thành công mã size: '.$request->all()['ma_size']. '(Đã có size này trong hệ thông)');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit( $masize)
    {
        return view('Admin.Size.EditSize', ['Data_Size' => Size::where('ma_size', $masize)->first()]);  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSizeRequest  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSizeRequest $request,  $masize)
    {
        if(DB::table('sizes')->where('size', '=',  strtoupper($request->size))->count()==0)
        {
            
            $olddata = Size::find($masize);
            $olddata->size = strtoupper($request->size);
            $olddata->save();
            return redirect('Admin/Size')->with('SuaSize_ThanhCong', 'Sửa thành công mã size: '.$request->all()['ma_size']);
        }
  
        return redirect()->route('Admin.Size.edit', ['Size'=>$masize, 'oldSize' => $request->size ])->with('SuaSize_Error', 'Sửa không thành công mã size: '.$request->all()['ma_size'].'(Mã size bạn sửa đã có trong hệ thông)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy( $masize)
    {
        $countmasize = DB::table('chi_tiet_san_phams')->where('ma_size', '=', $masize)->count();
        if($countmasize==0)
        {
            Size::Where('ma_size', $masize)->delete();
            return redirect('Admin/Size')->with('XoaSize_ThanhCong', 'Xóa thành công mã size: '.$masize);
        }
        return redirect('Admin/Size')->with('XoaSize_Error', 'Xóa không thành công mã size: '.$masize.'(Đã có chi tiết sản phẩm có size này)');
    }
}
