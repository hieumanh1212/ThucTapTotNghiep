<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NhanVienCommon extends Controller
{
    public function getInfoEmployee(){
        $employeeId = session('userInfo.ma_nhan_vien');
        $employee = NhanVien::getInfo($employeeId);
        return view('NhanVien/NhanVienInfo',['employee' => $employee]);
    }
    public function getViewChangePass()
    {
        return view('NhanVien/ChangePassword');
    }
    public function changePassword(Request $request){
//        dd('123');
        $employeeId = session('userInfo.ma_nhan_vien');
        $account = DB::table('nhan_viens')
            ->join('tai_khoans','nhan_viens.tai_khoan','=','tai_khoans.tai_khoan')
            ->where(['ma_nhan_vien' => $employeeId])->first();
        $oldPassword = $account->mat_khau;
        $oldPasswordRequest = $request->oldPassword;
        if(Hash::check($oldPasswordRequest,$oldPassword)){
//            dd(Hash::make($request->newPassword));
//            dd('1');
            NhanVien::updatePassword(Hash::make($request->newPassword),$employeeId);
//            session()->flash();
            return redirect('NhanVien/getViewChangePass')->with('message','Đổi mật khẩu thành công');
        }
        return redirect('NhanVien/getViewChangePass')->with('messageError','Mật khẩu cũ không trùng khớp');
    }
}
