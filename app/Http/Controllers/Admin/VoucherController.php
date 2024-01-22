<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Models\HoaDonBan;
use Illuminate\Support\Facades\DB;
class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListVoucher= DB::table('vouchers')
                    ->select('vouchers.*')
                    ->where('ma_voucher', '<>', '');
        if(isset(request()->Key_Voucher))
        {
            $ListVoucher = $ListVoucher->where('ma_voucher', 'like', '%'.request()->Key_Voucher.'%');
            $ListVoucher = $ListVoucher->orwhere('ten_voucher', 'like', '%'.request()->Key_Voucher.'%');
            $ListVoucher = $ListVoucher->orwhere('phan_tram', 'like', '%'.request()->Key_Voucher.'%');
            $ListVoucher = $ListVoucher->orwhere('so_luong', 'like', '%'.request()->Key_Voucher.'%');
            $ListVoucher = $ListVoucher->orwhere('ngay_bat_dau', 'like', '%'.request()->Key_Voucher.'%');
            $ListVoucher = $ListVoucher->orwhere('ngay_ket_thuc', 'like', '%'.request()->Key_Voucher.'%');
        }
        if(isset(request()->NameSort))
            $ListVoucher = $ListVoucher->orderBy(request()->NameSort, request()->Sort);
        $ListVoucher = $ListVoucher->latest('created_at')->paginate(5);
        return view('Admin.Voucher.Voucher', ['Data_Voucher'=> $ListVoucher,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AutoGenerateId = new CommonFunction();
        return view('Admin.Voucher.Createvoucher', ['auto_ma_voucher' => $AutoGenerateId->autoGenerateId('VC', Voucher::class, 'ma_voucher')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVoucherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVoucherRequest $request)
    {
        
        Voucher::create([
        "ma_voucher" => $request->ma_voucher,
        "ten_voucher" => $request->ten_voucher,
        "phan_tram" => $request->phan_tram,
        "so_luong" => $request->so_luong,
        "ngay_bat_dau" => $request->ngay_bat_dau,
        "ngay_ket_thuc" => $request->ngay_ket_thuc]);

       
        return redirect('Admin/Voucher')->with('ThemVoucher_ThanhCong', 'Thêm thành công mã voucher: '.$request->all()['ma_voucher']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit( $mavoucher)
    {
 
        return view('Admin.Voucher.EditVoucher', ['Data_Voucher' => Voucher::where('ma_voucher', $mavoucher)->first()]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVoucherRequest  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoucherRequest $request, $mavoucher)
    {
        $olddata = Voucher::find($mavoucher);

        $olddata->ma_voucher = $request->ma_voucher;
        $olddata->ten_voucher = $request->ten_voucher;
        $olddata->phan_tram = $request->phan_tram;
        $olddata->so_luong = $request->so_luong;
        $olddata->ngay_bat_dau = $request->ngay_bat_dau;
        $olddata->ngay_ket_thuc = $request->ngay_ket_thuc;
        $olddata->save();
        return redirect('Admin/Voucher')->with('SuaVoucher_ThanhCong', 'Sửa thành công mã voucher: '.$mavoucher);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy( $mavoucher)
    {
        if(HoaDonBan::where('ma_voucher', '=', $mavoucher)->count()==0)
        {
            Voucher::Where('ma_voucher', $mavoucher)->delete();
            return redirect('Admin/Voucher')->with('XoaVoucher_ThanhCong', 'Xóa thành công mã voucher: '.$mavoucher);
        }
        return redirect('Admin/Voucher')->with('XoaVoucher_Error', 'Xóa không thành công mã voucher: '.$mavoucher.'(mã voucher đã được sử dụng trong hóa đơn bán)');
    }
}
