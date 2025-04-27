<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Mostrar el formulario de login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesar la autenticación del usuario.
     */
    public function login(Request $request)
    {
        // Validación de campos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Regenerar sesión para evitar ataques de sesión fija
            $request->session()->regenerate();

            // Redirigir a la página de inicio con mensaje de éxito
            return redirect()->intended('/')->with('success', '¡Bienvenido de nuevo!');
        }

        // Si falla la autenticación
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son válidas.',
        ])->withInput();
    }

    /**
     * Cerrar sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidar la sesión
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir a la pantalla de login con mensaje de cierre de sesión
        return redirect('/login')->with('success', '¡Sesión cerrada correctamente!');
    }
}
