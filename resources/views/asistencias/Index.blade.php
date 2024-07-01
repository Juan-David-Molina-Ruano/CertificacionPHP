@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-header row">
                    <p class="card-title col-md-12">Asistencia</p>
                    <a href="{{ route('asistencias.create') }}" class="col-md-12 btn btn-success">Marcar</a>
                </div>
                <div class="card-body row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Estudiante</th>
                                <th>Grupo</th>
                                <th>Hora de entrada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asistencias as $asistencia)
                                <tr>
                                    <td>{{ $asistencia->fecha }}</td>
                                    <td>{{ $asistencia->estudiante->nombre }}</td>
                                    <td>{{ $asistencia->grupo->nombre }}</td>
                                    <td>{{ $asistencia->hora_entrada }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
