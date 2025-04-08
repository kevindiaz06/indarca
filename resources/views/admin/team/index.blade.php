@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Encabezado de la página -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Gestión del Equipo</h1>
            <p class="mb-0 text-muted">Administra los miembros que aparecen en la sección "Nuestro Equipo"</p>
        </div>
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Miembro
        </a>
    </div>

    <!-- Alertas -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Tarjeta principal -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Miembros del Equipo</h6>
            <div class="card-tools">
                <button class="btn btn-sm btn-outline-primary" id="saveOrderBtn" style="display: none;">
                    <i class="bi bi-save me-1"></i> Guardar Orden
                </button>
                <button class="btn btn-sm btn-outline-secondary" id="reorderBtn">
                    <i class="bi bi-arrow-down-up me-1"></i> Reordenar
                </button>
            </div>
        </div>
        <div class="card-body">
            @if($teamMembers->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-people display-4 text-muted"></i>
                    <p class="mt-3 mb-0">No hay miembros del equipo registrados</p>
                    <p class="text-muted">Agrega tu primer miembro haciendo clic en "Nuevo Miembro"</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover" id="teamTable">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Imagen</th>
                                <th width="20%">Nombre</th>
                                <th width="15%">Cargo</th>
                                <th width="15%">Usuario</th>
                                <th width="15%">Estado</th>
                                <th width="20%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="teamTableBody">
                            @foreach($teamMembers as $member)
                            <tr data-id="{{ $member->id }}">
                                <td class="handle">
                                    <span class="order-handle" style="cursor: grab; display: none;">
                                        <i class="bi bi-grip-vertical"></i>
                                    </span>
                                    <span class="order-number">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td>
                                    @if($member->image)
                                        <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="img-profile rounded-circle" width="50" height="50">
                                    @else
                                        <div class="avatar bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <span class="text-white">{{ substr($member->name, 0, 1) }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->position }}</td>
                                <td>
                                    @if($member->user)
                                        <span class="badge bg-info">{{ $member->user->name }}</span>
                                    @else
                                        <span class="badge bg-secondary">No asignado</span>
                                    @endif
                                </td>
                                <td>
                                    @if($member->active)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $member->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Modal de eliminación -->
                                    <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $member->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $member->id }}">Confirmar eliminación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas eliminar a <strong>{{ $member->name }}</strong> del equipo?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('admin.team.destroy', $member) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const teamTableBody = document.getElementById('teamTableBody');
        const reorderBtn = document.getElementById('reorderBtn');
        const saveOrderBtn = document.getElementById('saveOrderBtn');
        const orderHandles = document.querySelectorAll('.order-handle');
        const orderNumbers = document.querySelectorAll('.order-number');

        let sortable = null;

        // Alternar modo de reordenamiento
        reorderBtn.addEventListener('click', function() {
            const isReordering = reorderBtn.classList.contains('active');

            if (!isReordering) {
                // Activar modo reordenamiento
                reorderBtn.classList.add('active');
                reorderBtn.textContent = 'Cancelar';
                reorderBtn.classList.replace('btn-outline-secondary', 'btn-outline-danger');
                saveOrderBtn.style.display = 'inline-block';

                // Mostrar manejadores de arrastre
                orderHandles.forEach(handle => handle.style.display = 'inline-block');
                orderNumbers.forEach(number => number.style.display = 'none');

                // Inicializar Sortable
                sortable = new Sortable(teamTableBody, {
                    handle: '.handle',
                    animation: 150,
                    onEnd: function() {
                        // Actualizar números de orden visualmente
                        updateOrderNumbers();
                    }
                });
            } else {
                // Desactivar modo reordenamiento
                deactivateReorderMode();
            }
        });

        // Guardar nuevo orden
        saveOrderBtn.addEventListener('click', function() {
            const rows = teamTableBody.querySelectorAll('tr');
            const orderData = [];

            // Recopilar IDs en el nuevo orden
            rows.forEach(row => {
                orderData.push(row.getAttribute('data-id'));
            });

            // Enviar al servidor
            fetch('{{ route("admin.team.update-order") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ order: orderData })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mostrar mensaje de éxito
                    const alert = document.createElement('div');
                    alert.className = 'alert alert-success alert-dismissible fade show';
                    alert.innerHTML = `
                        Orden actualizado correctamente
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    `;

                    const cardHeader = document.querySelector('.card-header');
                    cardHeader.insertAdjacentElement('afterend', alert);

                    // Desactivar modo reordenamiento
                    deactivateReorderMode();

                    // Cerrar alerta después de 3 segundos
                    setTimeout(() => {
                        alert.remove();
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        // Función para actualizar números de orden visualmente
        function updateOrderNumbers() {
            const rows = teamTableBody.querySelectorAll('tr');
            rows.forEach((row, index) => {
                const orderSpan = row.querySelector('.order-number');
                if (orderSpan) {
                    orderSpan.textContent = index + 1;
                }
            });
        }

        // Función para desactivar modo reordenamiento
        function deactivateReorderMode() {
            reorderBtn.classList.remove('active');
            reorderBtn.innerHTML = '<i class="bi bi-arrow-down-up me-1"></i> Reordenar';
            reorderBtn.classList.replace('btn-outline-danger', 'btn-outline-secondary');
            saveOrderBtn.style.display = 'none';

            // Ocultar manejadores de arrastre
            orderHandles.forEach(handle => handle.style.display = 'none');
            orderNumbers.forEach(number => number.style.display = 'inline-block');

            // Destruir Sortable
            if (sortable) {
                sortable.destroy();
                sortable = null;
            }
        }
    });
</script>
@endsection
