<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('times', 'escudo')) {
            Schema::table('times', function (Blueprint $table) {
                $table->string('escudo')->nullable()->after('ginasio');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('times', 'escudo')) {
            Schema::table('times', function (Blueprint $table) {
                $table->dropColumn('escudo');
            });
        }
    }
};