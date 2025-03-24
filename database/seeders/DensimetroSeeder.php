<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DensimetroSeeder extends Seeder
{
    public function run()
    {
        DB::table('densimetros')->insert([
           /* ['codigo' => 'D123', 'estado_id' => 1, 'empresa_id' => 1],
            ['codigo' => 'D124', 'estado_id' => 2, 'empresa_id' => 2],*/
        ]);
    }
}

