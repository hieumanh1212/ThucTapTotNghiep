<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Voucher
 *
 * @mixin Builder
 */
class Voucher extends Model
{
    use HasFactory;
    protected $table='vouchers';
    protected $primaryKey = 'ma_voucher';
    protected $keyType = 'string';  
    protected $fillable = ['ma_voucher',  
                        'ten_voucher', 
                        'phan_tram', 
                        'so_luong', 
                        'ngay_bat_dau', 
                        'ngay_ket_thuc'];
}
