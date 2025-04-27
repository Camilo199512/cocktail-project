@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="width: 400px;">
            <h3 class="text-center mb-4 text-primary">Iniciar Sesión</h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required>
                    <label for="email">Correo electrónico</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                    <label for="password">Contraseña</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <!-- Hipervínculo para registrarse -->
            <div class="text-center mt-3">
                <small>¿No tienes una cuenta?</small><br>
                <a href="{{ route('users.create') }}" class="btn btn-link">Crear una nueva cuenta</a>
            </div>

        </div>
    </div>
@endsection
