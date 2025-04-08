@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Encabezado de la página -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Añadir Miembro del Equipo</h1>
            <p class="mb-0 text-muted">Crea un nuevo miembro para la sección "Nuestro Equipo"</p>
        </div>
        <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Volver al Listado
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Información del Miembro</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Columna izquierda: Información básica -->
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre Completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">Cargo / Puesto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}" required>
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Descripción Corta <small class="text-muted">(Máximo 150 caracteres)</small></label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3" maxlength="150">{{ old('short_description') }}</textarea>
                            <div class="form-text"><span id="char-count">0</span>/150 caracteres</div>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Asociar con Usuario Trabajador <small class="text-muted">(Opcional)</small></label>
                            <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                <option value="">-- Seleccionar Usuario --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Asociar este miembro con un usuario que tenga el rol de trabajador</div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="active" name="active" value="1" {{ old('active', '1') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">Mostrar en la web</label>
                            </div>
                            <div class="form-text">Si está desactivado, este miembro no aparecerá en la web</div>
                        </div>
                    </div>

                    <!-- Columna derecha: Imagen y redes sociales -->
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="image" class="form-label">Foto del Miembro <span class="text-danger">*</span></label>
                            <div class="card mb-2">
                                <div class="card-body text-center py-3">
                                    <div class="image-preview mb-3" id="imagePreview">
                                        <img src="{{ asset('assets/img/default-profile.jpg') }}" alt="Vista previa" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="mb-2">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                                    </div>
                                    <small class="text-muted">Recomendado: imagen cuadrada de al menos 300x300px</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Redes Sociales <small class="text-muted">(Opcional)</small></label>
                            <div class="social-networks-container">
                                <div class="social-network-row mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-linkedin"></i>
                                        </span>
                                        <select class="form-select social-network-name" name="social_networks[0][name]">
                                            <option value="facebook">Facebook</option>
                                            <option value="x">X (Twitter)</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="linkedin" selected>LinkedIn</option>
                                            <option value="youtube">YouTube</option>
                                            <option value="github">GitHub</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                        <input type="url" class="form-control" placeholder="URL (opcional)" name="social_networks[0][url]" value="{{ old('social_networks.0.url') }}">
                                        <button type="button" class="btn btn-outline-danger remove-social-network" disabled>
                                            <i class="bi bi-dash-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addSocialNetworkBtn">
                                <i class="bi bi-plus-circle me-1"></i> Añadir Red Social
                            </button>
                            <div class="form-text mt-2">Las redes sociales son opcionales. Puedes añadir varias o ninguna.</div>
                        </div>
                    </div>
                </div>

                <div class="border-top pt-3 mt-4 text-end">
                    <a href="{{ route('admin.team.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Guardar Miembro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Contador de caracteres para descripción corta
        const shortDescriptionEl = document.getElementById('short_description');
        const charCountEl = document.getElementById('char-count');

        shortDescriptionEl.addEventListener('input', function() {
            const currentLength = this.value.length;
            charCountEl.textContent = currentLength;

            if (currentLength > 150) {
                this.value = this.value.substring(0, 150);
                charCountEl.textContent = 150;
            }
        });

        // Inicializar contador
        charCountEl.textContent = shortDescriptionEl.value.length;

        // Previsualización de imagen
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview').querySelector('img');

        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Gestión de redes sociales
        const socialNetworksContainer = document.querySelector('.social-networks-container');
        const addSocialNetworkBtn = document.getElementById('addSocialNetworkBtn');
        let socialNetworkCount = 1;

        // Añadir nueva red social
        addSocialNetworkBtn.addEventListener('click', function() {
            const newRow = document.createElement('div');
            newRow.className = 'social-network-row mb-2';
            newRow.innerHTML = `
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-globe"></i>
                    </span>
                    <select class="form-select social-network-name" name="social_networks[${socialNetworkCount}][name]" onchange="updateSocialIcon(this)">
                        <option value="facebook">Facebook</option>
                        <option value="x">X (Twitter)</option>
                        <option value="instagram">Instagram</option>
                        <option value="linkedin">LinkedIn</option>
                        <option value="youtube">YouTube</option>
                        <option value="github">GitHub</option>
                        <option value="otro">Otro</option>
                    </select>
                    <input type="url" class="form-control" placeholder="URL" name="social_networks[${socialNetworkCount}][url]">
                    <button type="button" class="btn btn-outline-danger remove-social-network">
                        <i class="bi bi-dash-circle"></i>
                    </button>
                </div>
            `;
            socialNetworksContainer.appendChild(newRow);
            socialNetworkCount++;

            // Habilitar botones de eliminar
            updateRemoveButtons();
        });

        // Eliminar red social
        socialNetworksContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-social-network')) {
                e.target.closest('.social-network-row').remove();
                updateRemoveButtons();
                reindexSocialNetworks();
            }
        });

        // Actualizar estado de botones de eliminar
        function updateRemoveButtons() {
            const rows = document.querySelectorAll('.social-network-row');
            const removeButtons = document.querySelectorAll('.remove-social-network');

            removeButtons.forEach(button => {
                button.disabled = rows.length <= 1;
            });
        }

        // Reindexar campos de redes sociales
        function reindexSocialNetworks() {
            const rows = document.querySelectorAll('.social-network-row');
            rows.forEach((row, index) => {
                const selectField = row.querySelector('select');
                const inputField = row.querySelector('input[type="url"]');

                selectField.name = `social_networks[${index}][name]`;
                inputField.name = `social_networks[${index}][url]`;
            });

            socialNetworkCount = rows.length;
        }

        // Actualizar iconos según la red social seleccionada
        window.updateSocialIcon = function(selectElement) {
            const iconElement = selectElement.closest('.input-group').querySelector('.input-group-text i');
            const selectedValue = selectElement.value;

            const iconClasses = {
                'facebook': 'bi-facebook',
                'x': 'bi-x',
                'instagram': 'bi-instagram',
                'linkedin': 'bi-linkedin',
                'youtube': 'bi-youtube',
                'github': 'bi-github',
                'otro': 'bi-globe'
            };

            // Eliminar clases actuales
            iconElement.className = '';
            // Añadir nuevas clases
            iconElement.className = 'bi ' + (iconClasses[selectedValue] || 'bi-globe');
        };

        // Inicializar actualización de iconos para redes sociales existentes
        document.querySelectorAll('.social-network-name').forEach(function(select) {
            select.addEventListener('change', function() {
                updateSocialIcon(this);
            });
        });
    });
</script>
@endsection
