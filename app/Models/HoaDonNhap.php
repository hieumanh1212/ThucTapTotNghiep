<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table='hoa_don_nhaps';
    protected $primaryKey = 'ma_hoa_don_nhap';
    protected $keyType = 'string';  
    protected $fillable=['ma_hoa_don_nhap',
                        'ngay_nhap',
                        'tong_tien_hdn',
                        'ma_nha_cung_cap', 
                        'ma_nhan_vien'];
}
