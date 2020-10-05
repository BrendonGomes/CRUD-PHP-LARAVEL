<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gols', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jogador')->unsigned();
            $table->integer('id_partida')->unsigned();
            $table->foreign('id_jogador')->references('id')->on('jogadores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_partida')->references('id')->on('partidas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('gols');
    }
}
