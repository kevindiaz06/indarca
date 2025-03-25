@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Gestión de Densímetros</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Densímetros</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.densimetros.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Densímetro
        </a>
    </div>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Tabla de Densímetros -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Densímetros Registrados</h6>
            <div class="input-group" style="width: 250px;">
                <input type="text" class="form-control" placeholder="Buscar..." id="searchInput">
                <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Referencia</th>
                            <th>Cliente</th>
                            <th>Número Serie</th>
                            <th>Fecha Entrada</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($densimetros as $densimetro)
                        <tr>
                            <td>{{ $densimetro->id }}</td>
                            <td>{{ $densimetro->referencia_reparacion }}</td>
                            <td>{{ $densimetro->cliente->name }}</td>
                            <td>{{ $densimetro->numero_serie }}</td>
                            <td>{{ $densimetro->fecha_entrada->format('d/m/Y') }}</td>
                            <td>
                                @if($densimetro->estado == 'recibido')
                                <span class="badge bg-secondary">Recibido</span>
                                @elseif($densimetro->estado == 'en_reparacion')
                                <span class="badge bg-primary">En reparación</span>
                                @elseif($densimetro->estado == 'finalizado')
                                <span class="badge bg-success">Finalizado</span>
                                @elseif($densimetro->estado == 'entregado')
                                <span class="badge bg-info">Entregado</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.densimetros.show', $densimetro->id) }}" class="btn btn-sm btn-info me-1" title="Ver detalles">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.densimetros.edit', $densimetro->id) }}" class="btn btn-sm btn-warning me-1" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.densimetros.destroy', $densimetro->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Está seguro de eliminar este densímetro?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay densímetros registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-end mt-3">
                {{ $densimetros->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Búsqueda en la tabla
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchText = this.value.toLowerCase();
        const table = document.querySelector('table');
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
            let found = false;
            row.querySelectorAll('td').forEach(cell => {
                if (cell.textContent.toLowerCase().indexOf(searchText) > -1) {
                    found = true;
                }
            });

            row.style.display = found ? '' : 'none';
        });
    });
</script>
@endsection
