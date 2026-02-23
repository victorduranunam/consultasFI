<?php

use Illuminate\Support\Facades\Route;

// Mostrar formulario de login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Procesar login
Route::post('/login', function (\Illuminate\Http\Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    // Usuario fijo para ejemplo
    if ($email === 'victor@dominio.com' && $password === '12345678') {
        $request->session()->put('user_logged', true); // Guardar sesión
        return redirect('/Noticias');
    }

    return back()->withErrors(['email' => 'Usuario o contraseña incorrectos']);
});

// Logout
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    $request->session()->forget('user_logged'); // Borrar sesión
    return redirect('/login');
});