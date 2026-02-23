
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Web - SALONES
|--------------------------------------------------------------------------
*/


Route::prefix('Salones')->group(function () {

    Route::get('/', function () {
        return view('salones.index');
    });




    Route::get('/buscarSalones', function () {
        return view('salones.buscarSalones');
    });
    Route::get('buscarSalonDemo', function () {
        return view('salones.buscarSalonesDemo');
    })->name('buscarSalonesDemo');




    Route::get('/buscarInformacionSalon', function () {
        return view('salones.buscarInformacionSalon');
    });
    Route::get('buscarInformacionSalonDemo', function () {
        return view('salones.buscarInformacionSalonDemo');
    })->name('buscarInformacionSalonDemo');





    Route::get('/buscarRecurso', function () {
        return view('salones.buscarRecurso');
    });
    Route::get('buscarRecursoDemo', function () {
        return view('salones.buscarRecursoDemo');
    })->name('buscarRecursoDemo');



    Route::get('/buscarCapacidadEdificio', function () {
        return view('salones.buscarCapacidadEdificio');
    });
    Route::get('buscarCapacidadEdificioDemo', function () {
        return view('salones.buscarCapacidadEdificioDemo');
    })->name('buscarCapacidadEdificioDemo');




    Route::get('/buscarRecursosSalon', function () {
        return view('salones.buscarRecursosSalon');
    });
    Route::get('buscarRecursosSalonDemo', function () {
        return view('salones.buscarRecursosSalonDemo');
    })->name('buscarRecursosSalonDemo');



    Route::get('/buscarSalonDescripcion', function () {
        return view('salones.buscarSalonDescripcion');
    });
    Route::get('buscarSalonDescripcionDemo', function () {
        return view('salones.buscarSalonDescripcionDemo');
    })->name('buscarSalonDescripcionDemo');





    

});




