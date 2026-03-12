<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\TabelaClassificacaoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ------ campeonatos -------
Route::get('/campeonatos', [CampeonatoController::class,'index'])->name('campeonatos.index');
Route::get('/campeonatos/create', [CampeonatoController::class,'create'])->name('campeonatos.create');
Route::post('/campeonatos', [CampeonatoController::class,'store'])->name('campeonatos.store');
Route::get('/campeonatos/{campeonato}/edit', [CampeonatoController::class,'edit'])->name('campeonatos.edit');
Route::put('/campeonatos/{campeonato}', [CampeonatoController::class,'update'])->name('campeonatos.update');
Route::delete('/campeonatos/{campeonato}', [CampeonatoController::class,'destroy'])->name('campeonatos.destroy');

// ----- TIMES, ATLETAS E TABELAS ------
Route::resource('times', TimeController::class);
Route::resource('atletas', AtletaController::class);
Route::resource('TabelaClassificacoes', TabelaClassificacaoController::class)->parameters(['TabelaClassificacoes' => 'tabelaClassificacao']);
// ----- AUTH ------
Route::get('/cadastro', [AuthController::class, 'showCadastro']);
Route::post('/cadastro', [AuthController::class, 'cadastro']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);