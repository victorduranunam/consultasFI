<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;  // ? punto y coma

/*
|--------------------------------------------------------------------------
| Rutas Web - Layouts
|--------------------------------------------------------------------------
*/



Route::get('/', [DashboardController::class, 'index']);  // dashboard


Route::get('/noticias', function () {
    return view('noticias.index');
});

Route::get('/inventarios', function () {
    return view('inventarios.index');
});

Route::get('/clases', function () {
    return view('clases.index');
});

Route::get('/salones', function () {
    return view('salones.index');
});