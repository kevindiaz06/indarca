@extends('layout')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-1 fw-bold text-primary">401</h1>
            <h2 class="mb-4">No autorizado</h2>
            <p class="mb-4">Lo sentimos, necesitas iniciar sesión para acceder a esta página.</p>
            <div class="mb-5">
                <i class="bi bi-shield-lock text-warning" style="font-size: 150px;"></i>
            </div>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar sesión
                </a>
                <a href="{{ route('inicio') }}" class="btn btn-outline-primary">
                    <i class="bi bi-house-door me-2"></i>Volver al inicio
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
