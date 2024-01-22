<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonNhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_nhaps', function (Blueprint $table) {
            $table->string('ma_hoa_don_nhap')->nullable();
            $table->dateTime('ngay_nhap')->nullable();
            $table->double('tong_tien_hdn')->nullable();
            $table->string('ma_nha_cung_cap')->nullable();
            $table->string('ma_nhan_vien')->nullable();
            $table->primary('ma_hoa_don_nhap');
            $table->foreign('ma_nha_cung_cap')->references('ma_nha_cung_cap')->on('nha_cung_caps');
            $table->foreign('ma_nhan_vien')->references('ma_nhan_vien')->on('nhan_viens');
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
        Schema::dropIfExists('hoa_don_nhaps');
    }
}
