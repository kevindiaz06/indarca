<?php

namespace App\Exports;

use App\Models\Densimetro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DensimetrosExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Densimetro::with('cliente');

        // Aplicar filtros si existen
        if (isset($this->filters['estado']) && !empty($this->filters['estado'])) {
            $query->where('estado', $this->filters['estado']);
        }

        if (isset($this->filters['cliente_id']) && !empty($this->filters['cliente_id'])) {
            $query->where('cliente_id', $this->filters['cliente_id']);
        }

        if (isset($this->filters['search']) && !empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('numero_serie', 'LIKE', "%{$search}%")
                  ->orWhere('marca', 'LIKE', "%{$search}%")
                  ->orWhere('modelo', 'LIKE', "%{$search}%")
                  ->orWhere('referencia_reparacion', 'LIKE', "%{$search}%");
            });
        }

        return $query->orderBy('created_at', 'desc')->get();
    }

    /**
     * @var Densimetro $densimetro
     */
    public function map($densimetro): array
    {
        return [
            'ID' => $densimetro->id,
            'Referencia' => $densimetro->referencia_reparacion,
            'Número de Serie' => $densimetro->numero_serie,
            'Marca' => $densimetro->marca ?: 'No especificada',
            'Modelo' => $densimetro->modelo ?: 'No especificado',
            'Cliente' => $densimetro->cliente ? $densimetro->cliente->name : 'No asignado',
            'Estado' => ucfirst(str_replace('_', ' ', $densimetro->estado)),
            'Fecha Entrada' => $densimetro->fecha_entrada->format('d/m/Y'),
            'Fecha Finalización' => $densimetro->fecha_finalizacion ? $densimetro->fecha_finalizacion->format('d/m/Y') : 'Pendiente',
            'Observaciones' => $densimetro->observaciones ?: 'Sin observaciones'
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Referencia',
            'Número de Serie',
            'Marca',
            'Modelo',
            'Cliente',
            'Estado',
            'Fecha Entrada',
            'Fecha Finalización',
            'Observaciones'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para la fila de encabezados
            1 => ['font' => ['bold' => true], 'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'EEEEEE']]],
        ];
    }
}
