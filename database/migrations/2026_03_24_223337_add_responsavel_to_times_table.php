<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('times', function (Blueprint $table) {
            // Se não existir, adiciona o campo
            if (!Schema::hasColumn('times', 'responsavel_id')) {
                $table->foreignId('responsavel_id')
                    ->nullable()
                    ->constrained('users')
                    ->onDelete('set null')
                    ->after('user_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('times', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\User::class, 'responsavel_id');
        });
    }
};