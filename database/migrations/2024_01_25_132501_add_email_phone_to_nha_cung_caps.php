<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailPhoneToNhaCungCaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nha_cung_caps', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('so_dien_thoai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nha_cung_caps', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('so_dien_thoai');
        });
    }
}
