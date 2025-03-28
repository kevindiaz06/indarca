<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Primero cambiamos el tipo de columna a string para poder modificarla
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 20)->change();
        });

        // Actualizamos todos los usuarios con role 'web' a 'cliente'
        DB::table('users')->where('role', 'web')->update(['role' => 'cliente']);

        // Volvemos a convertir la columna a enum con los nuevos valores
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['cliente', 'trabajador', 'admin'])->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Primero cambiamos el tipo de columna a string para poder modificarla
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 20)->change();
        });

        // Revertimos los cambios, convirtiendo 'cliente' de nuevo a 'web'
        DB::table('users')->where('role', 'cliente')->update(['role' => 'web']);

        // Volvemos a convertir la columna a enum con los valores originales
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['web', 'trabajador', 'admin'])->change();
        });
    }
};
