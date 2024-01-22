<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_don_bans', function (Blueprint $table) {
            $table->string('ma_hoa_don_ban');
            $table->string('ma_chi_tiet_san_pham');
            $table->integer('so_luong_ban')->nullable();
            $table->double('thanh_tien')->nullable();
            $table->primary(['ma_hoa_don_ban', 'ma_chi_tiet_san_pham'], 'pk_ma_hdb_ma_ctsp');
            $table->foreign('ma_hoa_don_ban')->references('ma_hoa_don_ban')->on('hoa_don_bans');
            $table->foreign('ma_chi_tiet_san_pham')->references('ma_chi_tiet_san_pham')->on('chi_tiet_san_phams');
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
        Schema::dropIfExists('chi_tiet_hoa_don_bans');
    }
}
