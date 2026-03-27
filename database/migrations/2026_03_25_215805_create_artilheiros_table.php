<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artilheiros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id')->constrained()->cascadeOnDelete();
            $table->foreignId('atleta_id')->constrained()->cascadeOnDelete();
            $table->foreignId('time_id')->constrained()->cascadeOnDelete();
            $table->integer('gols')->default(0);
            $table->timestamps();
            
            // Índice para performance
            $table->index(['campeonato_id', 'gols']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artilheiros');
    }
};