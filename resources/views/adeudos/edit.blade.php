@extends('layouts.app')
@section('title', 'Editar Adeudo')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Aseguradora</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{route('adeudos.update', $adeudos->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="id" class="form-label">
                                Id
                            </label>
                            <input
                                type="text" 
                                class="form-control bg-light" 
                                id="id" 
                                value="{{ $adeudos->id }}"
                                readonly
                                disabled>
                            <small class="text-muted"> El Id no se puede modificar </small>
                        </div>

                        <div class="mb-3">
                            <label for="no_de_control" class="form-label">
                                Numero de control <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('no_de_control') is-invalid @enderror" 
                                id="no_de_control" 
                                name="no_de_control" 
                                value="{{ old('no_de_control', $adeudos->no_de_control) }}"
                                required>
                            @error('no_de_control')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">
                                Tipo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('tipo') is-invalid @enderror" 
                                id="tipo" 
                                name="tipo" 
                                value="{{ old('tipo', $adeudos->tipo) }}"
                                required>
                            @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="periodo" class="form-label">
                                Periodo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('periodo') is-invalid @enderror" 
                                id="periodo" 
                                name="periodo" 
                                value="{{ old('periodo', $adeudos->periodo) }}"
                                required>
                            @error('periodo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="laboratorio" class="form-label">
                                Laboratorio <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('laboratorio') is-invalid @enderror" 
                                id="laboratorio" 
                                name="laboratorio" 
                                value="{{ old('laboratorio', $adeudos->laboratorio) }}"
                                required>
                            @error('laboratorio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="costo" class="form-label">
                                Costo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('costo') is-invalid @enderror" 
                                id="costo" 
                                name="costo" 
                                value="{{ old('costo', $adeudos->costo) }}"
                                required>
                            @error('costo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="form-label">
                                Fecha <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="date-local" 
                                class="form-control @error('fecha') is-invalid @enderror" 
                                id="fecha" 
                                name="fecha" 
                                value="{{ old('fecha', $adeudos->fecha->format('d-m-Y')) }}"
                                required>
                            @error('fecha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">
                                Descripcion <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('descripcion') is-invalid @enderror" 
                                id="descripcion" 
                                name="descripcion" 
                                value="{{ old('descripcion', $adeudos->descripcion) }}"
                                required>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="clave_area" class="form-label">
                                Clave_area <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('clave_area') is-invalid @enderror" 
                                id="clave_area" 
                                name="clave_area" 
                                value="{{ old('clave_area', $adeudos->clave_area) }}"
                                required>
                            @error('clave_area')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <small>
                                <strong>Fecha de creación:</strong> {{ $adeudos->created_at->format('d/m/Y H:i') }}<br>
                                <strong>Última actualización:</strong> {{ $adeudos->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('adeudos.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar Adeudo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
