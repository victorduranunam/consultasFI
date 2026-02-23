<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Web - MENU
|--------------------------------------------------------------------------
*/

Route::prefix('Menu')->group(function () {

    Route::get('/', function () {
        return view('menu.index');
    });
    
});