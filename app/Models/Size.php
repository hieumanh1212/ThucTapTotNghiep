<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Order
 *
 * @mixin Builder
 */
class Size extends Model
{
    use HasFactory;
    protected $table='sizes';
    protected $primaryKey = 'ma_size';
    protected $keyType = 'string';  
    protected $fillable = ['ma_size',  'size'];
    public function getSizesByProductId($productId){
        return DB::table('san_phams')
            ->join('chi_tiet_san_phams', 'san_phams.ma_san_pham', '=', 'chi_tiet_san_phams.ma_san_pham')
            ->join('sizes', 'sizes.ma_size', '=', 'chi_tiet_san_phams.ma_size')
            ->where('san_phams.ma_san_pham', $productId)
            ->select('sizes.*')->distinct()
            ->get();
    }
    public function getSizeFromColorAndProduct($colorId, $productId){
        return DB::table('sizes')
            ->join('chi_tiet_san_phams', 'sizes.ma_size', '=', 'chi_tiet_san_phams.ma_size')
            ->where('chi_tiet_san_phams.ma_mau','=',$colorId)
            ->where('chi_tiet_san_phams.ma_san_pham','=',$productId)
            ->where('so_luong','>',0)
            ->select('sizes.*','chi_tiet_san_phams.so_luong')->get();
    }
}
