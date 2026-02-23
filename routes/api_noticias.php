<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Noticias\NoticiaController;


//https://www.ingenieria.unam.mx/consultasfi/api/Noticias
//https://www.ingenieria.unam.mx/consultasfi/api/Noticias/completas?page=1&per_page=3
//https://www.ingenieria.unam.mx/consultasfi/api/Noticias/recientes?limit=10
//https://www.ingenieria.unam.mx/consultasfi/api/Noticias/seccion/3
//https://www.ingenieria.unam.mx/consultasfi/api/Noticias/buscar?palabra=ingenieria
//https://www.ingenieria.unam.mx/consultasfi/api/Noticias/buscar?palabra=ingenieria&limite=10&offset=0
//https://www.ingenieria.unam.mx/consultasfi/api/Noticias/dependencia?dependencia=DIMEI&limit=10&offset=10
//https://www.ingenieria.unam.mx/consultasfi/api/Noticias/persona?persona=rosalba&limit=2&offset=0


Route::prefix('Noticias')->group(function () {

    Route::get('/', [NoticiaController::class, 'index']);  
    Route::get('/completas', [NoticiaController::class, 'listarNoticias']);    
    Route::get('/recientes', [NoticiaController::class, 'recientes']);
      
    Route::get('/seccion/{id_seccion}', [NoticiaController::class, 'secciones']);
    Route::get('/buscar', [NoticiaController::class, 'buscar']);
    Route::get('/dependencia', [NoticiaController::class, 'noticiasPorDependencia']);
    Route::get('/persona', [NoticiaController::class, 'noticiasPorPersonaQuery']);

});
