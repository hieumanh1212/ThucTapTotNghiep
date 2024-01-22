<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * OrderDetail
 *
 * @mixin Builder
 */
class NhanVien extends Model
{
    use HasFactory;
    protected $table='nhan_viens';
    protected $primaryKey = 'ma_nhan_vien';
    protected $keyType = 'string';
    protected $fillable = ['ma_nhan_vien',
                        'ngay_sinh',
                        'dia_chi',
                        'dien_thoai',
                        'ten_nhan_vien',
                        'gioi_tinh',
                        'anh_dai_dien',
                        'ma_chuc_vu',
                        'tai_khoan'];
    public static function getInfo($employeeId){
        return DB::table('nhan_viens')
            ->join('chuc_vus','nhan_viens.ma_chuc_vu','=','chuc_vus.ma_chuc_vu')
            ->where(['ma_nhan_vien' => $employeeId])->first();
    }
    public static function updatePassword($newPassword,$employeeId){
        return DB::table('nhan_viens')
            ->join('tai_khoans','nhan_viens.tai_khoan','=','tai_khoans.tai_khoan')
            ->where(['ma_nhan_vien' => $employeeId])
            ->update(['mat_khau'=>$newPassword]);
    }
}
