<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnhSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anh_san_phams', function (Blueprint $table) {
            $table->string('ma_anh')->primary();
            $table->string('hinh_anh')->nullable();
            $table->string('ma_san_pham')->nullable();
            $table->foreign('ma_san_pham')->references('ma_san_pham')->on('san_phams');
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
        Schema::dropIfExists('anh_san_phams');
    }
}
