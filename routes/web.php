<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 

require __DIR__.'/web_layouts.php';
require __DIR__.'/web_noticias.php';
require __DIR__.'/web_inventarios.php';
require __DIR__.'/web_clases.php';
require __DIR__.'/web_salones.php';
require __DIR__.'/web_menu.php';


// LOGIN
Route::get('/', [LoginController::class, 'showLogin']); // Página principal
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin']);


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Otras rutas
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});





