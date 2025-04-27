@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-warning">Editar Cóctel</h1>
            <a href="{{ route('cocktails.saved') }}" class="btn btn-primary">Ver Cócteles Guardados</a>
        </div>

        <div class="card shadow-sm p-4">
            <form method="POST" action="{{ route('cocktails.update', $cocktail->id) }}">
                @csrf
                @method('PUT')

                <div class="form-floating mb-4">
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $cocktail->name) }}" required placeholder="Nombre del Cóctel" />
                    <label for="name">Nombre del Cóctel</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" id="category" name="category" class="form-control" value="{{ old('category', $cocktail->category) }}" placeholder="Categoría" />
                    <label for="category">Categoría</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" id="alcoholic" name="alcoholic" class="form-control" value="{{ old('alcoholic', $cocktail->alcoholic) }}" placeholder="Tipo de Alcohol" />
                    <label for="alcoholic">Tipo de Alcohol</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" id="glass" name="glass" class="form-control" value="{{ old('glass', $cocktail->glass) }}" placeholder="Tipo de Vaso" />
                    <label for="glass">Tipo de Vaso</label>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success btn-rounded">Actualizar</button>
                    <a href="{{ route('cocktails.saved') }}" class="btn btn-secondary btn-rounded">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
