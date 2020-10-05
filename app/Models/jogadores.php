<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jogadores extends Model
{
    protected $table = 'jogadores';
    protected $fillable=['nome','numero_camisa','cpf','id_time'];
    use HasFactory;

    public function relTime(){
        return $this->hasOne('App\Models\times','id','id_time');
    }

    public function relCartoes(){
        return $this->hasMany('App\Models\cartoes','id_jogador');
    }

    public function relGols(){
        return $this->hasMany('App\Models\gols','id_jogador');
    }
    
}
