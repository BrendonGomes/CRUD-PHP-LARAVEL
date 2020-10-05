<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JogadoresController;
use App\Http\Controllers\PartidasController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\TimesController;

Route::resource('/index', HomeController::class);
Route::resource('/times', TimesController::class);
Route::resource('/jogadores', JogadoresController::class);
Route::resource('/partidas', PartidasController::class);
Route::resource('/ranking', RankingController::class);