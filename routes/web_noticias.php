<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Web - Noticias
|--------------------------------------------------------------------------
*/

Route::prefix('noticias')->group(function () {

    Route::get('/', function () {
        return view('noticias.index');
    });




    Route::get('/buscarTodasNoticias', function () {
        return view('noticias.buscarTodasNoticias');
    });
    Route::get('buscarTodasNoticiasDemo', function () {
        return view('noticias.buscarTodasNoticiasDemo');
    })->name('buscarTodasNoticiasDemo');



    Route::get('/recientes', function () {
        return view('noticias.recientes');
    });
        Route::get('recientesDemo', function () {
        return view('noticias.recientesDemo');
    })->name('recientesDemo');

    
    
    
        Route::get('/recientesCarrusel', function () {
        return view('noticias.recientesCarrusel');
    });
        Route::get('recientesCarruselDemo', function () {
        return view('noticias.recientesCarruselDemo');
    })->name('recientesCarruselDemo');

    

  Route::get('/seccion', function () {
        return view('noticias.seccion');
    });
        Route::get('seccionDemo', function () {
        return view('noticias.seccionDemo');
    })->name('seccionDemo');




  Route::get('/seccionCarrusel', function () {
        return view('noticias.seccionCarrusel');
    });
        Route::get('seccionCarruselDemo', function () {
        return view('noticias.seccionCarruselDemo');
    })->name('seccionCarruselDemo');




   Route::get('/buscar', function () {
        return view('noticias.buscar');
    });
        Route::get('buscarDemo', function () {
        return view('noticias.buscarDemo');
    })->name('buscarDemo');
    
    
    
    Route::get('/dependencia', function () {
        return view('noticias.dependencia');
    });
        Route::get('dependenciaDemo', function () {
        return view('noticias.dependenciaDemo');
    })->name('dependenciaDemo');



    Route::get('/dependenciaCarrusel', function () {
        return view('noticias.dependenciaCarrusel');
    });
        Route::get('dependenciaCarruselDemo', function () {
        return view('noticias.dependenciaCarruselDemo');
    })->name('dependenciaCarruselDemo');





   Route::get('/persona', function () {
        return view('noticias.persona');
    });
        Route::get('personaDemo', function () {
        return view('noticias.personaDemo');
    })->name('personaDemo');
 


   Route::get('/personaCarrusel', function () {
        return view('noticias.personaCarrusel');
    });
        Route::get('personaCarruselDemo', function () {
        return view('noticias.personaCarruselDemo');
    })->name('personaCarruselDemo');
  



});


