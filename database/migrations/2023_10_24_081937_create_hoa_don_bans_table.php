<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_bans', function (Blueprint $table) {
            $table->string('ma_hoa_don_ban')->primary();
            $table->dateTime('ngay_tao_hoa_don')->nullable();
            $table->double('tong_tien_hdb')->nullable();
            $table->boolean('trang_thai_thanh_toan')->nullable();
            $table->string('dia_chi_giao_hang')->nullable();
            $table->text('ghi_chu')->nullable();
            $table->string('nguoi_nhan')->nullable();
            $table->string('so_dien_thoai_nguoi_nhan')->nullable();
            $table->string('tinh_trang_hoa_don')->nullable();
            $table->string('ma_khach_hang')->nullable();
            $table->string('ma_nhan_vien')->nullable();
            $table->string('ma_voucher')->nullable();
            $table->foreign('ma_khach_hang')->references('ma_khach_hang')->on('khach_hangs');
            $table->foreign('ma_nhan_vien')->references('ma_nhan_vien')->on('nhan_viens');
            $table->foreign('ma_voucher')->references('ma_voucher')->on('vouchers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoa_don_bans');
    }
}
