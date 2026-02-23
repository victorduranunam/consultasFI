<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Procesar login
     */
    public function processLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Validación simple (puedes cambiarla luego por BD)
        if ($username === 'invitado' && $password === 'invitado1234') {

            // Crear sesión
            $request->session()->put('usuario_activo', $username);

            return redirect('/Menu');
        }

        return back()->with([
            'mensaje' => 'Usuario o Clave incorrectos',
            'tipo' => 'error'
        ]);
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        // Elimina completamente la sesión (más seguro)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}