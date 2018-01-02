<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKetentuanRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketentuan_ruangan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ruangan_id');
            $table->unsignedInteger('hari_id');
//            $table->unsignedInteger('jam_id'); //berbagi dengan prodi lain

            $table->foreign('ruangan_id')->references('id')->on('ruangan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hari_id')->references('id')->on('hari')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ketentuan_ruangan');
    }
}
