<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use App\Models\ChucVu;
use App\Models\HoaDonBan;
use App\Models\HoaDonNhap;
use App\Http\Requests\StoreNhanVienRequest;
use App\Http\Requests\UpdateNhanVienRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommonFunction\CommonFunction;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListNhanVien= DB::table('nhan_viens')
                    ->join('tai_khoans', 'nhan_viens.tai_khoan', '=', 'tai_khoans.tai_khoan')
                    ->join('chuc_vus', 'nhan_viens.ma_chuc_vu', '=', 'chuc_vus.ma_chuc_vu')
                    ->select('nhan_viens.*', 'tai_khoans.*', 'chuc_vus.*');
        if(isset(request()->Key_NhanVien))
        {
            $gioitinh = request()->Key_NhanVien;
            if(strtoupper(request()->Key_NhanVien) == "NAM")
                $gioitinh = "1";
            if(strtoupper(request()->Key_NhanVien) == "NỮ" || 
            strtoupper(request()->Key_NhanVien)=='NU'||
            strtoupper(request()->Key_NhanVien)=='NŨ')
                $gioitinh = "0";
            
            $ListNhanVien = $ListNhanVien->where('ma_nhan_vien', 'like', '%'.request()->Key_NhanVien.'%');
            $ListNhanVien = $ListNhanVien->orwhere('ten_nhan_vien', 'like', '%'.request()->Key_NhanVien.'%');
            $ListNhanVien = $ListNhanVien->orwhere('anh_dai_dien', 'like', '%'.request()->Key_NhanVien.'%');
            $ListNhanVien = $ListNhanVien->orwhere('ten_chuc_vu', 'like', '%'.request()->Key_NhanVien.'%');
            $ListNhanVien = $ListNhanVien->orwhere('ngay_sinh', 'like', '%'.request()->Key_NhanVien.'%');
            $ListNhanVien = $ListNhanVien->orwhere('dia_chi', 'like', '%'.request()->Key_NhanVien.'%');
            $ListNhanVien = $ListNhanVien->orwhere('dien_thoai', 'like', '%'.request()->Key_NhanVien.'%');
            $ListNhanVien = $ListNhanVien->orwhere('gioi_tinh', 'like', '%'.$gioitinh.'%');
        }
        if(isset(request()->NameSort))
            $ListNhanVien = $ListNhanVien->orderBy(request()->NameSort, request()->Sort);
        
        $ListNhanVien = $ListNhanVien->latest('nhan_viens.created_at')->paginate(5);
        // $columnNames = !empty($ListNhanVien) ? array_keys((array) $ListNhanVien[0]) : [];
        // dd($columnNames);
        return view('Admin.NhanVien.NhanVien', ['Data_NhanVien'=> $ListNhanVien,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $AutoGenerateId = new CommonFunction(); 
        return view('Admin.NhanVien.CreateNhanVien', ['auto_ma_nhan_vien' => $AutoGenerateId->autoGenerateId('NV', NhanVien::class, 'ma_nhan_vien'),'Data_ChucVu'=>ChucVu::where('ma_chuc_vu', '<>', 'CV01')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNhanVienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNhanVienRequest $request)
    {

        $loai_tai_khoan = '';
        if($request->ma_chuc_vu == 'CV02')
            $loai_tai_khoan = 'LTK02';
        if($request->ma_chuc_vu == 'CV03')
            $loai_tai_khoan = 'LTK03';
        TaiKhoan::create(
        [
            "tai_khoan" => $request->tai_khoan.'@gmail.com',
            "verified" => true,
            "mat_khau" => Hash::make('123456'),
            "ma_loai_tai_khoan" => $loai_tai_khoan
        ]);
        
        NhanVien::create(
        [
            "ma_nhan_vien" => $request->ma_nhan_vien,
            "ten_nhan_vien" => $request->ten_nhan_vien,
            "ngay_sinh" => $request->ngay_sinh,
            "dia_chi" => $request->dia_chi,
            "dien_thoai" => $request->dien_thoai,
            "gioi_tinh" => $request->gioi_tinh,
            "ma_chuc_vu" => $request->ma_chuc_vu,
            "tai_khoan" => $request->tai_khoan.'@gmail.com',
            'anh_dai_dien' =>$this->uploadImage($request)
        ]);
        
        return redirect('Admin/NhanVien')->with('ThemNhanVien_ThanhCong', 'Thêm thành công mã nhân viên: '.$request->ma_nhan_vien);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function show( $manhanVien)
    {
        $nhanvien = DB::table('nhan_viens')
        ->join('tai_khoans', 'nhan_viens.tai_khoan', '=', 'tai_khoans.tai_khoan')
        ->join('chuc_vus', 'nhan_viens.ma_chuc_vu', '=', 'chuc_vus.ma_chuc_vu')
        ->select('nhan_viens.*', 'tai_khoans.*', 'chuc_vus.*')
        ->where('nhan_viens.ma_nhan_vien', '=', $manhanVien)
        ->first();

        $listHD = '';
        $countHD = 0;
        $LoaiHD = '';
 
        if($nhanvien->ma_chuc_vu=='CV02')
        {
            $countHD = DB::table('hoa_don_Bans')->where('ma_nhan_vien', '=', $manhanVien)->count('ma_nhan_vien');
            
            $LoaiHD = 'HDB';
            if($countHD != 0)
            {
                
                $listHD =  DB::table('hoa_don_Bans')
                ->join('khach_hangs', 'khach_hangs.ma_khach_hang', '=', 'hoa_don_Bans.ma_khach_hang')
                ->leftjoin('vouchers', 'vouchers.ma_voucher', '=', 'hoa_don_Bans.ma_voucher')
                ->select('hoa_don_Bans.*', 'khach_hangs.*', 'vouchers.*')
                ->where('hoa_don_Bans.ma_nhan_vien', '=', $manhanVien)
                ->latest('hoa_don_Bans.created_at')->paginate(5);
            }
            
            
        }
        else
        {
            $countHD = DB::table('hoa_don_Nhaps')->where('ma_nhan_vien', '=', $manhanVien)->count('ma_nhan_vien');
            $LoaiHD = 'HDN';
            if($countHD != 0)
            {
                $listHD =  DB::table('hoa_don_Nhaps')
                ->join('nha_cung_caps', 'nha_cung_caps.ma_nha_cung_cap', '=', 'hoa_don_Nhaps.ma_nha_cung_cap')
                ->select('hoa_don_Nhaps.*', 'nha_cung_caps.*')
                ->where('hoa_don_Nhaps.ma_nhan_vien', '=', $manhanVien)
                ->latest('hoa_don_Nhaps.created_at')->paginate(5);
            }

        }
        //dd($countHD);
        return view('Admin.NhanVien.DetailNhanVien',
        [
            'Data_NhanVien' => $nhanvien,
            'Count_HD' => $countHD,
            'List_HD' => $listHD,
            'Loai_HD' => $LoaiHD 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function edit( $manhanVien)
    {
        return view('Admin.NhanVien.EditNhanVien', 
        [
            'Data_NhanVien' => NhanVien::where('ma_nhan_vien', $manhanVien)->first(), 
            'Data_ChucVu'=>ChucVu::where('ma_chuc_vu', '<>', 'CV01')->get()
        ]);  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNhanVienRequest  $request
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNhanVienRequest $request,  $manhanVien)
    {
        if(isset($request->ma_nhan_vien))
        {
            $loai_tai_khoan = '';
            if($request->ma_chuc_vu == 'CV02')
                $loai_tai_khoan = 'LTK02';
            if($request->ma_chuc_vu == 'CV03')
                $loai_tai_khoan = 'LTK03';

            $olddata = TaiKhoan::find($manhanVien);
            $olddata->ma_loai_tai_khoan = $loai_tai_khoan;
            $olddata->save();


            $olddata = NhanVien::find($manhanVien);
            $fileName = $this->uploadImage($request);
            if($fileName!='')
                $olddata->anh_dai_dien = $fileName;
            $olddata->ten_nhan_vien = $request->ten_nhan_vien;
            $olddata->ngay_sinh = $request->ngay_sinh;
            $olddata->dia_chi = $request->dia_chi;
            $olddata->dien_thoai = $request->dien_thoai;
            $olddata->gioi_tinh = $request->gioi_tinh;
            $olddata->ma_chuc_vu = $request->ma_chuc_vu;
            $olddata->save();
            return redirect('Admin/NhanVien')->with('SuaNhanVien_ThanhCong', 'Sửa thành công mã nhân viên: '. $manhanVien);
        }
        else
        {
            $olddata = TaiKhoan::find($manhanVien.'@gmail.com');
            $olddata->mat_khau = Hash::make('123456');
            $olddata->save();
            return redirect()->route('Admin.NhanVien.show', $manhanVien)->with('CapNhapMatKhau_ThanhCong', 'Cập nhật mật khẩu thành công!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhanVien  $nhanVien
     * @return \Illuminate\Http\Response
     */
    public function destroy( $manhanVien)
    {
       if(HoaDonBan::where('ma_nhan_vien', '=', $manhanVien)->count() == 0 &&
       HoaDonNhap::where('ma_nhan_vien', '=', $manhanVien)->count() == 0)
       {
            NhanVien::Where('ma_nhan_vien', $manhanVien)->delete();
            TaiKhoan::Where('tai_khoan', $manhanVien)->delete();
            return redirect('Admin/NhanVien')->with('XoaNhanVien_ThanhCong', 'Xóa thành công mã nhân viên: '. $manhanVien);
       }
       return redirect('Admin/NhanVien')->with('XoaNhanVien_Error', 'Xóa không thành công mã nhân viên: '. $manhanVien.'(Nhân viên này đã tạo hóa đơn)');
    }

    public function uploadImage($request)
    {
        $fileName = '';
        if ($request->hasFile('anh_dai_dien')) 
        {
            $file = $request->anh_dai_dien;
            $fileName = $file->getClientOriginalName();
            $ext = $request->anh_dai_dien->extension();
            $fileName = time().'-NhanVien.'.$ext;
            $file->move(public_path('IMG_NhanVien/'), $fileName);
        }
        return $fileName;
    }
}
