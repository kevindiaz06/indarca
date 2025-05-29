<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Densimetro;
use App\Models\DensimetroArchivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class DensimetroArchivoController extends Controller
{
    /**
     * Sube uno o múltiples archivos para un densímetro
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $densimetroId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $densimetroId)
    {
        try {
            // Log inicial
            Log::info('=== INICIO SUBIDA ARCHIVOS ===');
            Log::info('Densímetro ID: ' . $densimetroId);
            Log::info('Request method: ' . $request->method());
            Log::info('Request URL: ' . $request->url());
            Log::info('Request all data: ', $request->all());
            Log::info('Request files: ', $request->allFiles());

            // Verificar que el densímetro existe
            Log::info('Verificando densímetro...');
            $densimetro = Densimetro::findOrFail($densimetroId);
            Log::info('Densímetro encontrado: ' . $densimetro->numero_serie);

            // Verificar archivos básico
            Log::info('Verificando archivos...');
            if (!$request->hasFile('archivos')) {
                Log::warning('No se encontraron archivos en la request');
                return redirect()->route('admin.densimetros.show', $densimetroId)
                    ->withErrors(['archivos' => 'No se seleccionaron archivos']);
            }

            $archivos = $request->file('archivos');
            Log::info('Número de archivos detectados: ' . count($archivos));

            // Validación simple
            Log::info('Iniciando validación...');
            $validator = Validator::make($request->all(), [
                'archivos' => 'required|array',
                'archivos.*' => 'file|max:10240', // Simplificamos la validación
            ]);

            if ($validator->fails()) {
                Log::warning('Validación falló: ', $validator->errors()->toArray());
                return redirect()->route('admin.densimetros.show', $densimetroId)
                    ->withErrors($validator);
            }

            Log::info('Validación exitosa');

            // Procesar archivos uno por uno
            $archivosSubidos = 0;
            foreach ($archivos as $index => $archivo) {
                Log::info("Procesando archivo {$index}: " . $archivo->getClientOriginalName());

                if (!$archivo->isValid()) {
                    Log::error("Archivo {$index} no es válido");
                    continue;
                }

                try {
                    $extension = $archivo->getClientOriginalExtension();
                    $nombre = pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME);
                    $mimeType = $archivo->getMimeType();
                    $tamano = $archivo->getSize();

                    Log::info("Archivo {$index} - Nombre: {$nombre}, Extensión: {$extension}, MIME: {$mimeType}, Tamaño: {$tamano}");

                    // Determinar tipo
                    $tipoArchivo = 'documento';
                    if (in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                        $tipoArchivo = 'imagen';
                    } elseif (in_array($mimeType, ['application/pdf'])) {
                        $tipoArchivo = 'pdf';
                    }

                    // Generar nombre único
                    $nombreUnico = time() . '_' . uniqid() . '.' . $extension;
                    $directorio = 'archivos/densimetros/' . $densimetroId;

                    Log::info("Guardando archivo en: {$directorio}/{$nombreUnico}");

                    // Crear directorio si no existe
                    if (!Storage::disk('public')->exists($directorio)) {
                        Storage::disk('public')->makeDirectory($directorio);
                        Log::info("Directorio creado: {$directorio}");
                    }

                    // Guardar archivo
                    $rutaArchivo = $archivo->storeAs($directorio, $nombreUnico, 'public');

                    if (!$rutaArchivo) {
                        Log::error("Error al guardar archivo {$index}");
                        continue;
                    }

                    Log::info("Archivo guardado en: {$rutaArchivo}");

                    // Guardar en base de datos
                    $densimetroArchivo = new DensimetroArchivo([
                        'densimetro_id' => $densimetroId,
                        'nombre_archivo' => $nombre,
                        'ruta_archivo' => $rutaArchivo,
                        'tipo_archivo' => $tipoArchivo,
                        'extension' => $extension,
                        'mime_type' => $mimeType,
                        'tamano' => $tamano,
                    ]);

                    $densimetroArchivo->save();
                    $archivosSubidos++;

                    Log::info("Archivo {$index} guardado exitosamente en BD con ID: " . $densimetroArchivo->id);

                } catch (\Exception $e) {
                    Log::error("Error procesando archivo {$index}: " . $e->getMessage());
                    Log::error("Stack trace: " . $e->getTraceAsString());
                }
            }

            $mensaje = $archivosSubidos > 0
                ? ($archivosSubidos > 1 ? "{$archivosSubidos} archivos subidos correctamente." : "Archivo subido correctamente.")
                : "No se pudo subir ningún archivo.";

            Log::info("Proceso completado. Archivos subidos: {$archivosSubidos}");
            Log::info('=== FIN SUBIDA ARCHIVOS ===');

            return redirect()->route('admin.densimetros.show', $densimetroId)->with('success', $mensaje);

        } catch (\Exception $e) {
            Log::error('ERROR CRÍTICO en subida de archivos: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            Log::error('Línea: ' . $e->getLine());
            Log::error('Archivo: ' . $e->getFile());

            return redirect()->route('admin.densimetros.show', $densimetroId)
                ->withErrors(['error' => 'Error interno del servidor: ' . $e->getMessage()]);
        }
    }

    /**
     * Muestra un archivo por su ID
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archivo = DensimetroArchivo::findOrFail($id);

        // Verificar que el archivo exista
        if (!Storage::disk('public')->exists($archivo->ruta_archivo)) {
            abort(404, 'Archivo no encontrado');
        }

        // Devolver el archivo
        return response()->file(Storage::disk('public')->path($archivo->ruta_archivo));
    }

    /**
     * Elimina un archivo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivo = DensimetroArchivo::findOrFail($id);

        // COMENTADO: No eliminar archivo físico para mantener historial en storage
        // if (Storage::disk('public')->exists($archivo->ruta_archivo)) {
        //     Storage::disk('public')->delete($archivo->ruta_archivo);
        // }

        // Eliminar el registro
        $archivo->delete();

        return redirect()->back()->with('success', 'Archivo eliminado correctamente.');
    }
}
