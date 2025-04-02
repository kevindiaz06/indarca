<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromQuery, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithStyles
{
    protected $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function query()
    {
        $query = User::query()->orderBy('created_at', 'desc');

        // Aplicar filtros si existen
        if (isset($this->filters['role']) && !empty($this->filters['role'])) {
            $query->where('role', $this->filters['role']);
        }

        if (isset($this->filters['search']) && !empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Email',
            'Rol',
            'Fecha de Registro',
            'Última Actualización'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $this->getRoleName($user->role),
            $user->created_at->format('d/m/Y H:i:s'),
            $user->updated_at->format('d/m/Y H:i:s')
        ];
    }

    protected function getRoleName($role): string
    {
        return match($role) {
            'admin' => 'Administrador',
            'trabajador' => 'Trabajador',
            'cliente' => 'Cliente',
            default => 'Usuario'
        };
    }

    public function title(): string
    {
        return 'Usuarios';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para la primera fila
            1 => ['font' => ['bold' => true]],
        ];
    }
}
