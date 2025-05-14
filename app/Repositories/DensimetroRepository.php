<?php

namespace App\Repositories;

use App\Models\Densimetro;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Services\CacheService;

class DensimetroRepository
{
    /**
     * Obtener todos los densímetros paginados
     *
     * @param int $perPage Número de elementos por página
     * @return LengthAwarePaginator
     */
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Densimetro::with('cliente')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
    }

    /**
     * Obtener densímetro por ID
     *
     * @param int $id ID del densímetro
     * @return Densimetro|null
     */
    public function findById(int $id): ?Densimetro
    {
        return Densimetro::with('cliente')->findOrFail($id);
    }

    /**
     * Buscar densímetro por número de serie
     *
     * @param string $numeroSerie Número de serie del densímetro
     * @return Densimetro|null
     */
    public function findByNumeroSerie(string $numeroSerie): ?Densimetro
    {
        return Densimetro::buscarPorNumeroSerie($numeroSerie);
    }

    /**
     * Verificar si existe otro densímetro en reparación con el mismo número de serie
     *
     * @param string $numeroSerie Número de serie a verificar
     * @param int|null $excepto ID de densímetro a excluir de la búsqueda
     * @return bool
     */
    public function existeOtroEnReparacion(string $numeroSerie, ?int $excepto = null): bool
    {
        $query = Densimetro::where('numero_serie', $numeroSerie)
                ->whereNull('fecha_finalizacion');

        if ($excepto) {
            $query->where('id', '!=', $excepto);
        }

        return $query->exists();
    }

    /**
     * Buscar otro densímetro finalizado con el mismo número de serie
     *
     * @param string $numeroSerie Número de serie a buscar
     * @param int|null $excepto ID de densímetro a excluir
     * @return Densimetro|null
     */
    public function findOtroFinalizado(string $numeroSerie, ?int $excepto = null): ?Densimetro
    {
        $query = Densimetro::where('numero_serie', $numeroSerie)
                ->whereNotNull('fecha_finalizacion');

        if ($excepto) {
            $query->where('id', '!=', $excepto);
        }

        return $query->first();
    }

    /**
     * Crear un nuevo densímetro
     *
     * @param array $data Datos del densímetro
     * @return Densimetro
     */
    public function create(array $data): Densimetro
    {
        $densimetro = new Densimetro($data);
        $densimetro->save();
        return $densimetro;
    }

    /**
     * Actualizar un densímetro existente
     *
     * @param Densimetro $densimetro Instancia del densímetro
     * @param array $data Datos a actualizar
     * @return Densimetro
     */
    public function update(Densimetro $densimetro, array $data): Densimetro
    {
        $densimetro->fill($data);
        $densimetro->save();
        return $densimetro;
    }

    /**
     * Eliminar un densímetro
     *
     * @param Densimetro $densimetro Instancia del densímetro
     * @return bool
     */
    public function delete(Densimetro $densimetro): bool
    {
        return $densimetro->delete();
    }

    /**
     * Generar referencia única para reparación
     *
     * @return string
     */
    public function generarReferencia(): string
    {
        return Densimetro::generarReferencia();
    }

    /**
     * Busca los densimetros finalizados o entregados que coincidan con numero_serie, marca y modelo
     * en orden de más reciente a más antiguo
     *
     * @param string $numeroSerie Número de serie del densímetro
     * @param string $marca Marca del densímetro
     * @param string $modelo Modelo del densímetro
     * @return Collection
     */
    public function findByNumeroSerieMarcaModelo(string $numeroSerie, string $marca, string $modelo)
    {
        // Limpiamos la caché para asegurar datos actualizados
        CacheService::forget('densimetro_' . $numeroSerie);

        return Densimetro::where('numero_serie', $numeroSerie)
                     ->where('marca', $marca)
                     ->where('modelo', $modelo)
                     ->whereIn('estado', ['finalizado', 'entregado'])
                     ->orderBy('fecha_finalizacion', 'desc')
                     ->orderBy('updated_at', 'desc')
                     ->get();
    }

    /**
     * Busca el densimetro más reciente finalizado o entregado que coincida con numero_serie, marca y modelo
     *
     * @param string $numeroSerie Número de serie del densímetro
     * @param string $marca Marca del densímetro
     * @param string $modelo Modelo del densímetro
     * @return Densimetro|null
     */
    public function findMostRecentByNumeroSerieMarcaModelo(string $numeroSerie, string $marca, string $modelo)
    {
        // Limpiamos la caché para asegurar datos actualizados
        CacheService::forget('densimetro_' . $numeroSerie);

        return Densimetro::where('numero_serie', $numeroSerie)
                     ->where('marca', $marca)
                     ->where('modelo', $modelo)
                     ->whereIn('estado', ['finalizado', 'entregado'])
                     ->orderBy('fecha_finalizacion', 'desc')
                     ->orderBy('updated_at', 'desc')
                     ->first();
    }
}
