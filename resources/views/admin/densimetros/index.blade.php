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
        <div class="d-flex flex-wrap gap-2">
            @if(Auth::user()->role === 'admin')
            <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="reportesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-file-earmark-text me-1"></i> Reportes
                </button>
                <ul class="dropdown-menu" aria-labelledby="reportesDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.reportes.densimetros.pdf') }}"><i class="bi bi-file-pdf me-1"></i> Exportar a PDF</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.reportes.densimetros.excel') }}"><i class="bi bi-file-excel me-1"></i> Exportar a Excel</a></li>
                </ul>
            </div>
            @endif
            <a href="{{ route('admin.densimetros.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Densímetro
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Información de registros y filtros -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="d-flex align-items-center">
                <span class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Mostrando {{ $densimetros->firstItem() ?? 0 }} - {{ $densimetros->lastItem() ?? 0 }} de {{ $densimetros->total() }} densímetros
                </span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex align-items-center">
                <label for="perPageSelect" class="form-label me-2 mb-0 text-muted small">Mostrar:</label>
                <select class="form-select form-select-sm" id="perPageSelect" style="width: auto;">
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15</option>
                    <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                </select>
                <span class="text-muted small ms-2">por página</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar por número serie, marca, modelo o referencia..." id="searchInput">
                <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Tabla de Densímetros -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="bi bi-table me-1"></i>
                Densímetros Registrados
            </h6>
            <div class="d-flex align-items-center">
                <span class="badge bg-secondary me-2" id="filteredCount">{{ $densimetros->count() }} registros en esta página</span>
                <button class="btn btn-sm btn-outline-secondary" type="button" id="toggleFilters">
                    <i class="bi bi-funnel"></i> Filtros
                </button>
            </div>
        </div>

        <!-- Panel de filtros colapsable -->
        <div class="card-body border-bottom bg-light collapse" id="filtersPanel">
            <div class="row">
                <div class="col-md-3">
                    <label for="filterEstado" class="form-label">Estado:</label>
                    <select class="form-select form-select-sm" id="filterEstado">
                        <option value="">Todos los estados</option>
                        <option value="recibido">Recibido</option>
                        <option value="en_proceso">En Proceso</option>
                        <option value="pendiente_piezas">Pendiente Piezas</option>
                        <option value="calibrando">Calibrando</option>
                        <option value="reparando">Reparando</option>
                        <option value="en_espera">En Espera</option>
                        <option value="finalizado">Finalizado</option>
                        <option value="entregado">Entregado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filterCalibrado" class="form-label">Calibración:</label>
                    <select class="form-select form-select-sm" id="filterCalibrado">
                        <option value="">Todos</option>
                        <option value="1">Calibrado</option>
                        <option value="0">No Calibrado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filterMarca" class="form-label">Marca:</label>
                    <select class="form-select form-select-sm" id="filterMarca">
                        <option value="">Todas las marcas</option>
                        <!-- Se llenará dinámicamente -->
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-sm btn-outline-danger w-100" id="clearFilters">
                        <i class="bi bi-x-circle me-1"></i> Limpiar filtros
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-sm mb-0" id="densimetrosTable">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th style="min-width: 120px;">Referencia</th>
                            <th style="min-width: 150px;">Cliente</th>
                            <th style="min-width: 130px;">Número Serie</th>
                            <th style="min-width: 140px;">Marca/Modelo</th>
                            <th style="min-width: 100px;">F. Entrada</th>
                            <th style="min-width: 120px;">Estado</th>
                            <th style="min-width: 100px;">Calibrado</th>
                            <th style="min-width: 110px;">F. Finalización</th>
                            <th class="text-center" style="width: 120px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($densimetros as $densimetro)
                        <tr data-estado="{{ $densimetro->estado }}" data-calibrado="{{ $densimetro->calibrado ? '1' : '0' }}" data-marca="{{ $densimetro->marca }}">
                            <td class="text-center text-muted small">{{ $densimetro->id }}</td>
                            <td>
                                <span class="text-primary fw-bold">{{ $densimetro->referencia_reparacion }}</span>
                            </td>
                            <td>
                                <div class="text-truncate" style="max-width: 150px;" title="{{ $densimetro->cliente ? $densimetro->cliente->name : 'Cliente no disponible' }}">
                                    {{ $densimetro->cliente ? $densimetro->cliente->name : 'Cliente no disponible' }}
                                </div>
                            </td>
                            <td>
                                <span class="text-dark fw-medium">{{ $densimetro->numero_serie }}</span>
                            </td>
                            <td>
                                <div class="small">
                                    <div class="fw-medium">{{ $densimetro->marca ?? 'N/A' }}</div>
                                    <div class="text-muted">{{ $densimetro->modelo ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td>
                                <span class="small">{{ $densimetro->formatFechaEntrada() }}</span>
                            </td>
                            <td>
                                @switch($densimetro->estado)
                                    @case('recibido')
                                        <span class="badge bg-secondary">Recibido</span>
                                        @break
                                    @case('en_proceso')
                                        <span class="badge bg-primary">En Proceso</span>
                                        @break
                                    @case('pendiente_piezas')
                                        <span class="badge bg-warning text-dark">Pendiente Piezas</span>
                                        @break
                                    @case('calibrando')
                                        <span class="badge bg-info">Calibrando</span>
                                        @break
                                    @case('reparando')
                                        <span class="badge bg-primary">Reparando</span>
                                        @break
                                    @case('en_espera')
                                        <span class="badge bg-secondary">En Espera</span>
                                        @break
                                    @case('finalizado')
                                        <span class="badge bg-success">Finalizado</span>
                                        @break
                                    @case('entregado')
                                        <span class="badge bg-info">Entregado</span>
                                        @break
                                    @default
                                        <span class="badge bg-light text-dark">{{ ucfirst($densimetro->estado) }}</span>
                                @endswitch
                            </td>
                            <td>
                                @if($densimetro->calibrado)
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Sí
                                    </span>
                                    @if($densimetro->formatFechaProximaCalibr())
                                        <div class="small text-muted">{{ $densimetro->formatFechaProximaCalibr() }}</div>
                                    @endif
                                @else
                                    <span class="badge bg-danger">
                                        <i class="bi bi-x-circle me-1"></i>No
                                    </span>
                                @endif
                            </td>
                            <td>
                                <span class="small {{ $densimetro->fecha_finalizacion ? '' : 'text-muted' }}">
                                    {{ $densimetro->formatFechaFinalizacion() }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    <a href="{{ route('admin.densimetros.show', $densimetro->id) }}" class="btn btn-sm btn-outline-info" title="Ver detalles">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.densimetros.edit', $densimetro->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.densimetros.destroy', $densimetro->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar" onclick="return confirm('¿Está seguro de eliminar este densímetro?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="bi bi-inbox display-4"></i>
                                    <p class="mt-2">No hay densímetros registrados</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Información de paginación y controles -->
            <div class="card-footer d-flex flex-column flex-lg-row justify-content-between align-items-center py-3">
                <div class="mb-2 mb-lg-0">
                    <span class="text-muted small">
                        <i class="bi bi-info-circle me-1"></i>
                        Página {{ $densimetros->currentPage() }} de {{ $densimetros->lastPage() }}
                        ({{ number_format($densimetros->total()) }} registros total)
                    </span>
                </div>

                <!-- Navegación de paginación -->
                <div class="d-flex align-items-center">
                    @if($densimetros->hasPages())
                        <nav aria-label="Navegación de densímetros">
                            <ul class="pagination pagination-sm mb-0">
                                {{-- Botón anterior --}}
                                @if ($densimetros->onFirstPage())
                                    <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-left"></i></span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $densimetros->previousPageUrl() }}" rel="prev"><i class="bi bi-chevron-left"></i></a></li>
                                @endif

                                {{-- Enlaces de páginas --}}
                                @foreach ($densimetros->getUrlRange(max(1, $densimetros->currentPage() - 2), min($densimetros->lastPage(), $densimetros->currentPage() + 2)) as $page => $url)
                                    @if ($page == $densimetros->currentPage())
                                        <li class="page-item active"><span class="page-link bg-primary border-primary">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                {{-- Botón siguiente --}}
                                @if ($densimetros->hasMorePages())
                                    <li class="page-item"><a class="page-link" href="{{ $densimetros->nextPageUrl() }}" rel="next"><i class="bi bi-chevron-right"></i></a></li>
                                @else
                                    <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-right"></i></span></li>
                                @endif

                                {{-- Ir a página específica --}}
                                @if($densimetros->lastPage() > 5)
                                    <li class="page-item">
                                        <div class="input-group input-group-sm ms-2" style="width: 120px;">
                                            <input type="number" class="form-control form-control-sm" id="gotoPage"
                                                   placeholder="Ir a..." min="1" max="{{ $densimetros->lastPage() }}"
                                                   style="font-size: 0.75rem;">
                                            <button class="btn btn-outline-primary btn-sm" type="button" id="gotoPageBtn">
                                                <i class="bi bi-arrow-right"></i>
                                            </button>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
.table th {
    border-top: none;
    font-weight: 600;
    color: #374151;
    font-size: 0.875rem;
}

.table td {
    vertical-align: middle;
    font-size: 0.875rem;
}

.btn-group .btn {
    padding: 0.25rem 0.5rem;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.8rem;
    }

    .btn-group .btn {
        padding: 0.125rem 0.25rem;
    }

    .badge {
        font-size: 0.7rem;
    }
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
}

#filteredCount {
    font-size: 0.75rem;
}

.sticky-top {
    position: sticky;
    top: 0;
    z-index: 10;
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const clearSearchBtn = document.getElementById('clearSearch');
    const toggleFiltersBtn = document.getElementById('toggleFilters');
    const filtersPanel = document.getElementById('filtersPanel');
    const filterEstado = document.getElementById('filterEstado');
    const filterCalibrado = document.getElementById('filterCalibrado');
    const filterMarca = document.getElementById('filterMarca');
    const clearFiltersBtn = document.getElementById('clearFilters');
    const table = document.querySelector('#densimetrosTable tbody');
    const filteredCount = document.getElementById('filteredCount');
    const perPageSelect = document.getElementById('perPageSelect');

    // Manejar cambio de elementos por página
    perPageSelect.addEventListener('change', function() {
        const url = new URL(window.location);
        url.searchParams.set('per_page', this.value);
        url.searchParams.delete('page'); // Resetear a página 1
        window.location.href = url.toString();
    });

    // Llenar filtro de marcas dinámicamente
    function populateMarcasFilter() {
        const marcas = [...new Set(Array.from(document.querySelectorAll('[data-marca]')).map(row => row.dataset.marca).filter(marca => marca && marca !== 'undefined'))];
        marcas.sort().forEach(marca => {
            const option = document.createElement('option');
            option.value = marca;
            option.textContent = marca;
            filterMarca.appendChild(option);
        });
    }

    // Función de filtrado y búsqueda
    function applyFilters() {
        const searchText = searchInput.value.toLowerCase();
        const estadoFilter = filterEstado.value;
        const calibradoFilter = filterCalibrado.value;
        const marcaFilter = filterMarca.value;

        const rows = table.querySelectorAll('tr');
        let visibleCount = 0;

        rows.forEach(row => {
            if (row.children.length === 1) return; // Skip empty row

            const rowText = row.textContent.toLowerCase();
            const estado = row.dataset.estado;
            const calibrado = row.dataset.calibrado;
            const marca = row.dataset.marca;

            const matchesSearch = !searchText || rowText.includes(searchText);
            const matchesEstado = !estadoFilter || estado === estadoFilter;
            const matchesCalibrado = !calibradoFilter || calibrado === calibradoFilter;
            const matchesMarca = !marcaFilter || marca === marcaFilter;

            const isVisible = matchesSearch && matchesEstado && matchesCalibrado && matchesMarca;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        filteredCount.textContent = `${visibleCount} registros mostrados`;

        // Mostrar/ocultar mensaje cuando no hay resultados
        const noResultsRow = table.querySelector('.no-results');
        if (noResultsRow) {
            noResultsRow.remove();
        }

        if (visibleCount === 0 && rows.length > 0) {
            const newRow = document.createElement('tr');
            newRow.className = 'no-results';
            newRow.innerHTML = '<td colspan="10" class="text-center py-4"><div class="text-muted"><i class="bi bi-search display-4"></i><p class="mt-2">No se encontraron resultados con los filtros aplicados</p></div></td>';
            table.appendChild(newRow);
        }
    }

    // Event listeners
    searchInput.addEventListener('input', applyFilters);
    filterEstado.addEventListener('change', applyFilters);
    filterCalibrado.addEventListener('change', applyFilters);
    filterMarca.addEventListener('change', applyFilters);

    clearSearchBtn.addEventListener('click', function() {
        searchInput.value = '';
        applyFilters();
    });

    toggleFiltersBtn.addEventListener('click', function() {
        const bsCollapse = new bootstrap.Collapse(filtersPanel);
        bsCollapse.toggle();
    });

    clearFiltersBtn.addEventListener('click', function() {
        searchInput.value = '';
        filterEstado.value = '';
        filterCalibrado.value = '';
        filterMarca.value = '';
        applyFilters();
    });

    // Inicializar
    populateMarcasFilter();
    applyFilters();

    // Funcionalidad "Ir a página"
    const gotoPageBtn = document.getElementById('gotoPageBtn');
    const gotoPageInput = document.getElementById('gotoPage');

    if (gotoPageBtn && gotoPageInput) {
        gotoPageBtn.addEventListener('click', function() {
            const page = parseInt(gotoPageInput.value);
            const maxPage = parseInt(gotoPageInput.getAttribute('max'));

            if (page >= 1 && page <= maxPage) {
                const url = new URL(window.location);
                url.searchParams.set('page', page);
                window.location.href = url.toString();
            } else {
                alert(`Por favor, ingrese un número entre 1 y ${maxPage}`);
                gotoPageInput.focus();
            }
        });

        gotoPageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                gotoPageBtn.click();
            }
        });
    }

    // Mejorar la navegación con indicador de carga
    document.querySelectorAll('.pagination a').forEach(link => {
        link.addEventListener('click', function() {
            const spinner = document.createElement('div');
            spinner.className = 'spinner-border spinner-border-sm ms-2';
            spinner.setAttribute('role', 'status');
            this.appendChild(spinner);
        });
    });
});
</script>
@endsection

