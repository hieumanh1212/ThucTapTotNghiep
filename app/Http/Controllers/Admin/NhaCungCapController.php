<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NhaCungCap;
use App\Http\Requests\StoreNhaCungCapRequest;
use App\Http\Requests\UpdateNhaCungCapRequest;
use App\Models\HoaDonNhap;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommonFunction\CommonFunction;
class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListNhaCungCap= DB::table('nha_cung_caps')
                    ->select('nha_cung_caps.*');
        if(isset(request()->Key_NhaCungCap))
        {
            $ListNhaCungCap = $ListNhaCungCap->where('ma_nha_cung_cap', 'like', '%'.request()->Key_NhaCungCap.'%');
            $ListNhaCungCap = $ListNhaCungCap->orwhere('ten_nha_cung_cap', 'like', '%'.request()->Key_NhaCungCap.'%');
            $ListNhaCungCap = $ListNhaCungCap->orwhere('email', 'like', '%'.request()->Key_NhaCungCap.'%');
            $ListNhaCungCap = $ListNhaCungCap->orwhere('so_dien_thoai', 'like', '%'.request()->Key_NhaCungCap.'%');
        }
        if(isset(request()->NameSort))
            $ListNhaCungCap = $ListNhaCungCap->orderBy(request()->NameSort, request()->Sort);
        $ListNhaCungCap = $ListNhaCungCap->latest('created_at')->paginate(5);
        return view('Admin.NhaCungCap.NhaCungCap', ['Data_NhaCungCap'=> $ListNhaCungCap,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AutoGenerateId = new CommonFunction();
        return view('Admin.NhaCungCap.CreateNhaCungCap', ['auto_ma_nha_cung_cap' => $AutoGenerateId->autoGenerateId('NCC', NhaCungCap::class, 'ma_nha_cung_cap')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNhaCungCapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNhaCungCapRequest $request)
    {
        //dd($request->all());
        NhaCungCap::create
        ([
            "ma_nha_cung_cap" => $request->ma_nha_cung_cap,
            "ten_nha_cung_cap" => $request->ten_nha_cung_cap,
            "email" => $request->email,
            "so_dien_thoai" => $request->so_dien_thoai
        ]);


         return redirect('Admin/NhaCungCap')->with('ThemNhaCungCap_ThanhCong', 'Thêm thành công mã nhà cung cấp: '.$request->all()['ma_nha_cung_cap']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function show( $manhaCungCap)
    {
        $ListHDN= DB::table('nha_cung_caps')
                    ->join('hoa_don_nhaps', 'hoa_don_nhaps.ma_nha_cung_cap', '=', 'nha_cung_caps.ma_nha_cung_cap')
                    ->join('nhan_viens', 'hoa_don_nhaps.ma_nhan_vien', '=', 'nhan_viens.ma_nhan_vien')
                    ->select('nha_cung_caps.*', 'hoa_don_nhaps.*', 'nhan_viens.*')
                    ->where('nha_cung_caps.ma_nha_cung_cap', '=' , $manhaCungCap);
        return view('Admin.NhaCungCap.DetailNhaCungCap',
        [
            'Data_NhaCungCap' => NhaCungCap::where('ma_nha_cung_cap', $manhaCungCap)->first(),
            'List_HDN' => [$ListHDN->get(), $ListHDN->count()]
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function edit( $manhaCungCap)
    {
        return view('Admin.NhaCungCap.EditNhaCungCap', ['Data_NhaCungCap' => NhaCungCap::where('ma_nha_cung_cap', $manhaCungCap)->first()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNhaCungCapRequest  $request
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNhaCungCapRequest $request,  $manhaCungCap)
    {
        $olddata = NhaCungCap::find($manhaCungCap);
        $olddata->ma_nha_cung_cap = $request->ma_nha_cung_cap;
        $olddata->ten_nha_cung_cap = $request->ten_nha_cung_cap;
        $olddata->email = $request->email;
        $olddata->so_dien_thoai = $request->so_dien_thoai;
        $olddata->save();
        return redirect('Admin/NhaCungCap')->with('SuaNhaCungCap_ThanhCong', 'Sửa thành công mã nhà cung cấp: '.$manhaCungCap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function destroy( $manhaCungCap)
    {
        if(HoaDonNhap::where('ma_nha_cung_cap', '=', $manhaCungCap)->count()==0)
        {
            NhaCungCap::Where('ma_nha_cung_cap', $manhaCungCap)->delete();
            return redirect('Admin/NhaCungCap')->with('XoaNhaCungCap_ThanhCong', 'Xóa thành công mã nhà cung cấp: '.$manhaCungCap);
        }
        return redirect('Admin/NhaCungCap')->with('XoaNhaCungCap_Error', 'Xóa không thành công mã nhà cung cấp: '.$manhaCungCap.'(Đã nhập hàng của nhà cung cấp này)');
    }
}
