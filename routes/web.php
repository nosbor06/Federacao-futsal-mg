<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// -------- PÁGINA INICIAL --------
Route::get('/', function () {
    return redirect('/login');
});


// -------- AUTH --------
Route::get('/cadastro', [AuthController::class, 'showCadastro']);
Route::post('/cadastro', [AuthController::class, 'cadastro']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);


// -------- ROTAS PROTEGIDAS --------
Route::middleware('auth')->group(function () {

    // DASHBOARDS
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/responsavel/dashboard', function () {
        return view('responsavel.dashboard');
    });

    // CAMPEONATOS
    Route::get('/campeonatos', [CampeonatoController::class,'index'])->name('campeonatos.index');
    Route::get('/campeonatos/create', [CampeonatoController::class,'create'])->name('campeonatos.create');
    Route::post('/campeonatos', [CampeonatoController::class,'store'])->name('campeonatos.store');
    Route::get('/campeonatos/{campeonato}/edit', [CampeonatoController::class,'edit'])->name('campeonatos.edit');
    Route::put('/campeonatos/{campeonato}', [CampeonatoController::class,'update'])->name('campeonatos.update');
    Route::delete('/campeonatos/{campeonato}', [CampeonatoController::class,'destroy'])->name('campeonatos.destroy');

    // TIMES E ATLETAS
    Route::resource('times', TimeController::class);
    Route::resource('atletas', AtletaController::class);

});