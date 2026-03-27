<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\TabelaClassificacaoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\ArtilheiroController;

// -------- PÁGINA INICIAL --------
Route::get('/', [PublicController::class, 'index']);


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

        // ARTILHEIROS (só admin gerencia)
        Route::resource('artilheiros', ArtilheiroController::class);
        Route::get('/artilheiros-campeonato/{campeonato}', [ArtilheiroController::class, 'porCampeonato'])
            ->name('artilheiros.por-campeonato');

    });

    // -------- ROTAS COMPARTILHADAS (admin + responsável) --------
    // Times e Atletas — acesso liberado para ambos, filtro feito no controller
    Route::resource('times', TimeController::class);
    Route::resource('atletas', AtletaController::class);

    // Jogos
    Route::resource('jogos', JogoController::class);

    // Notícias
    Route::get('/noticia', [NoticiaController::class,'index'])->name('noticia');

});

// -------- RECUPERAÇÃO DE SENHA --------
Route::middleware('guest')->group(function () {
    // Formulário de esqueceu senha
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');
    
    // Enviar link de reset
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
        ->name('password.email');
    
    // Formulário de reset de senha
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');
    
    // Processar reset de senha
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
        ->name('password.update');
});

// -------- ROTAS PÚBLICAS --------
// Rota pública para ver artilheiros por campeonato
Route::get('/artilheiros/campeonato/{campeonato}', [ArtilheiroController::class, 'porCampeonato'])
    ->name('artilheiros.publico');