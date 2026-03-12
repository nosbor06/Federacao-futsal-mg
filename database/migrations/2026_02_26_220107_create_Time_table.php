<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('times', function (Blueprint $table) {

            $table->id();

            $table->string('nome', 200);

            $table->string('cnpj', 20)->unique();

            $table->string('cidade', 200);

            $table->string('ginasio', 200);

            // responsável pelo time
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};