<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatematakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_mk', 30)->unique();
            $table->string('nama');
            $table->unsignedTinyInteger('sks');
            $table->enum('semester', ['1', '2', '3', '4', '5', '6', '7', '8']);
            $table->enum('jenis', ['TEORI', 'PRAKTIKUM']);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliah');
    }
}
