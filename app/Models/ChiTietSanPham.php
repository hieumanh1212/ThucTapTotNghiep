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
class ChiTietSanPham extends Model
{
    use HasFactory;

    public function mauSac() {
        return $this->belongsTo(MauSac::class, 'ma_mau', 'ma_mau');
    }
    protected $table = 'chi_tiet_san_phams';

    protected $primaryKey = 'ma_chi_tiet_san_pham';
    protected $keyType = 'string';  
    protected $fillable = ['ma_chi_tiet_san_pham', 
                        'so_luong', 
                        'trang_thai', 
                        'ma_san_pham', 
                        'ma_size', 
                        'ma_mau'];

    public function getProductDetailsByProductId($productId){
        return ChiTietSanPham::where('ma_san_pham', '=', $productId);
    }

    public function getProductDetailByProductInfo($productId, $sizeId, $colorId)
    {
        $productDetail = ChiTietSanPham::where(['ma_san_pham' => $productId,
            'ma_size' => $sizeId, 'ma_mau' => $colorId])->first();
        return $productDetail;
    }
    
    public function updateProductQuantity($productDetailId,$soldQuantity){
        $productDetail = ChiTietSanPham::where('ma_chi_tiet_san_pham', '=', $productDetailId)->first();
        if ($productDetail) {
            $newQuantity = (int)$productDetail->so_luong - $soldQuantity;
            ChiTietSanPham::where('ma_chi_tiet_san_pham', '=', $productDetailId)->update(['so_luong' => $newQuantity]);

            if ($newQuantity <= 0) {
                ChiTietSanPham::where('ma_chi_tiet_san_pham', '=', $productDetailId)->update(['trang_thai' => 'Hết hàng']);
            }
        }
    }
}
