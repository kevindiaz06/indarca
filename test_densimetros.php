<?php
use App\Models\Densimetro;
use App\Models\User;
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Crear un usuario de prueba
$user = User::factory()->create(["role" => "cliente", "name" => "Cliente Test", "email" => "test".time()."@example.com"]);
echo "Usuario creado con ID: " . $user->id . PHP_EOL;

// Crear un densímetro asociado a ese usuario
$numeroSerie = "TEST".time();
$densimetro = Densimetro::create([
    "cliente_id" => $user->id,
    "numero_serie" => $numeroSerie,
    "marca" => "Test",
    "modelo" => "Model1",
    "fecha_entrada" => now(),
    "referencia_reparacion" => Densimetro::generarReferencia(),
    "estado" => "recibido"
]);
echo "Densímetro creado con ID: " . $densimetro->id . " y número de serie: " . $densimetro->numero_serie . PHP_EOL;

// Intentar crear otro densímetro con el mismo número de serie
try {
    $duplicado = Densimetro::create([
        "cliente_id" => $user->id,
        "numero_serie" => $numeroSerie,
        "marca" => "Test2",
        "modelo" => "Model2",
        "fecha_entrada" => now(),
        "referencia_reparacion" => Densimetro::generarReferencia(),
        "estado" => "recibido"
    ]);
    echo "ADVERTENCIA: Se pudo crear un densímetro duplicado con ID: " . $duplicado->id . PHP_EOL;
} catch (\Exception $e) {
    echo "Correcto: No se pudo crear un densímetro duplicado" . PHP_EOL;
}

// Verificar si el densímetro está disponible
$disponible = !Densimetro::where('numero_serie', $numeroSerie)
                      ->whereNull('fecha_finalizacion')
                      ->exists();
echo "¿Densímetro " . $numeroSerie . " disponible? " . ($disponible ? "Sí" : "No") . PHP_EOL;

// Finalizar la reparación
$densimetro->estado = "finalizado";
$densimetro->fecha_finalizacion = now();
$densimetro->save();
echo "Densímetro actualizado a estado finalizado" . PHP_EOL;

// Verificar si ahora está disponible
$disponible = !Densimetro::where('numero_serie', $numeroSerie)
                      ->whereNull('fecha_finalizacion')
                      ->exists();
echo "¿Densímetro " . $numeroSerie . " disponible después de finalizar? " . ($disponible ? "Sí" : "No") . PHP_EOL;

// Intentar crear otro densímetro con el mismo número de serie ahora que está finalizado
try {
    $nuevoDensimetro = Densimetro::create([
        "cliente_id" => $user->id,
        "numero_serie" => $numeroSerie,
        "marca" => "Test2",
        "modelo" => "Model2",
        "fecha_entrada" => now(),
        "referencia_reparacion" => Densimetro::generarReferencia(),
        "estado" => "recibido"
    ]);
    echo "Correcto: Se pudo crear un nuevo densímetro con el mismo número de serie después de finalizar el anterior. ID: " . $nuevoDensimetro->id . PHP_EOL;
} catch (\Exception $e) {
    echo "ERROR: No se pudo crear un nuevo densímetro después de finalizar el anterior. " . $e->getMessage() . PHP_EOL;
}

// Eliminar el usuario y verificar que los densímetros siguen existiendo
$userId = $user->id;
$user->delete();
echo "Usuario con ID $userId eliminado" . PHP_EOL;

// Buscar el densímetro para ver si existe y tiene cliente_id en null
$densiEncontrado = Densimetro::find($densimetro->id);
echo "¿Densímetro 1 sigue existiendo? " . ($densiEncontrado ? "Sí" : "No") . PHP_EOL;
echo "Cliente ID del densímetro 1: " . ($densiEncontrado->cliente_id ?: "NULL") . PHP_EOL;

// Buscar el segundo densímetro
if (isset($nuevoDensimetro)) {
    $densiEncontrado2 = Densimetro::find($nuevoDensimetro->id);
    echo "¿Densímetro 2 sigue existiendo? " . ($densiEncontrado2 ? "Sí" : "No") . PHP_EOL;
    echo "Cliente ID del densímetro 2: " . ($densiEncontrado2->cliente_id ?: "NULL") . PHP_EOL;
}
