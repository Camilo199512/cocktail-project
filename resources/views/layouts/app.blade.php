<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cócteles App</title>

    <!-- Icono personalizado 🍹 -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 16 16%22><text y=%2214%22 font-size=%2216%22>🍹</text></svg>">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design for Bootstrap 5 (MDB) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet"/>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- MDB JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.js"></script>

    <style>
        body {
            background: #f5f7fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        h1, h3, h5 {
            font-weight: 600;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('cocktails.index') }}">🍹 CóctelesApp</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                @auth
                    <li class="nav-item me-3">
                            <span class="nav-link disabled">
                                👋 Hola, {{ Auth::user()->name }}
                            </span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm ms-2">Cerrar Sesión</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Iniciar Sesión</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Mensajes de éxito -->
<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif
</div>

<!-- Contenido dinámico -->
@yield('content')

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
