<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Actualizamos cualquier valor NULL a false
        DB::table('empresas')
            ->whereNull('activo')
            ->update(['activo' => false]);

        // Convertimos valores numéricos a booleanos
        DB::statement('UPDATE empresas SET activo = true WHERE activo = 1');
        DB::statement('UPDATE empresas SET activo = false WHERE activo = 0');

        // Para otros posibles valores no booleanos, los manejamos usando Eloquent
        $empresas = Empresa::all();
        foreach ($empresas as $empresa) {
            // Aseguramos que el valor se convierta explícitamente a booleano
            $valorBooleano = (bool) $empresa->activo;

            $empresa->activo = $valorBooleano;
            $empresa->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No hay retroceso específico necesario para esto ya que
        // estamos simplemente asegurando el tipo de dato correcto
    }
};
