<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    use HasFactory;
    protected $table='nha_cung_caps';
    protected $primaryKey = 'ma_nha_cung_cap';
    protected $keyType = 'string';  
    protected $fillable = ['ma_nha_cung_cap', 'ten_nha_cung_cap', "email" ,"so_dien_thoai"];
}
