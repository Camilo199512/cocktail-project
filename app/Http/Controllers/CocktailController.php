<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cocktail;
use Illuminate\Support\Facades\Http;

class CocktailController extends Controller
{
    public function index()
    {
        // Consumir API
        $response = Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f=a');
        $cocktails = $response->json()['drinks'];

        return view('cocktails.index', compact('cocktails'));
    }

    public function store(Request $request)
    {
        Cocktail::create([
            'name' => $request->name,
            'category' => $request->category,
            'alcoholic' => $request->alcoholic,
            'glass' => $request->glass,
        ]);

        return redirect()->route('cocktails.saved');
    }

    public function saved()
    {
        $cocktails = Cocktail::all();
        return view('cocktails.saved', compact('cocktails'));
    }

    public function edit($id)
    {
        $cocktail = Cocktail::findOrFail($id);
        return view('cocktails.edit', compact('cocktail'));
    }

    public function update(Request $request, $id)
    {
        $cocktail = Cocktail::findOrFail($id);
        $cocktail->update([
            'name' => $request->name,
            'category' => $request->category,
            'alcoholic' => $request->alcoholic,
            'glass' => $request->glass,
        ]);

        return redirect()->route('cocktails.saved')->with('success', 'Cóctel actualizado correctamente.');
    }

    public function destroy($id)
    {
        Cocktail::destroy($id);
        return redirect()->route('cocktails.saved');
    }
}

