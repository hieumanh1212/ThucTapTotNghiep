<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Order
 *
 * @mixin Builder
 */
class AnhSanPham extends Model
{
    use HasFactory;
    protected $table='anh_san_phams';
    protected $primaryKey = 'ma_anh';
    protected $keyType = 'string';  
    protected $fillable = ['ma_anh', 'hinh_anh', 'ma_san_pham'];
}
