<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gols extends Model
{
    protected $table = 'gols';
    use HasFactory;

    public function relJogador(){
        return $this->hasOne('App\Models\jogadores','id','id_jogador');
    }
    public function relPartida(){
        return $this->hasOne('App\Models\partidas','id','id_partida');
    }
}
