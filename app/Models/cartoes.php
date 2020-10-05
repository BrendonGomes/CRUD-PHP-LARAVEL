<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartoes extends Model
{
    protected $table = 'cartoes';
    use HasFactory;

    public function relPartida(){
        return $this->hasOne('App\Models\partidas','id','id_partida');
    }
    public function relJogador(){
        return $this->hasOne('App\Models\jogadores','id','id_jogador');
    }
}
