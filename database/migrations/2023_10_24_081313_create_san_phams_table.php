<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->string('ma_san_pham')->primary();
            $table->string('ten_san_pham')->nullable();
            $table->double('don_gia_nhap')->nullable();
            $table->double('don_gia_ban')->nullable();
            $table->double('giam_gia')->nullable();
            $table->string('anh_dai_dien')->nullable();
            $table->string('mo_ta')->nullable();
            $table->string('ma_the_loai')->nullable();
            $table->foreign('ma_the_loai')->references('ma_the_loai')->on('the_loais');
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
        Schema::dropIfExists('san_phams');
    }
}
