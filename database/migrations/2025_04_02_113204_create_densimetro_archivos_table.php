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
        Schema::create('densimetro_archivos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('densimetro_id')->constrained('densimetros')->onDelete('cascade');
            $table->string('nombre_archivo');
            $table->string('ruta_archivo');
            $table->string('tipo_archivo');
            $table->string('extension');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('tamano')->comment('Tamaño en bytes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('densimetro_archivos');
    }
};
