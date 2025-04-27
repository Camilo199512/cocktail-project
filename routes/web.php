<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocktailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Crear usuarios (mostrar formulario y guardar)
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Rutas protegidas (requieren estar autenticado)
Route::middleware('auth')->group(function () {

    // Página de inicio - Lista de cócteles desde la API
    Route::get('/', [CocktailController::class, 'index'])->name('cocktails.index');

    // Guardar cócteles en base de datos
    Route::post('/save', [CocktailController::class, 'store'])->name('cocktails.store');

    // Ver cócteles guardados
    Route::get('/saved', [CocktailController::class, 'saved'])->name('cocktails.saved');

    // Editar cócteles guardados
    Route::get('/saved/{id}/edit', [CocktailController::class, 'edit'])->name('cocktails.edit');
    Route::put('/saved/{id}', [CocktailController::class, 'update'])->name('cocktails.update');

    // Eliminar cócteles
    Route::delete('/saved/{id}', [CocktailController::class, 'destroy'])->name('cocktails.destroy');
});
