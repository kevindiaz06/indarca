<?php

namespace App\Exports;

use App\Models\Empresa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmpresasExport implements FromQuery, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithStyles
{
    protected $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function query()
    {
        $query = Empresa::query()->orderBy('created_at', 'desc');

        // Aplicar filtros si existen
        if (isset($this->filters['search']) && !empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'LIKE', "%{$search}%")
                  ->orWhere('direccion', 'LIKE', "%{$search}%")
                  ->orWhere('telefono', 'LIKE', "%{$search}%");
            });
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Dirección',
            'Teléfono',
            'Email',
            'Fecha de Registro',
            'Última Actualización'
        ];
    }

    public function map($empresa): array
    {
        return [
            $empresa->id,
            $empresa->nombre,
            $empresa->direccion,
            $empresa->telefono,
            $empresa->email,
            $empresa->created_at->format('d/m/Y H:i:s'),
            $empresa->updated_at->format('d/m/Y H:i:s')
        ];
    }

    public function title(): string
    {
        return 'Empresas';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para la primera fila
            1 => ['font' => ['bold' => true]],
        ];
    }
}
