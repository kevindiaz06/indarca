<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    public function run()
    {
        DB::table('empresas')->insert([
           /* ['nombre' => 'Empresa A', 'direccion' => 'Calle Ficticia 123', 'telefono' => '123456789'],
            ['nombre' => 'Empresa B', 'direccion' => 'Avenida Real 456', 'telefono' => '987654321'],*/
        ]);
    }
}

