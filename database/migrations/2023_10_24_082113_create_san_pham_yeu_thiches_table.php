<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamYeuThichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham_yeu_thiches', function (Blueprint $table) {
            $table->string('ma_khach_hang');
            $table->string('ma_chi_tiet_san_pham');
            $table->primary(['ma_khach_hang', 'ma_chi_tiet_san_pham'],'pk_ma_kh_ma_ctsp');
            $table->foreign('ma_khach_hang')->references('ma_khach_hang')->on('khach_hangs');
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
        Schema::dropIfExists('san_pham_yeu_thiches');
    }
}
