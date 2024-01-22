<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNhap extends Model
{
    use HasFactory;

    protected $table='chi_tiet_hoa_don_nhaps';
    // protected $primaryKey = ['ma_hoa_don_nhap'];
    // protected $keyType = 'string'; 
    protected $fillable = ['ma_chi_tiet_san_pham',  'ma_hoa_don_nhap', 'so_luong_nhap', 'thanh_tien'];
}
