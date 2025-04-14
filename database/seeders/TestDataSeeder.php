<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Densimetro;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Crear 5 empresas de prueba
        $empresas = [
            [
                'nombre' => 'Empresa Prueba 1',
                'direccion' => 'Calle Principal 123, Ciudad',
                'telefono' => '123456789',
                'tipo_cliente' => 'Cliente Habitual',
                'destacado' => true,
            ],
            [
                'nombre' => 'Empresa Prueba 2',
                'direccion' => 'Avenida Secundaria 456, Ciudad',
                'telefono' => '987654321',
                'tipo_cliente' => 'Colaborador',
                'destacado' => false,
            ],
            [
                'nombre' => 'Empresa Prueba 3',
                'direccion' => 'Plaza Central 789, Ciudad',
                'telefono' => '456789123',
                'tipo_cliente' => 'Patrocinador',
                'destacado' => true,
            ],
            [
                'nombre' => 'Empresa Prueba 4',
                'direccion' => 'Calle Comercial 987, Ciudad',
                'telefono' => '321654987',
                'tipo_cliente' => 'Colaborador',
                'destacado' => true,
            ],
            [
                'nombre' => 'Empresa Prueba 5',
                'direccion' => 'Avenida Industrial 654, Ciudad',
                'telefono' => '789123456',
                'tipo_cliente' => 'Cliente Habitual',
                'destacado' => false,
            ],
        ];

        foreach ($empresas as $empresa) {
            Empresa::create($empresa);
        }

        // 2. Crear 5 usuarios de prueba con diferentes roles
        $usuarios = [
            [
                'name' => 'Cliente Prueba',
                'email' => 'cliente.prueba@example.com',
                'password' => Hash::make('cliente123'),
                'role' => 'cliente',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Trabajador Prueba',
                'email' => 'trabajador.prueba@example.com',
                'password' => Hash::make('trabajador123'),
                'role' => 'trabajador',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Admin Prueba',
                'email' => 'admin.prueba@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Cliente Empresa',
                'email' => 'cliente.empresa@example.com',
                'password' => Hash::make('cliente123'),
                'role' => 'cliente',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Cliente VIP',
                'email' => 'cliente.vip@example.com',
                'password' => Hash::make('cliente123'),
                'role' => 'cliente',
                'email_verified_at' => now(),
            ],
        ];

        $usuariosCreados = [];
        foreach ($usuarios as $usuario) {
            $usuariosCreados[] = User::create($usuario);
        }

        // 3. Crear 5 densímetros de prueba asociados a diferentes clientes
        $densimetros = [
            [
                'cliente_id' => $usuariosCreados[0]->id, // Cliente Prueba
                'numero_serie' => 'DENS-001',
                'marca' => 'MarcaA',
                'modelo' => 'Modelo123',
                'fecha_entrada' => now()->subDays(30),
                'referencia_reparacion' => Densimetro::generarReferencia(),
                'estado' => 'recibido',
                'observaciones' => 'Densímetro recibido para mantenimiento regular',
            ],
            [
                'cliente_id' => $usuariosCreados[3]->id, // Cliente Empresa
                'numero_serie' => 'DENS-002',
                'marca' => 'MarcaB',
                'modelo' => 'Modelo456',
                'fecha_entrada' => now()->subDays(20),
                'referencia_reparacion' => Densimetro::generarReferencia(),
                'estado' => 'en_reparacion',
                'observaciones' => 'Densímetro en proceso de reparación',
            ],
            [
                'cliente_id' => $usuariosCreados[4]->id, // Cliente VIP
                'numero_serie' => 'DENS-003',
                'marca' => 'MarcaC',
                'modelo' => 'Modelo789',
                'fecha_entrada' => now()->subDays(15),
                'fecha_finalizacion' => now()->subDays(5),
                'referencia_reparacion' => Densimetro::generarReferencia(),
                'estado' => 'finalizado',
                'observaciones' => 'Densímetro reparado, listo para entrega',
            ],
            [
                'cliente_id' => $usuariosCreados[0]->id, // Cliente Prueba
                'numero_serie' => 'DENS-004',
                'marca' => 'MarcaA',
                'modelo' => 'ModeloXYZ',
                'fecha_entrada' => now()->subDays(10),
                'fecha_finalizacion' => now()->subDays(2),
                'referencia_reparacion' => Densimetro::generarReferencia(),
                'estado' => 'entregado',
                'observaciones' => 'Densímetro entregado al cliente',
            ],
            [
                'cliente_id' => $usuariosCreados[3]->id, // Cliente Empresa
                'numero_serie' => 'DENS-005',
                'marca' => 'MarcaD',
                'modelo' => 'ModeloABC',
                'fecha_entrada' => now()->subDays(5),
                'referencia_reparacion' => Densimetro::generarReferencia(),
                'estado' => 'recibido',
                'observaciones' => 'Densímetro recibido con fallas graves',
            ],
        ];

        foreach ($densimetros as $densimetro) {
            Densimetro::create($densimetro);
        }

        $this->command->info('Datos de prueba creados exitosamente.');
    }
}
