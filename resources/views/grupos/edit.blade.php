@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modificar Grupo</div>
                    <div class="card-body">
                        <form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nombre" value="{{ $grupo->nombre }}"
                                        id="nombre"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">
                                    Descripcion</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="descripcion" id="descripcion" >{{ $grupo->descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                    <a href="{{ route('grupos.index') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
