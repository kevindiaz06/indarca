<?php

/**
 * Script de verificación del sistema de archivos de INDARCA
 *
 * Este script verifica:
 * - Enlace simbólico de storage
 * - Permisos de directorios
 * - Integridad de archivos en base de datos
 * - Estructura de directorios
 *
 * Uso: php check-file-system.php
 */

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Support\Facades\Storage;
use App\Models\DensimetroArchivo;
use App\Models\TeamMember;
use App\Models\Empresa;

// Cargar configuración de Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "🔍 VERIFICACIÓN COMPLETA DEL SISTEMA DE ARCHIVOS\n";
echo "================================================\n\n";

$errors = 0;
$warnings = 0;

// 1. Verificar enlace simbólico
echo "1. Verificando enlace simbólico...\n";
$publicStoragePath = public_path('storage');
$storagePublicPath = storage_path('app/public');

if (is_link($publicStoragePath)) {
    $linkTarget = readlink($publicStoragePath);
    $expectedTarget = $storagePublicPath;

    if (realpath($linkTarget) === realpath($expectedTarget)) {
        echo "   ✅ Enlace simbólico correcto: $linkTarget\n";
    } else {
        echo "   ❌ Enlace simbólico incorrecto: $linkTarget (esperado: $expectedTarget)\n";
        $errors++;
    }
} else {
    echo "   ❌ Enlace simbólico no existe\n";
    $errors++;
}

// 2. Verificar directorios
echo "\n2. Verificando estructura de directorios...\n";
$requiredDirs = [
    'storage/app/public',
    'storage/app/public/archivos',
    'storage/app/public/archivos/densimetros',
    'storage/app/public/team',
    'storage/app/public/logos'
];

foreach ($requiredDirs as $dir) {
    $fullPath = base_path($dir);
    if (is_dir($fullPath)) {
        if (is_writable($fullPath)) {
            echo "   ✅ $dir (escribible)\n";
        } else {
            echo "   ⚠️  $dir (no escribible)\n";
            $warnings++;
        }
    } else {
        echo "   ❌ $dir (no existe)\n";
        $errors++;
    }
}

// 3. Verificar archivos de densímetros
echo "\n3. Verificando archivos de densímetros...\n";
try {
    $archivos = DensimetroArchivo::all();
    $archivosFaltantes = 0;

    foreach ($archivos as $archivo) {
        $fullPath = storage_path('app/public/' . $archivo->ruta_archivo);
        if (!file_exists($fullPath)) {
            echo "   ❌ Archivo faltante: {$archivo->ruta_archivo} (ID: {$archivo->id})\n";
            $archivosFaltantes++;
        }
    }

    if ($archivosFaltantes === 0) {
        echo "   ✅ Todos los archivos de densímetros están presentes ({$archivos->count()} archivos)\n";
    } else {
        echo "   ❌ {$archivosFaltantes} archivos de densímetros faltantes de {$archivos->count()} totales\n";
        $errors += $archivosFaltantes;
    }
} catch (Exception $e) {
    echo "   ❌ Error al verificar archivos de densímetros: " . $e->getMessage() . "\n";
    $errors++;
}

// 4. Verificar imágenes del equipo
echo "\n4. Verificando imágenes del equipo...\n";
try {
    $members = TeamMember::whereNotNull('image')->get();
    $imagenesFaltantes = 0;

    foreach ($members as $member) {
        $fullPath = storage_path('app/public/' . $member->image);
        if (!file_exists($fullPath)) {
            echo "   ❌ Imagen faltante: {$member->image} (Miembro: {$member->name})\n";
            $imagenesFaltantes++;
        }
    }

    if ($imagenesFaltantes === 0) {
        echo "   ✅ Todas las imágenes del equipo están presentes ({$members->count()} imágenes)\n";
    } else {
        echo "   ❌ {$imagenesFaltantes} imágenes del equipo faltantes de {$members->count()} totales\n";
        $errors += $imagenesFaltantes;
    }
} catch (Exception $e) {
    echo "   ❌ Error al verificar imágenes del equipo: " . $e->getMessage() . "\n";
    $errors++;
}

// 5. Verificar logos de empresas
echo "\n5. Verificando logos de empresas...\n";
try {
    $empresas = Empresa::whereNotNull('logo')->get();
    $logosFaltantes = 0;

    foreach ($empresas as $empresa) {
        $fullPath = storage_path('app/public/' . $empresa->logo);
        if (!file_exists($fullPath)) {
            echo "   ❌ Logo faltante: {$empresa->logo} (Empresa: {$empresa->nombre})\n";
            $logosFaltantes++;
        }
    }

    if ($logosFaltantes === 0) {
        echo "   ✅ Todos los logos de empresas están presentes ({$empresas->count()} logos)\n";
    } else {
        echo "   ❌ {$logosFaltantes} logos de empresas faltantes de {$empresas->count()} totales\n";
        $errors += $logosFaltantes;
    }
} catch (Exception $e) {
    echo "   ❌ Error al verificar logos de empresas: " . $e->getMessage() . "\n";
    $errors++;
}

// 6. Verificar configuración de Laravel
echo "\n6. Verificando configuración de Laravel...\n";
$filesystemDefault = config('filesystems.default');
$filesystemPublicUrl = config('filesystems.disks.public.url');
$appUrl = config('app.url');

echo "   📋 Filesystem por defecto: $filesystemDefault\n";
echo "   📋 URL del disco público: $filesystemPublicUrl\n";
echo "   📋 URL de la aplicación: $appUrl\n";

if ($filesystemDefault !== 'local') {
    echo "   ⚠️  Se recomienda usar 'local' como filesystem por defecto\n";
    $warnings++;
}

// Resumen final
echo "\n" . str_repeat("=", 50) . "\n";
echo "RESUMEN DE LA VERIFICACIÓN\n";
echo str_repeat("=", 50) . "\n";

if ($errors === 0 && $warnings === 0) {
    echo "🎉 ¡PERFECTO! El sistema de archivos está completamente funcional.\n";
    exit(0);
} elseif ($errors === 0) {
    echo "✅ El sistema funciona correctamente con {$warnings} advertencias menores.\n";
    exit(0);
} else {
    echo "❌ Se encontraron {$errors} errores críticos y {$warnings} advertencias.\n";
    echo "\n📋 ACCIONES RECOMENDADAS:\n";
    echo "   1. Ejecutar: php artisan storage:link\n";
    echo "   2. Ejecutar: chmod -R 755 storage/\n";
    echo "   3. Ejecutar: php artisan storage:verify --fix\n";
    echo "   4. Verificar que los archivos físicos existan en storage/app/public/\n";
    exit(1);
}
