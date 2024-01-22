<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_san_phams', function (Blueprint $table) {
            $table->string('ma_chi_tiet_san_pham');
            $table->integer('so_luong')->nullable();
            $table->string('trang_thai')->nullable();
            $table->string('ma_san_pham')->nullable();
            $table->string('ma_size')->nullable();
            $table->string('ma_mau')->nullable();
            $table->primary('ma_chi_tiet_san_pham');
            $table->foreign('ma_san_pham')->references('ma_san_pham')->on('san_phams');
            $table->foreign('ma_size')->references('ma_size')->on('sizes');
            $table->foreign('ma_mau')->references('ma_mau')->on('mau_sacs');
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
        Schema::dropIfExists('chi_tiet_san_phams');
    }
}
