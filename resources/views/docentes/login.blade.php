@extends('layouts.app')
@section('content')
    <h1>Login docente</h1>
    <form action="{{ route('docentes.login') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" id="email" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
           @error('InvalidCredentials')
                <div class="alert alert-danger fade show" id="error-message" data-bs-dimiss="alert" role="alert">
                    {{$message}}
                </div>
           @enderror
        </div>
    </form>
@endsection
