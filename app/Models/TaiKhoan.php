<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Order
 *
 * @mixin Builder
 */
class TaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'tai_khoans';
    protected $primaryKey = 'tai_khoan';
    protected $keyType = 'string';  
    protected $fillable = [
        'tai_khoan', 
        'mat_khau', 
        'ma_loai_tai_khoan', 
        'verified',
        'gooole_id',
        'facebook_id',
    ];
    public function checkLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        $user =  TaiKhoan::where(['tai_khoan' => $username, 'mat_khau' => $password])->first();
        if($user){
            return DB::table('tai_khoans')
                ->join('khach_hangs', 'tai_khoans.tai_khoan', '=', 'khach_hangs.tai_khoan')
                ->select('tai_khoans.*', 'khach_hangs.*')
                ->where('tai_khoans.tai_khoan','=',$username)
                ->first();
        }
        return null;
    }
}