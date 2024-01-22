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
class SanPham extends Model
{
    use HasFactory;
    protected $table='san_phams';
    protected $primaryKey = 'ma_san_pham';
    protected $keyType = 'string';  
    protected $fillable = ['ma_san_pham', 
                        'ten_san_pham', 
                        'don_gia_nhap', 
                        'don_gia_ban', 
                        'giam_gia', 
                        'anh_dai_dien', 
                        'mo_ta', 
                        'ma_the_loai'];
    public function getAllProducts(){
        return $products = SanPham::paginate(8);
    }

    public function getProducts(){
        return SanPham::select('san_phams.*', 'the_loais.ten_the_loai')
        ->join('the_loais', 'san_phams.ma_the_loai', '=', 'the_loais.ma_the_loai')
        ->take(8)->get();
    }

    public function details()
    {
        return $this->hasMany(ChiTietSanPham::class, 'ma_san_pham', 'ma_san_pham');
    }

    public function colors()
    {
        return $this->hasManyThrough(MauSac::class, ChiTietSanPham::class, 'ma_san_pham', 'ma_mau', 'ma_san_pham', 'ma_mau');
    }

    public function sizes()
    {
        return $this->hasManyThrough(Size::class, ChiTietSanPham::class, 'ma_san_pham', 'ma_size', 'ma_san_pham', 'ma_size');
    }

    public function images()
    {
        return $this->hasMany(AnhSanPham::class, 'ma_san_pham', 'ma_san_pham');

    }
    public function getProductsAndCategoriesByProductId($productId){
        return DB::table('san_phams')->join('the_loais','the_loais.ma_the_loai'
            ,'=','san_phams.ma_the_loai')
            ->where('ma_san_pham','=', $productId)
            ->select('san_phams.*','the_loais.*')->first();
    }
}
