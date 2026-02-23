<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inventarios\InventarioController;


//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/busqueda?campo=bn_desc&valor=OSCILOSCOPIO
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas-bn-desc?per_page=50&page=2
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas/division?division=DIE&page=1&per_page=20
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas/laboratorio?laboratorio=F%C3%ADsica&page=1&per_page=20
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/departamento?departamento=Planeaci%C3%B3n&page=1&per_page=20
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/descripcion?descripcion=osciloscopio&page=1&per_page=20
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/division?division=DIE&page=1&per_page=20
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/edificio?letra=O&page=1&per_page=20
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/responsable?responsable=Jorge&page=1&per_page=20
//https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/totales-laboratorio?page=1&per_page=20

Route::prefix('Inventarios')->group(function () {

    Route::get('/', [InventarioController::class, 'index']);               
    Route::get('/busqueda', [InventarioController::class, 'busqueda']);
    Route::get('/estadisticas-bn-desc', [InventarioController::class, 'estadisticasBnDesc']);
    Route::get('/estadisticas/division', [InventarioController::class, 'estadisticasBnDescPorDivision']);
    Route::get('/estadisticas/laboratorio', [InventarioController::class, 'estadisticasBnDescPorLaboratorio']);
    Route::get('departamento', [InventarioController::class, 'inventarioPorDepartamento']);
    Route::get('/descripcion', [InventarioController::class, 'inventarioPorDescripcion']);
    Route::get('/division', [InventarioController::class, 'inventarioPorDivision']);
    Route::get('/edificio', [InventarioController::class, 'inventarioPorEdificioLetra']);
    Route::get('/responsable', [InventarioController::class, 'inventarioPorResponsable']);
    Route::get('/totales-laboratorio', [InventarioController::class, 'totalesPorLaboratorio']);


   
});