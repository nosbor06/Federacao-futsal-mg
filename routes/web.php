<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/campeonatos', [CampeonatoController::class,'index'])->name('campeonatos.index');
Route::get('/campeonatos/create', [CampeonatoController::class,'create'])->name('campeonatos.create');
Route::post('/campeonatos', [CampeonatoController::class,'store'])->name('campeonatos.store');
Route::get('/campeonatos/{campeonatos}/edit', [CampeonatoController::class,'edit'])->name('campeonatos.edit');
Route::put('/campeonatos/{campeonatos}', [CampeonatoController::class,'update'])->name('campeonatos.update');
Route::delete('/campeonatos/{campeonatos}', [CampeonatoController::class,'destroy'])->name('campeonatos.destroy');





