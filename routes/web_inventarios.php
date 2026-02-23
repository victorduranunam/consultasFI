<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Web - CLASES
|--------------------------------------------------------------------------
*/

Route::prefix('Inventarios')->group(function () {

    Route::get('/', function () {
        return view('inventarios.index');
    });

    Route::get('/busquedaGeneral', function () {
        return view('.inventarios.busquedaGeneral');
    });
    Route::get('busquedaGeneralDemo', function () {
        return view('inventarios.busquedaGeneralDemo');
    })->name('busquedaGeneralDemo');


     
      Route::get('/busquedaInventarioPersonalizada', function () {
        return view('.inventarios.busquedaInventarioPersonalizada');
    });
    Route::get('busquedaInventarioPersonalizadaDemo', function () {
        return view('inventarios.busquedaInventarioPersonalizadaDemo');
    })->name('busquedaInventarioPersonalizadaDemo');

     
     
    Route::get('/busquedaEstadisticasDesc', function () {
        return view('.inventarios.busquedaEstadisticasDesc');
    });
    Route::get('busquedaEstadisticasDescDemo', function () {
        return view('inventarios.busquedaEstadisticasDescDemo');
    })->name('busquedaEstadisticasDescDemo');

    

     
    Route::get('/busquedaEstadisticasDivision', function () {
        return view('.inventarios.busquedaEstadisticasDivision');
    });
    Route::get('busquedaEstadisticasDivisionDemo', function () {
        return view('inventarios.busquedaEstadisticasDivisionDemo');
    })->name('busquedaEstadisticasDivisionDemo');

        

   Route::get('/busquedaEstadisticasLaboratorio', function () {
        return view('.inventarios.busquedaEstadisticasLaboratorio');
    });
    Route::get('busquedaEstadisticasLaboratorioDemo', function () {
        return view('inventarios.busquedaEstadisticasLaboratorioDemo');
    })->name('busquedaEstadisticasLaboratorioDemo');





   Route::get('/busquedaEstadisticasDepartamento', function () {
        return view('.inventarios.busquedaEstadisticasDepartamento');
    });
    Route::get('busquedaEstadisticasDepartamentoDemo', function () {
        return view('inventarios.busquedaEstadisticasDepartamentoDemo');
    })->name('busquedaEstadisticasDepartamentoDemo');




   Route::get('/busquedaEstadisticasEdificio', function () {
        return view('.inventarios.busquedaEstadisticasEdificio');
    });
    Route::get('busquedaEstadisticasEdificioDemo', function () {
        return view('inventarios.busquedaEstadisticasEdificioDemo');
    })->name('busquedaEstadisticasEdificioDemo');







   Route::get('/busquedaEstadisticasResponsable', function () {
        return view('.inventarios.busquedaEstadisticasResponsable');
    });
    Route::get('busquedaEstadisticasResponsableDemo', function () {
        return view('inventarios.busquedaEstadisticasResponsableDemo');
    })->name('busquedaEstadisticasResponsableDemo');





   Route::get('/busquedaTotalLaboratorios', function () {
        return view('.inventarios.busquedaTotalLaboratorios');
    });
    Route::get('busquedaTotalLaboratoriosDemo', function () {
        return view('inventarios.busquedaTotalLaboratoriosDemo');
    })->name('busquedaTotalLaboratoriosDemo');





    

});
