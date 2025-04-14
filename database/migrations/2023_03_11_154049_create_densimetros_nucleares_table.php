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
        Schema::create('densimetros_nucleares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')->nullable()->constrained('empresas')->onDelete('set null');
            $table->string('numero_serie')->unique();
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
        Schema::dropIfExists('densimetros_nucleares');
    }
};
