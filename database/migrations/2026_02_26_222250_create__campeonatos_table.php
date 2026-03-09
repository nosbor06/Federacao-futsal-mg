<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('categoria');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->enum('status', ['inscricoes_abertas','em_andamento','encerrado','cancelado'])->default('inscricoes_abertas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campeonatos');
    }
};
