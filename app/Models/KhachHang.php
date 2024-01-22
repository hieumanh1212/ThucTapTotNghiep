<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table='khach_hangs';
    protected $primaryKey = 'ma_khach_hang';
    protected $keyType = 'string';  
    protected $fillable = ['ma_khach_hang', 
                        'ten_khach_hang', 
                        'ngay_sinh', 
                        'dia_chi', 
                        'dien_thoai', 
                        'gioi_tinh', 
                        'email'];

}
