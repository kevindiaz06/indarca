@extends('layout')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-1 fw-bold text-primary">419</h1>
            <h2 class="mb-4">Página expirada</h2>
            <p class="mb-4">Lo sentimos, tu sesión ha expirado. Por favor, vuelve a intentarlo.</p>
            <div class="mb-5">
                <img src="{{ asset('assets/img/expired.svg') }}" alt="Página expirada" class="img-fluid" style="max-height: 300px;">
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary me-2">
                <i class="bi bi-arrow-repeat me-2"></i>Reintentar
            </a>
            <a href="{{ route('inicio') }}" class="btn btn-outline-primary">
                <i class="bi bi-house-door me-2"></i>Volver al inicio
            </a>
        </div>
    </div>
</div>
@endsection
