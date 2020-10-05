<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class times extends Model
{
    protected $table='times';
    protected $fillable=['nome_time'];
    use HasFactory;

    public function relJogadores(){
        return $this->hasMany('App\Models\jogadores','id_time');
    }

    public function relPartidasA(){
        return $this->hasMany('App\Models\partidas','id_time_a');
    }
    
    public function relPartidasB(){
        return $this->hasMany('App\Models\partidas','id_time_b');
    }
}
