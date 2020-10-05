<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora_ini',0);
            $table->time('hora_fim',0);
            $table->integer('placara');
            $table->integer('placarb');
            $table->integer('id_time_a')->unsigned();
            $table->integer('id_time_b')->unsigned();
            $table->foreign('id_time_a')->references('id')->on('times')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_time_b')->references('id')->on('times')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('partidas');
    }
}
