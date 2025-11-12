@extends('layouts.app')

@section('title', 'Detalle de Adeudo')

@section('content')
<div class="container">
    <div class="row jutify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Adeudo</h4>
                    <div>
                        <a href="{{ route('adeudos.edit', $adeudos->id) }}"
                            class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('adeudos.index')}}"
                            class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i>Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" class="bg-light">Id</th>
                                <th>{{ $adeudos->id}}</th>
                            </tr>
                             
                             <tr>
                                <th class="bg-light">Tipo</th>
                                <td>{{ $adeudos->tipo }}</td>
                            </tr>

                             <tr>
                                <th class="bg-light">Periodo</th>
                                <td>{{ $adeudos->periodo }}</td>
                            </tr>

                             <tr>
                                <th class="bg-light">Laboratorio</th>
                                <td>{{ $adeudos->laboratorio }}</td>
                            </tr>

                             <tr>
                                <th class="bg-light">Costo</th>
                                <td>{{ $adeudos->costo }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Fecha</th>
                                <td>
                                    {{ $adeudos->fecha->format('d/m/Y') }}
                                    <small class="text-muted">({{ $adeudos->fecha->diffForHumans()}})</small>    
                                </td>
                            <tr>
                                <th class="bg-light">Descripcion</th>
                                <td>{{ $adeudos->descripcion }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Clave de la area</th>
                                <td>{{ $adeudos->clave_area }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Creado</th>
                                <td>{{ $adeudos->created_at->format('d/m/Y H:i') }}</td>
                            </tr>

                            <tr>
                                <th class="bg-light">Última Actualización</th>
                                <td>{{ $adeudos->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-3">
                        <form action="{{ route('adeudos.destroy', $adeudos->id) }}"
                            method="POST"
                            onsubmit="return confirm('¿Está seguro de eliminar esta aseguradora?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Adeudo
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection