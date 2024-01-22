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
class HoaDonBan extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_hoa_don_ban';
    protected $keyType = 'string';
    protected $table='hoa_don_bans';
    protected $fillable=['ma_hoa_don_ban',
                        'ngay_tao_hoa_don',
                        'tong_tien_hdb',
                        'trang_thai_thanh_toan',
                        'dia_chi_giao_hang',
                        'ghi_chi',
                        'nguoi_nhan',
                        'so_dien_thoai_nguoi_nhan', 
                        'tinh_trang_hoa_don', 
                        'ma_khach_hang', 
                        'ma_nhan_vien', 
                        'ma_voucher'];
    public function getUserCartId($user_id){
//        dd($user_id);
        $order = DB::table('hoa_don_bans')
            ->where('ma_khach_hang','=',$user_id)
            ->where('tinh_trang_hoa_don','=','Thêm giỏ hàng')
            ->first();

        if($order){
            return $order->ma_hoa_don_ban;
        }
        return -1;
    }
    public function updateOrderInfo($userId,$fullName,$phoneNumber,$address,$note,$payment,$total){
        $orderId = $this->getUserCartId($userId);
        $updateOrder = HoaDonBan::where(['ma_khach_hang' => $userId,'tinh_trang_hoa_don'=>'Thêm giỏ hàng'])
            ->update(['trang_thai_thanh_toan'=>$payment,
                      'nguoi_nhan'=>$fullName,
                      'dia_chi_giao_hang'=>$address,
                      'ghi_chu'=>$note,
                      'so_dien_thoai_nguoi_nhan'=>$phoneNumber,
                      'tong_tien_hdb'=>$total,
                      'tinh_trang_hoa_don'=>'Chờ xác nhận'
                    ]);
        return $updateOrder;
    }
    public function updateVoucher($userId,$voucherId){
//        $orderId = $this->getUserCartId($userId);
//        $checkExistVoucher = Voucher::where('ma_voucher',$voucherId)->get();
//        if(count($checkExistVoucher)==0){
//            return false;
//        }
//        $order = HoaDonBan::where(['ma_khach_hang' => $userId
//            ,'tinh_trang_hoa_don'=>'Thêm giỏ hàng']);
    }
}
