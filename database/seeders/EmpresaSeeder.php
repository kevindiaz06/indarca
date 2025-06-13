<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    public function run()
    {
        // Tipos de cliente disponibles
        $tiposCliente = ['Cliente Habitual', 'Colaborador', 'Patrocinador'];

        // Prefijos de nombres de empresas por sector
        $prefijosConstructoras = [
            'Constructora', 'Construcciones', 'Edificaciones', 'Infraestructuras', 'Obras',
            'Proyectos', 'Desarrollos', 'Inmobiliaria', 'Arquitectura', 'Ingeniería'
        ];

        $prefijosIndustriales = [
            'Industrias', 'Fábrica', 'Manufacturas', 'Metalúrgica', 'Química',
            'Petroquímica', 'Siderúrgica', 'Minera', 'Energética', 'Tecnología'
        ];

        $prefijosServicios = [
            'Servicios', 'Consultora', 'Asesoría', 'Laboratorio', 'Centro',
            'Instituto', 'Corporación', 'Grupo', 'Soluciones', 'Sistemas'
        ];

        // Sufijos y complementos de nombres
        $sufijos = [
            'del Norte', 'del Sur', 'Central', 'Industrial', 'Técnica', 'Avanzada',
            'Moderna', 'Integral', 'Especializada', 'Internacional', 'Nacional',
            'Regional', 'Metropolitana', 'Europea', 'Mediterránea', 'Andaluza'
        ];

        $apellidosEmpresariales = [
            'Hermanos', 'y Asociados', 'y Compañía', 'y Socios', 'e Hijos',
            'Internacional', 'Ibérica', 'Española', 'Catalana', 'Madrileña'
        ];

        // Ciudades españolas para direcciones
        $ciudades = [
            'Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza', 'Málaga',
            'Murcia', 'Palma', 'Las Palmas', 'Bilbao', 'Alicante', 'Córdoba',
            'Valladolid', 'Vigo', 'Gijón', 'Granada', 'Toledo', 'Santander'
        ];

        // Tipos de calles
        $tiposCalles = ['Calle', 'Avenida', 'Plaza', 'Paseo', 'Ronda', 'Carrera', 'Travesía'];

        // Nombres de calles comunes
        $nombresCalles = [
            'Gran Vía', 'del Carmen', 'Mayor', 'Real', 'de la Paz', 'del Sol',
            'de España', 'Principal', 'Central', 'Industrial', 'Comercial',
            'de los Trabajadores', 'de la Constitución', 'de Andalucía',
            'del Mediterráneo', 'de Europa', 'de la Industria', 'Tecnológica'
        ];

        $registros = [];
        $fechaActual = Carbon::now();
        $nombresUsados = [];

        // Generar aproximadamente 100 empresas distribuidas en los últimos 12 meses
        for ($mes = 0; $mes < 12; $mes++) {
            // Entre 6 y 12 empresas por mes para totalizar ~100
            $empresasPorMes = rand(6, 12);

            for ($i = 0; $i < $empresasPorMes; $i++) {
                // Fecha aleatoria dentro del mes
                $fechaBase = $fechaActual->copy()->subMonths($mes);
                $diaAleatorio = rand(1, $fechaBase->daysInMonth);
                $fechaCreacion = $fechaBase->copy()->day($diaAleatorio);

                // Seleccionar tipo de empresa aleatoriamente
                $tipoEmpresa = rand(1, 3);
                $prefijos = [];

                switch ($tipoEmpresa) {
                    case 1:
                        $prefijos = $prefijosConstructoras;
                        break;
                    case 2:
                        $prefijos = $prefijosIndustriales;
                        break;
                    case 3:
                        $prefijos = $prefijosServicios;
                        break;
                }

                // Generar nombre único de empresa
                $prefijo = $prefijos[array_rand($prefijos)];
                $nombreEmpresa = '';

                // Diferentes formatos de nombres
                $formatoNombre = rand(1, 4);
                switch ($formatoNombre) {
                    case 1:
                        $nombreEmpresa = $prefijo . ' ' . $sufijos[array_rand($sufijos)];
                        break;
                    case 2:
                        $nombreEmpresa = $prefijo . ' ' . $apellidosEmpresariales[array_rand($apellidosEmpresariales)];
                        break;
                    case 3:
                        $ciudad = $ciudades[array_rand($ciudades)];
                        $nombreEmpresa = $prefijo . ' ' . $ciudad;
                        break;
                    case 4:
                        $nombreEmpresa = $prefijo . ' ' . chr(65 + rand(0, 25)) . chr(65 + rand(0, 25));
                        break;
                }

                // Asegurar que el nombre sea único
                $contador = 1;
                $nombreFinal = $nombreEmpresa;
                while (in_array($nombreFinal, $nombresUsados)) {
                    $nombreFinal = $nombreEmpresa . ' ' . $contador;
                    $contador++;
                }
                $nombresUsados[] = $nombreFinal;

                // Generar dirección
                $ciudad = $ciudades[array_rand($ciudades)];
                $tipoCalle = $tiposCalles[array_rand($tiposCalles)];
                $nombreCalle = $nombresCalles[array_rand($nombresCalles)];
                $numero = rand(1, 200);
                $codigoPostal = rand(28000, 50000);

                $direccion = $tipoCalle . ' ' . $nombreCalle . ', ' . $numero . ', ' . $codigoPostal . ' ' . $ciudad;

                // Generar teléfono español
                $prefijoTelefono = ['91', '93', '95', '96', '98', '985', '986', '987'];
                $prefijo = $prefijoTelefono[array_rand($prefijoTelefono)];
                $telefono = $prefijo . str_pad(rand(1000000, 9999999), 7, '0', STR_PAD_LEFT);

                // Tipo de cliente (más probabilidad para Cliente Habitual)
                $probabilidad = rand(1, 10);
                if ($probabilidad <= 6) {
                    $tipoCliente = 'Cliente Habitual';
                } elseif ($probabilidad <= 8) {
                    $tipoCliente = 'Colaborador';
                } else {
                    $tipoCliente = 'Patrocinador';
                }

                // Destacado (20% de probabilidad)
                $destacado = rand(1, 10) <= 2;

                // Activo (80% de probabilidad)
                $activo = rand(1, 10) <= 8;

                $registros[] = [
                    'nombre' => $nombreFinal,
                    'direccion' => $direccion,
                    'telefono' => $telefono,
                    'logo' => null, // Sin logo por defecto
                    'tipo_cliente' => $tipoCliente,
                    'destacado' => $destacado,
                    'activo' => $activo,
                    'created_at' => $fechaCreacion->format('Y-m-d H:i:s'),
                    'updated_at' => $fechaCreacion->format('Y-m-d H:i:s'),
                ];
            }
        }

        // Insertar registros en lotes para mejor rendimiento
        $chunks = array_chunk($registros, 50);
        foreach ($chunks as $chunk) {
            DB::table('empresas')->insert($chunk);
        }

        $this->command->info('Se han creado ' . count($registros) . ' empresas distribuidas en los últimos 12 meses.');

        // Mostrar estadísticas
        $totalHabituales = collect($registros)->where('tipo_cliente', 'Cliente Habitual')->count();
        $totalColaboradores = collect($registros)->where('tipo_cliente', 'Colaborador')->count();
        $totalPatrocinadores = collect($registros)->where('tipo_cliente', 'Patrocinador')->count();
        $totalDestacadas = collect($registros)->where('destacado', true)->count();
        $totalActivas = collect($registros)->where('activo', true)->count();

        $this->command->info("Distribución por tipo: {$totalHabituales} habituales, {$totalColaboradores} colaboradores, {$totalPatrocinadores} patrocinadores");
        $this->command->info("Empresas destacadas: {$totalDestacadas}");
        $this->command->info("Empresas activas: {$totalActivas}");
    }
}

