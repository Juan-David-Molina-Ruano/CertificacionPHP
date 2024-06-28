@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear nuevo grupo</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grupos.store') }}">
                            @csrf
                            <div class="form-group row" style="margin-top: 10px;">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">
                                    Nombre
                                </label>
                                <div class="col-md-6">
                                    <input required name="nombre" id="nombre" type="text" class="form-control"
                                        placeholder="Nombre de grupo">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top: 10px;">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">
                                    Descripción
                                </label>
                                <div class="col-md-6">
                                    <textarea required name="descripcion" id="descripcion" type="text" class="form-control"
                                        >
                                        </textarea>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-top: 10px;">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Crear
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
