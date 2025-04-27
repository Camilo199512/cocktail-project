@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-success">Cócteles Guardados</h1>
            <a href="{{ route('cocktails.index') }}" class="btn btn-primary">Ir a Inicio</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Alcohol</th>
                    <th>Vaso</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cocktails as $cocktail)
                    <tr>
                        <td>{{ $cocktail->name }}</td>
                        <td>{{ $cocktail->category }}</td>
                        <td>{{ $cocktail->alcoholic }}</td>
                        <td>{{ $cocktail->glass }}</td>
                        <td>
                            <a href="{{ route('cocktails.edit', $cocktail->id) }}" class="btn btn-warning btn-sm me-1">✏️</a>

                            <form method="POST" action="{{ route('cocktails.destroy', $cocktail->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
