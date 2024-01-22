<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamYeuThich extends Model
{
    use HasFactory;
    protected $table='san_pham_yeu_thiches';
    protected $fillable=['ma_chi_tiet_san_pham','ma_khach_hang'];

    public function getListWishList($customerId){
        $carts = SanPhamYeuThich::
        join('chi_tiet_san_phams','chi_tiet_san_phams.ma_chi_tiet_san_pham',
            '=','san_pham_yeu_thiches.ma_chi_tiet_san_pham')
            ->join('san_phams','san_phams.ma_san_pham','=','chi_tiet_san_phams.ma_san_pham')
            ->join('sizes','sizes.ma_size','=','chi_tiet_san_phams.ma_size')
            ->join('mau_sacs','mau_sacs.ma_mau','=','chi_tiet_san_phams.ma_mau')
            ->where('ma_khach_hang','=',$customerId)
            ->get();

//        $orderDetail = ChiTietHoaDonBan::where(['ma_hoa_don_ban'=>$orderId])->get();
        return $carts;
    }
}
