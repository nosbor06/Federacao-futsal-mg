<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id')->constrained()->cascadeOnDelete();
            $table->foreignId('time_casa_id')->constrained('times')->cascadeOnDelete();
            $table->foreignId('time_visitante_id')->constrained('times')->cascadeOnDelete();
            $table->integer('gols_casa')->nullable();
            $table->integer('gols_visitante')->nullable();
            $table->dateTime('data_hora')->nullable();
            $table->enum('status', ['agendado', 'finalizado'])->default('agendado');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};