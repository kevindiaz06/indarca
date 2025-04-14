<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('densimetros', function (Blueprint $table) {
            $table->boolean('calibrado')->nullable()->after('estado');
            $table->date('fecha_proxima_calibracion')->nullable()->after('calibrado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('densimetros', function (Blueprint $table) {
            $table->dropColumn('calibrado');
            $table->dropColumn('fecha_proxima_calibracion');
        });
    }
};
