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
        Schema::table('empresas', function (Blueprint $table) {
            $table->string('logo')->nullable()->after('telefono');
            $table->enum('tipo_cliente', ['Cliente Habitual', 'Colaborador', 'Patrocinador'])->default('Cliente Habitual')->after('logo');
            $table->boolean('destacado')->default(false)->after('tipo_cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn(['logo', 'tipo_cliente', 'destacado']);
        });
    }
};
