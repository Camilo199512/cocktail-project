@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Lista de Cócteles</h1>
            <a href="{{ route('cocktails.saved') }}" class="btn btn-success">Ver Cócteles Guardados</a>
        </div>

        <div class="row g-4">
            @foreach($cocktails as $cocktail)
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cocktail['strDrink'] }}</h5>
                            <p class="card-text"><strong>Categoría:</strong> {{ $cocktail['strCategory'] }}</p>
                            <p class="card-text"><strong>Alcohol:</strong> {{ $cocktail['strAlcoholic'] }}</p>

                            <form method="POST" action="{{ route('cocktails.store') }}">
                                @csrf
                                <input type="hidden" name="name" value="{{ $cocktail['strDrink'] }}">
                                <input type="hidden" name="category" value="{{ $cocktail['strCategory'] }}">
                                <input type="hidden" name="alcoholic" value="{{ $cocktail['strAlcoholic'] }}">
                                <input type="hidden" name="glass" value="{{ $cocktail['strGlass'] }}">
                                <button type="submit" class="btn btn-primary btn-rounded mt-3">Guardar Cóctel</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
