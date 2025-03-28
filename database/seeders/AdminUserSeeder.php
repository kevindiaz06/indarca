<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuario Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'kevindiazmota@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_admin' => true,
        ]);

        // Usuario Trabajador
        User::create([
            'name' => 'Trabajador',
            'email' => 'trabajador@indarca.com',
            'password' => Hash::make('trabajador123'),
            'role' => 'trabajador',
            'is_admin' => false,
        ]);

        // Usuario Web (Cliente)
        User::create([
            'name' => 'Cliente Demo',
            'email' => 'cliente@example.com',
            'password' => Hash::make('cliente123'),
            'role' => 'cliente',
            'is_admin' => false,
        ]);
    }
}
