<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Roles disponibles (excluyendo admin)
        $roles = ['cliente', 'trabajador'];

        // Nombres y apellidos comunes para generar usuarios realistas
        $nombres = [
            'Carlos', 'María', 'José', 'Ana', 'Luis', 'Carmen', 'Francisco', 'Isabel',
            'Antonio', 'Dolores', 'Manuel', 'Pilar', 'David', 'María José', 'Daniel',
            'Rosa', 'Miguel', 'Josefa', 'Alejandro', 'Teresa', 'Rafael', 'Antonia',
            'Pablo', 'Carmen María', 'Javier', 'Mercedes', 'Sergio', 'Francisca',
            'Alberto', 'Laura', 'Fernando', 'Elena', 'Jorge', 'Concepción', 'Roberto',
            'María Carmen', 'Adrián', 'Victoria', 'Ángel', 'Sandra', 'Diego', 'Patricia'
        ];

        $apellidos = [
            'García', 'Rodríguez', 'González', 'Fernández', 'López', 'Martínez', 'Sánchez',
            'Pérez', 'Gómez', 'Martín', 'Jiménez', 'Ruiz', 'Hernández', 'Díaz', 'Moreno',
            'Muñoz', 'Álvarez', 'Romero', 'Alonso', 'Gutiérrez', 'Navarro', 'Torres',
            'Domínguez', 'Vázquez', 'Ramos', 'Gil', 'Ramírez', 'Serrano', 'Blanco',
            'Suárez', 'Molina', 'Morales', 'Ortega', 'Delgado', 'Castro', 'Ortiz'
        ];

        // Dominios de email para hacer más realista
        $dominios = [
            'gmail.com', 'hotmail.com', 'yahoo.es', 'outlook.com', 'indarca.com',
            'empresa.com', 'correo.es', 'email.com', 'mail.com', 'cliente.es'
        ];

        // Empresas/organizaciones ficticias para trabajadores
        $empresas = [
            'Construcciones', 'Ingeniería', 'Laboratorio', 'Consultora', 'Servicios',
            'Tecnología', 'Desarrollo', 'Mantenimiento', 'Calibración', 'Calidad'
        ];

        $registros = [];
        $fechaActual = Carbon::now();
        $emailsUsados = [];

        // Generar aproximadamente 100 usuarios distribuidos en los últimos 12 meses
        for ($mes = 0; $mes < 12; $mes++) {
            // Entre 6 y 12 usuarios por mes para totalizar ~100
            $usuariosPorMes = rand(6, 12);

            for ($i = 0; $i < $usuariosPorMes; $i++) {
                // Fecha aleatoria dentro del mes
                $fechaBase = $fechaActual->copy()->subMonths($mes);
                $diaAleatorio = rand(1, $fechaBase->daysInMonth);
                $fechaCreacion = $fechaBase->copy()->day($diaAleatorio);

                // Seleccionar nombre y apellidos aleatorios
                $nombre = $nombres[array_rand($nombres)];
                $apellido1 = $apellidos[array_rand($apellidos)];
                $apellido2 = $apellidos[array_rand($apellidos)];
                $nombreCompleto = $nombre . ' ' . $apellido1 . ' ' . $apellido2;

                // Generar email único
                $dominio = $dominios[array_rand($dominios)];
                $baseEmail = '';

                // Diferentes formatos de email
                $formatoEmail = rand(1, 4);
                switch ($formatoEmail) {
                    case 1:
                        $baseEmail = strtolower($nombre . '.' . $apellido1);
                        break;
                    case 2:
                        $baseEmail = strtolower(substr($nombre, 0, 1) . $apellido1);
                        break;
                    case 3:
                        $baseEmail = strtolower($nombre . $apellido1);
                        break;
                    case 4:
                        $baseEmail = strtolower($nombre . '.' . $apellido1 . '.' . $apellido2);
                        break;
                }

                // Limpiar caracteres especiales
                $baseEmail = str_replace(['á', 'é', 'í', 'ó', 'ú', 'ñ'], ['a', 'e', 'i', 'o', 'u', 'n'], $baseEmail);
                $baseEmail = preg_replace('/[^a-z0-9.]/', '', $baseEmail);

                // Asegurar que el email sea único
                $email = $baseEmail . '@' . $dominio;
                $contador = 1;
                while (in_array($email, $emailsUsados) || User::where('email', $email)->exists()) {
                    $email = $baseEmail . $contador . '@' . $dominio;
                    $contador++;
                }
                $emailsUsados[] = $email;

                // Seleccionar rol aleatorio (más probabilidad para clientes)
                $rol = rand(1, 10) <= 7 ? 'cliente' : 'trabajador';

                // Si es trabajador, añadir empresa al nombre
                if ($rol === 'trabajador') {
                    $empresa = $empresas[array_rand($empresas)];
                    $nombreCompleto = $nombre . ' ' . $apellido1 . ' (' . $empresa . ')';
                }

                // Verificación de email (70% verificados)
                $emailVerificado = rand(1, 10) <= 7 ? $fechaCreacion->copy()->addHours(rand(1, 48)) : null;

                $registros[] = [
                    'name' => $nombreCompleto,
                    'email' => $email,
                    'email_verified_at' => $emailVerificado,
                    'password' => Hash::make('password123'), // Contraseña por defecto
                    'role' => $rol,
                    'is_admin' => false,
                    'created_at' => $fechaCreacion->format('Y-m-d H:i:s'),
                    'updated_at' => $fechaCreacion->format('Y-m-d H:i:s'),
                ];
            }
        }

        // Insertar registros en lotes para mejor rendimiento
        $chunks = array_chunk($registros, 50);
        foreach ($chunks as $chunk) {
            DB::table('users')->insert($chunk);
        }

        $this->command->info('Se han creado ' . count($registros) . ' usuarios distribuidos en los últimos 12 meses.');

        // Mostrar estadísticas
        $totalClientes = collect($registros)->where('role', 'cliente')->count();
        $totalTrabajadores = collect($registros)->where('role', 'trabajador')->count();
        $totalVerificados = collect($registros)->whereNotNull('email_verified_at')->count();

        $this->command->info("Distribución: {$totalClientes} clientes, {$totalTrabajadores} trabajadores");
        $this->command->info("Usuarios verificados: {$totalVerificados}");
    }
}
