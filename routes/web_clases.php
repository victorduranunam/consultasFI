<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Web - CLASES
|--------------------------------------------------------------------------
*/

Route::prefix('clases')->group(function () {

    Route::get('/', function () {
        return view('clases.index');
    });

    Route::get('/buscarProfesor', function () {
        return view('clases.buscarProfesor');
    });


    Route::get('buscarProfesorDemo', function () {
        return view('clases.buscarProfesorDemo');
    })->name('buscarProfesorDemo');


    Route::get('/buscarAlumno', function () {
        return view('clases.buscarAlumno');
    });


    Route::get('buscarAlumnoDemo', function () {
        return view('clases.buscarAlumnoDemo');
    })->name('buscarAlumnoDemo');
    


    Route::get('/buscarMateria', function () {
        return view('clases.buscarMateria');
    });


    Route::get('buscarMateriaDemo', function () {
        return view('clases.buscarMateriaDemo');
    })->name('buscarMateriaDemo');
        





    Route::get('/buscarGrupoProfesor', function () {
        return view('clases.buscarGrupoProfesor');
    });


    Route::get('/buscarGrupoProfesorDemo', function () {
        return view('clases.buscarGrupoProfesorDemo');
    })->name('buscarGrupoProfesorDemo');
        
   


    Route::get('/buscarGrupoAlumno', function () {
        return view('clases.buscarGrupoAlumno');
    });


    Route::get('/buscarGrupoAlumnoDemo', function () {
        return view('clases.buscarGrupoAlumnoDemo');
    })->name('buscarGrupoAlumnoDemo');
        
   




    Route::get('/buscarGrupoMateria', function () {
        return view('clases.buscarGrupoMateria');
    });


    Route::get('/buscarGrupoMateriaDemo', function () {
        return view('clases.buscarGrupoMateriaDemo');
    })->name('buscarGrupoMateriaDemo');
        
   
      
      
      
    Route::get('/buscarMateriaDivision', function () {
        return view('clases.buscarMateriaDivision');
    });


    Route::get('/buscarMateriaDivisionDemo', function () {
        return view('clases.buscarMateriaDivisionDemo');
    })->name('buscarMateriaDivisionDemo');
        
   
   

      
    Route::get('/buscarTotalMateria', function () {
        return view('clases.buscarTotalMateria');
    });
    



    Route::get('/buscarTotalMateriaDemo', function () {
        return view('clases.buscarTotalMateriaDemo');
    })->name('buscarTotalMateria');
        
      

   
        
   
    Route::get('/buscarAlumnoGrupo', function () {
        return view('clases.buscarAlumnoGrupo');
    });


    Route::get('/buscarAlumnoGrupoDemo', function () {
        return view('clases.buscarAlumnoGrupoDemo');
    })->name('buscarAlumnoGrupoDemo');
        
   
   

    

    Route::get('/buscarMateriaSemestre', function () {
        return view('clases.buscarMateriaSemestre');
    });


    Route::get('/buscarMateriaSemestreDemo', function () {
        return view('clases.buscarMateriaSemestreDemo');
    })->name('buscarMateriaSemestreDemo');
           
   
   
   
    Route::get('/buscarProfesorDivision', function () {
        return view('clases.buscarProfesorDivision');
    });


    Route::get('/buscarProfesorDivisionDemo', function () {
        return view('clases.buscarProfesorDivisionDemo');
    })->name('buscarProfesorDivisionDemo');
        
      
      
      
    

});
