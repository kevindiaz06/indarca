@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Title -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Editar Usuario</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.usuarios') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar: {{ $user->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left-circle me-1"></i> Volver al Dashboard
            </a>
            <a href="{{ route('admin.usuarios') }}" class="btn btn-outline-primary">
                <i class="bi bi-people me-1"></i> Lista de Usuarios
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Información del Usuario</h6>
                    <div>
                        @if($user->id == Auth::id())
                            <span class="badge bg-primary">Este eres tú</span>
                        @endif
                        @if($user->role === 'admin')
                            <span class="badge bg-danger">Administrador</span>
                        @elseif($user->role === 'trabajador')
                            <span class="badge bg-primary">Trabajador</span>
                        @else
                            <span class="badge bg-secondary">Cliente</span>
                        @endif
                    </div>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.usuarios.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="form-label fw-medium">{{ __('Nombre completo') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">{{ __('Correo electrónico') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="role" class="form-label fw-medium">{{ __('Rol de usuario') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-shield-lock"></i></span>
                                <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required
                                    {{ ($user->id == Auth::id() && Auth::user()->role === 'admin') || Auth::user()->role === 'trabajador' ? 'disabled' : '' }}>
                                    <option value="web" {{ (old('role', $user->role) == 'web') ? 'selected' : '' }}>Cliente</option>
                                    <option value="trabajador" {{ (old('role', $user->role) == 'trabajador') ? 'selected' : '' }}>Trabajador</option>
                                    <option value="admin" {{ (old('role', $user->role) == 'admin') ? 'selected' : '' }}>Administrador</option>
                                </select>
                            </div>
                            @if($user->id == Auth::id() && Auth::user()->role === 'admin')
                                <div class="form-text text-warning">
                                    <i class="bi bi-exclamation-triangle me-1"></i> No puedes cambiar tu propio rol de administrador
                                    <input type="hidden" name="role" value="{{ $user->role }}">
                                </div>
                            @elseif(Auth::user()->role === 'trabajador')
                                <div class="form-text text-warning">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Como trabajador, no puedes cambiar el rol de los usuarios
                                    <input type="hidden" name="role" value="{{ $user->role }}">
                                </div>
                            @endif
                            @error('role')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text mt-2">
                                <div class="d-flex align-items-center mb-1">
                                    <span class="badge bg-secondary me-2">Cliente</span>
                                    <small>Acceso solo a funcionalidades básicas</small>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="badge bg-primary me-2">Trabajador</span>
                                    <small>Acceso al panel de administración y gestión de usuarios</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-danger me-2">Administrador</span>
                                    <small>Acceso completo a todas las funcionalidades</small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-medium">{{ __('Contraseña') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-key"></i></span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="********">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text">Dejar en blanco para mantener la contraseña actual</div>
                            </div>

                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label fw-medium">{{ __('Confirmar Contraseña') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-key-fill"></i></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="********">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a href="{{ route('admin.usuarios') }}" class="btn btn-light me-2">
                                <i class="bi bi-x-circle me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
