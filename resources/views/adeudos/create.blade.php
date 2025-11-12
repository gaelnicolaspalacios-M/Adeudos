@extends('layouts.app')

@section('title', 'Nuevo Adeudo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Registrar Nuevo Adeudo</h4>
                </div>
                <div class="card-body">

                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrige los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('adeudos.store') }}" method="POST">
                        @csrf

                        <!-- Número de Control -->
                        <div class="mb-3">
                            <label for="no_de_control" class="form-label">Número de Control <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('no_de_control') is-invalid @enderror"
                                id="no_de_control" name="no_de_control"
                                value="{{ old('no_de_control') }}" placeholder="Ej: 21304258" required>
                            @error('no_de_control') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Tipo -->
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('tipo') is-invalid @enderror"
                                id="tipo" name="tipo"
                                value="{{ old('tipo') }}" placeholder="Ej: Laboratorio / Biblioteca / Otro" required>
                            @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Periodo -->
                        <div class="mb-3">
                            <label for="periodo" class="form-label">Periodo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('periodo') is-invalid @enderror"
                                id="periodo" name="periodo"
                                value="{{ old('periodo') }}" placeholder="Ej: AGO-DIC 2025" required>
                            @error('periodo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Laboratorio -->
                        <div class="mb-3">
                            <label for="laboratorio" class="form-label">Laboratorio</label>
                            <input type="text" class="form-control @error('laboratorio') is-invalid @enderror"
                                id="laboratorio" name="laboratorio"
                                value="{{ old('laboratorio') }}" placeholder="Ej: Computación">
                            @error('laboratorio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Costo -->
                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('costo') is-invalid @enderror"
                                id="costo" name="costo" step="0.01"
                                value="{{ old('costo') }}" placeholder="Ej: 150.00" required>
                            @error('costo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Fecha -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('fecha') is-invalid @enderror"
                                id="fecha" name="fecha"
                                value="{{ old('fecha') }}" required>
                            @error('fecha') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                id="descripcion" name="descripcion" rows="3"
                                placeholder="Ej: Falta de entrega de material, daño en equipo, etc.">{{ old('descripcion') }}</textarea>
                            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Clave Área -->
                        <div class="mb-3">
                            <label for="clave_area" class="form-label">Clave Área <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('clave_area') is-invalid @enderror"
                                id="clave_area" name="clave_area"
                                value="{{ old('clave_area') }}" placeholder="Ej: INF-01" required>
                            @error('clave_area') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('adeudos.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar Adeudo
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
