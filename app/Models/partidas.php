<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partidas extends Model
{
    protected $table = 'partidas';
    protected $fillable=['hora_ini','hora_fim','placara','placarb','id_time_a', 'id_time_b'];
    use HasFactory;

    public function relTimeA(){
        return $this->hasOne('App\Models\times','id','id_time_a');
    }
    public function relTimeB(){
        return $this->hasOne('App\Models\times','id','id_time_b');
    }

    public function relCartoes(){
        return $this->hasMany('App\Models\cartoes','id_partida');
    }

    public function relGols(){
        return $this->hasMany('App\Models\gols','id_partida');
    }
}
