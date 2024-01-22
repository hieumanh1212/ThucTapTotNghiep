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
class MauSac extends Model
{
    use HasFactory;
    protected $table='mau_sacs';
    protected $primaryKey = 'ma_mau';
    protected $keyType = 'string';
    protected $fillable = ['ma_mau', 'mau'];
    public function getColorsByProductId($productId){
        return DB::table('san_phams')
            ->join('chi_tiet_san_phams', 'san_phams.ma_san_pham', '=', 'chi_tiet_san_phams.ma_san_pham')
            ->join('mau_sacs', 'mau_sacs.ma_mau', '=', 'chi_tiet_san_phams.ma_mau')
            ->where('san_phams.ma_san_pham', $productId)
            ->select('mau_sacs.*')->distinct()
            ->get();
    }
}
