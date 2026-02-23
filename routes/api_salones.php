<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Salones\SalonController;

// https://www.ingenieria.unam.mx/consultasfi/api/Salones/info?nombre_salon=J-101
// https://www.ingenieria.unam.mx/consultasfi/api/Salones/listadoSalones
// https://www.ingenieria.unam.mx/consultasfi/api/Salones/buscar-recurso?criterio=proyector
// https://www.ingenieria.unam.mx/consultasfi/api/Salones/capacidad-edificio
// https://www.ingenieria.unam.mx/consultasfi/api/Salones/caracteristicas?nombre_salon=J-101
//https://www.ingenieria.unam.mx/consultasfi/api/Salones/recursos?nombre_salon=J-101

Route::prefix('Salones')->group(function () {
    Route::get('/info', [SalonController::class, 'info']);
    Route::get('/listadoSalones', [SalonController::class, 'listadoSalones']);
    Route::get('/buscar-recurso', [SalonController::class, 'buscarPorRecurso']);
    Route::get('/capacidad-edificio', [SalonController::class, 'capacidadPorEdificio']);
    Route::get('/caracteristicas', [SalonController::class, 'caracteristicasSalon']);
    Route::get('/recursos', [SalonController::class, 'recursosPorSalon']);

});


