<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->string('ma_khach_hang')->primary();
            $table->string('ten_khach_hang')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('dien_thoai')->nullable();
            $table->boolean('gioi_tinh')->nullable();
            $table->string('email')->nullable();
            $table->string('anh_dai_dien')->nullable();
            $table->string('tai_khoan')->nullable();
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
        Schema::dropIfExists('khach_hangs');
    }
}
