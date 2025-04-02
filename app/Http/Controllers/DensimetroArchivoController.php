<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Densimetro;
use App\Models\DensimetroArchivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        // Validar el densímetro
        $densimetro = Densimetro::findOrFail($densimetroId);

        // Validar los archivos
        $validator = Validator::make($request->all(), [
            'archivos' => 'required',
            'archivos.*' => 'file|max:10240', // 10MB máximo por archivo
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $archivosSubidos = 0;

        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $extension = $archivo->getClientOriginalExtension();
                $nombre = pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME);
                $mimeType = $archivo->getMimeType();
                $tamano = $archivo->getSize();

                // Determinar el tipo de archivo
                $tipoArchivo = 'documento';
                if (in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                    $tipoArchivo = 'imagen';
                } elseif (in_array($mimeType, ['application/pdf'])) {
                    $tipoArchivo = 'pdf';
                }

                // Generar un nombre único y guardar el archivo
                $nombreUnico = time() . '_' . uniqid() . '.' . $extension;
                $rutaArchivo = $archivo->storeAs('archivos/densimetros/' . $densimetroId, $nombreUnico, 'public');

                // Guardar registro en la base de datos
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
            }
        }

        $mensaje = $archivosSubidos > 1
            ? $archivosSubidos . ' archivos subidos correctamente.'
            : 'Archivo subido correctamente.';

        return redirect()->back()->with('success', $mensaje);
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

        // Eliminar el archivo físico
        if (Storage::disk('public')->exists($archivo->ruta_archivo)) {
            Storage::disk('public')->delete($archivo->ruta_archivo);
        }

        // Eliminar el registro
        $archivo->delete();

        return redirect()->back()->with('success', 'Archivo eliminado correctamente.');
    }
}
