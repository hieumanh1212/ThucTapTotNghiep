<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiKhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->string('tai_khoan')->primary();
            $table->string('mat_khau')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('ma_loai_tai_khoan')->nullable();
            $table->foreign('ma_loai_tai_khoan')->references('ma_loai_tai_khoan')->on('loai_tai_khoans');
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
        Schema::dropIfExists('tai_khoans');
    }
}
