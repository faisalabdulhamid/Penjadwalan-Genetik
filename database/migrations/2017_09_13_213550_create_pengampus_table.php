<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengampu', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('matkul_id')->nullable();
            $table->unsignedInteger('dosen_id')->nullable();
            $table->unsignedInteger('kelas_id')->nullable();
            $table->unsignedInteger('tahun_ajaran_id')->nullable();

            $table->foreign('matkul_id')->references('id')->on('matakuliah')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dosen_id')->references('id')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran')->onUpdate('cascade')->onDelete('cascade');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengampu');
    }
}
