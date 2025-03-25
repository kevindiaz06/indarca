<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('densimetros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('users')->onDelete('cascade');
            $table->string('numero_serie');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->date('fecha_entrada');
            $table->string('referencia_reparacion')->unique();
            $table->string('estado')->default('recibido');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('densimetros');
    }
};
