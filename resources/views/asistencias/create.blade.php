@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header row">
                    <p class="card-title col-md-12">Marcar Asistencia</p>
                </div>
                <div class="card-body row">
                    <form action="{{ route('asistencias.store') }}" method="POST" class="row">
                        @csrf
                        <div class="col-md-6">
                            <p>PIN ESTUDIANTE</p>
                        </div>
                        <div class="col-md-6"><input type="text" name="pin" class="form-control" required></div>
                        <div class="col-md-6" style="margin-top:10px;"><button type="submit" style="width:100%;" class="btn btn-primary">Marcar</button></div>
                        <div class="col-md-6" style="margin-top:10px;">
                            <a style="width: 100%" href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
