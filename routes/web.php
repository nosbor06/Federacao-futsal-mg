<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\TabelaClassificacaoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoticiaController;

// -------- PÁGINA INICIAL --------
Route::get('/', function () {
    return redirect('/login');
});


// -------- AUTH --------
Route::get('/cadastro', [AuthController::class, 'showCadastro'])->name('cadastro');
Route::post('/cadastro', [AuthController::class, 'cadastro'])->name('cadastro.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// -------- ROTAS PROTEGIDAS --------
Route::middleware('auth')->group(function () {

    // DASHBOARD DO RESPONSÁVEL (apenas responsavel)
    Route::get('/responsavel/dashboard', function () {
        return view('responsavel.dashboard');
    })->middleware('responsavel')->name('responsavel.dashboard');


    // -------- ROTAS EXCLUSIVAS DO ADMIN --------
    Route::middleware('admin')->group(function () {

        // DASHBOARD DO ADMIN
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // CAMPEONATOS (só admin gerencia)
        Route::get('/campeonatos', [CampeonatoController::class,'index'])->name('campeonatos.index');
        Route::get('/campeonatos/create', [CampeonatoController::class,'create'])->name('campeonatos.create');
        Route::post('/campeonatos', [CampeonatoController::class,'store'])->name('campeonatos.store');
        Route::get('/campeonatos/{campeonato}/edit', [CampeonatoController::class,'edit'])->name('campeonatos.edit');
        Route::put('/campeonatos/{campeonato}', [CampeonatoController::class,'update'])->name('campeonatos.update');
        Route::delete('/campeonatos/{campeonato}', [CampeonatoController::class,'destroy'])->name('campeonatos.destroy');

        // TABELA DE CLASSIFICAÇÃO (só admin gerencia)
        Route::resource('TabelaClassificacoes', TabelaClassificacaoController::class)
            ->parameters(['TabelaClassificacoes' => 'tabelaClassificacao']);

    });

    // -------- ROTAS COMPARTILHADAS (admin + responsável) --------
    // Times e Atletas — acesso liberado para ambos, filtro feito no controller
    Route::resource('times', TimeController::class);
    Route::resource('atletas', AtletaController::class);

    // -----------ROTAS NOTICIAS ------------
    Route::get('/noticia', [NoticiaController::class,'index'])->name('noticia');

});