<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKetentuanDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketentuan_dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('bobot_fitness')->default(5);
            $table->unsignedInteger('dosen_id');
            $table->unsignedInteger('hari_id');
            $table->unsignedInteger('jam_id');
//            $table->timestamps();

            $table->foreign('dosen_id')
                ->references('id')
                ->on('dosen')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('hari_id')
                ->references('id')
                ->on('hari')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('jam_id')
                ->references('id')
                ->on('jam')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ketentuan_dosen');
    }
}
