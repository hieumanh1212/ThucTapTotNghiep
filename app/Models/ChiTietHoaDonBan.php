<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 * OrderDetail
 *
 * @mixin Builder
 */
class ChiTietHoaDonBan extends Model
{
    use HasFactory;
    protected $table='chi_tiet_hoa_don_bans';
    protected $fillable=['ma_hoa_don_ban','ma_chi_tiet_san_pham','so_luong_ban','thanh_tien'];
    public function checkProductExistInOrder($productDetailId,$order_id)
    {
        $orderDetail = ChiTietHoaDonBan::where(['ma_hoa_don_ban'=> $order_id,'ma_chi_tiet_san_pham'=>$productDetailId])->first();
        if ($orderDetail){
            return $orderDetail;
        }
        return null;
    }
    public function getProductInCartByOrderId($orderId){
        $carts = ChiTietHoaDonBan::
            join('chi_tiet_san_phams','chi_tiet_hoa_don_bans.ma_chi_tiet_san_pham',
            '=','chi_tiet_san_phams.ma_chi_tiet_san_pham')
            ->join('san_phams','san_phams.ma_san_pham','=','chi_tiet_san_phams.ma_san_pham')
            ->join('sizes','sizes.ma_size','=','chi_tiet_san_phams.ma_size')
            ->join('mau_sacs','mau_sacs.ma_mau','=','chi_tiet_san_phams.ma_mau')
            ->where('chi_tiet_hoa_don_bans.ma_hoa_don_ban','=',$orderId)
            ->get();

//        $orderDetail = ChiTietHoaDonBan::where(['ma_hoa_don_ban'=>$orderId])->get();
        return $carts;
    }
}
