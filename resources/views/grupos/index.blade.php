@extends('layouts.app')

@section('content')
    @if (@session('success'))
        <div class="alert alert-success fade show" id="success message" role="alert" data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (@session('error'))
        <div class="alert alert-danger fade show" id="error message" role="alert" data-bs-dismiss="alert" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de grupos</div>
                    <div class="card-body">
                        <form action="{{ route('grupos.index') }}" method="GET">
                            @csrf
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">
                                    Nombre del grupo</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        placeholder="Nombre del grupo">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="{{route('grupos.create')}}" class="btn btn-primary">Crear grupo</a>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupos as $grupo)
                                    <tr>
                                        <td>{{ $grupo->nombre }}</td>
                                        <td>{{ $grupo->descripcion }}</td>
                                        <td>
                                            <table>
                                                <td>
                                                    <a href="{{ route('grupos.edit', $grupo->id) }}"
                                                        class="btn btn-warning">Editar</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('grupos.show', $grupo->id) }}"
                                                        class="btn btn-info">Ver</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('grupos.delete', $grupo->id) }}"
                                                        class="btn btn-danger">
                                                        Eliminar
                                                    </a>
                                                </td>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $grupos->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
