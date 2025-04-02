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
        // Crear la tabla densimetros si no existe
        if (!Schema::hasTable('densimetros')) {
            Schema::create('densimetros', function (Blueprint $table) {
                $table->id();
                $table->string('numero_serie')->unique();
                $table->string('marca')->nullable();
                $table->string('modelo')->nullable();
                $table->timestamps();
            });
        } else {
            // Si la tabla densimetros ya existe, modificarla para asegurar que tenga la estructura correcta
            Schema::table('densimetros', function (Blueprint $table) {
                if (!Schema::hasColumn('densimetros', 'numero_serie')) {
                    $table->string('numero_serie')->unique();
                }
                if (!Schema::hasColumn('densimetros', 'marca')) {
                    $table->string('marca')->nullable();
                }
                if (!Schema::hasColumn('densimetros', 'modelo')) {
                    $table->string('modelo')->nullable();
                }
            });
        }

        // Crear la tabla registros si no existe
        if (!Schema::hasTable('registros')) {
            Schema::create('registros', function (Blueprint $table) {
                $table->id();
                $table->foreignId('densimetro_id')->constrained('densimetros')->onDelete('cascade');
                $table->foreignId('cliente_id')->nullable()->constrained('users')->onDelete('set null');
                $table->date('fecha_entrada');
                $table->date('fecha_finalizacion')->nullable();
                $table->string('referencia_reparacion', 20)->unique();
                $table->enum('estado', ['recibido', 'en_reparacion', 'finalizado', 'entregado'])->default('recibido');
                $table->text('observaciones')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Solo eliminar la tabla registros, ya que densimetros ya existía
        Schema::dropIfExists('registros');
    }
};
