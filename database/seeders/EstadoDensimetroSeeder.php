<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoDensimetroSeeder extends Seeder
{
    public function run()
    {
        DB::table('estados_densimetros')->insert([
            /*['nombre' => 'En mantenimiento'],
            ['nombre' => 'Reparado'],
            ['nombre' => 'Calibrado'],*/
        ]);
    }
}

