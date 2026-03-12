<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('TabelaClassificacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id')->constrained()->cascadeOnDelete();
            $table->foreignId('time_id')->constrained()->cascadeOnDelete();
            $table->integer('jogos')->default(0);
            $table->integer('vitorias')->default(0);
            $table->integer('empates')->default(0);
            $table->integer('derrotas')->default(0);
            $table->integer('gols_pro')->default(0);
            $table->integer('gols_contra')->default(0);
            $table->integer('saldo_gols')->default(0);
            $table->integer('pontos')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TabelaClassificacoes');
    }
};
