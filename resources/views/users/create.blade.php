@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="width: 400px;">
            <h3 class="text-center mb-4 text-primary">Crear Nuevo Usuario</h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                    <label for="name">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required>
                    <label for="email">Correo electrónico</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                    <label for="password">Contraseña</label>
                </div>

                <button type="submit" class="btn btn-success w-100">Crear Usuario</button>
                <a href="{{ route('cocktails.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
