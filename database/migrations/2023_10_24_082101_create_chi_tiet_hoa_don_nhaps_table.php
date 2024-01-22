<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_don_nhaps', function (Blueprint $table) {
            $table->string('ma_chi_tiet_san_pham');
            $table->string('ma_hoa_don_nhap');
            $table->integer('so_luong_nhap')->nullable();
            $table->double('thanh_tien')->nullable();
            $table->primary(['ma_chi_tiet_san_pham', 'ma_hoa_don_nhap'],'pk_ma_hdn_ma_ctsp');
            $table->foreign('ma_chi_tiet_san_pham')->references('ma_chi_tiet_san_pham')->on('chi_tiet_san_phams');
            $table->foreign('ma_hoa_don_nhap')->references('ma_hoa_don_nhap')->on('hoa_don_nhaps');
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
        Schema::dropIfExists('chi_tiet_hoa_don_nhaps');
    }
}
