@extends('layouts.app')
@section('title', 'Adeudos')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Lista de Adeudos</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('adeudos.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nuevo Adeudo
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

 
    
  <div class="card"> 
    <div class="card-body">
        @if(isset($adeudos) && $adeudos->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Numero de control</th>
                        <th>Tipo</th>
                        <th>Periodo</th>
                        <th>Laboratorio</th>
                        <th>Costo</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Clave del area</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adeudos as $adeudo)
                        <tr>
                            <td>{{$adeudo->no_de_control}}</td>
                            <td>{{$adeudo->tipo}}</td>
                            <td>{{$adeudo->periodo}}</td>
                            <td>{{$adeudo->laboratorio}}</td>
                            <td>{{$adeudo->costo}}</td>
                            <td>{{$adeudo->fecha}}</td>
                            <td>{{$adeudo->descripcion}}</td>
                            <td>{{$adeudo->clave_area}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('adeudos.show', $adeudo->id) }}" method="POST" 
                                        class="btn btn-sm btn-info"
                                        title="Ver detalle">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('adeudos.edit', $adeudo->id) }}" method="POST" 
                                        class="btn btn-sm btn-warning"
                                        title="Editar">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <form action="{{ route('adeudos.destroy', $adeudo->id) }}" 
                                        method="POST"
                                         class="d-inline"
                                         
                                        onsubmit="return confirm('¿Estás seguro de eliminar este adeudo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i>No hay adeudos registrados.
                <a href="{{ route('adeudos.create')}}">Crear la primera</a>
            </div>
        @endif
    </div>
  </div>
  @endsection