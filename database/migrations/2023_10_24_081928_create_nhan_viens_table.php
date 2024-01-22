<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->string('ma_nhan_vien')->primary();
            $table->date('ngay_sinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('dien_thoai')->nullable();
            $table->string('ten_nhan_vien')->nullable();
            $table->boolean('gioi_tinh')->nullable();
            $table->string('anh_dai_dien')->nullable();
            $table->string('ma_chuc_vu')->nullable();
            $table->string('tai_khoan')->nullable();
            $table->foreign('ma_chuc_vu')->references('ma_chuc_vu')->on('chuc_vus');
            $table->foreign('tai_khoan')->references('tai_khoan')->on('tai_khoans');
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
        Schema::dropIfExists('nhan_viens');
    }
}
