<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\AtletaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ------ CAMPEONATOS -------
Route::get('/campeonatos', [CampeonatoController::class,'index'])->name('campeonatos.index');
Route::get('/campeonatos/create', [CampeonatoController::class,'create'])->name('campeonatos.create');
Route::post('/campeonatos', [CampeonatoController::class,'store'])->name('campeonatos.store');
Route::get('/campeonatos/{campeonato}/edit', [CampeonatoController::class,'edit'])->name('campeonatos.edit');
Route::put('/campeonatos/{campeonato}', [CampeonatoController::class,'update'])->name('campeonatos.update');
Route::delete('/campeonatos/{campeonato}', [CampeonatoController::class,'destroy'])->name('campeonatos.destroy');


// ----- TIMES E ATLETAS ------
Route::resource('times', TimeController::class);
Route::resource('atletas', AtletaController::class);