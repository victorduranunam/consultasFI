<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Academicos\AcademicoController;

//https://www.ingenieria.unam.mx/consultasfi/api/Clases/buscarProfesor?nombre=Juan
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/buscarProfesor?nombre=victor&ape_paterno=duran&limit=20&offset=0
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/buscarProfesor?nombre=JUAN&ape_paterno=PEREZ&ape_materno=LOPEZ&correo_personal=juan.perez@unam.mx&num_trabajador=12345&limit=50&offset=0
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/totales-por-materia?materia=algebra&limit=20&offset=0
//https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/buscar?nombre=Juan&apellido_materno=Lopez&limit=20&offset=0
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/buscar?clave=MAT101&nombre=Alg
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/grupos?busqueda=FLORES%20CASTILLO
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/maestros/grupos?num_trabajador=12345
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/maestros/grupos?nombre=Juan Perez
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/maestros/grupos?nombre=Juan&correo=juan.perez@correo.unam.mx&limit=10&offset=0
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/grupos?materia=1120
//https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/grupos?materia=algebra
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/grupos?materia=algebra&limit=20&offset=0
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/division?division=DIE&limit=50&offset=0
//https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/semestre?division=Dcb&semestre=1
// https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/grupo-asignatura?clave_asignatura=1121&numero_grupo=16&limit=50&offset=0
//https://www.ingenieria.unam.mx/consultasfi/api/Clases/profesores-por-division-detallado?division=DIE&limit=15&offset=0&orden=apellido


Route::prefix('Clases')->group(function () {
                
    Route::get('/buscarProfesor', [AcademicoController::class, 'buscarProfesores']);
    Route::get('/alumnos/totales-por-materia', [AcademicoController::class, 'alumnosTotalesPorMateria']);
    Route::get('/alumnos/buscar', [AcademicoController::class, 'buscarAlumnos']);
    Route::get('/materias/buscar', [AcademicoController::class, 'buscarMateria']);
    Route::get('/alumnos/grupos', [AcademicoController::class, 'gruposPorAlumno']);
    Route::get('/maestros/grupos', [AcademicoController::class, 'gruposPorMaestro']);
    Route::get('/materias/grupos', [AcademicoController::class, 'gruposPorMateria']);
    Route::get('/materias/division', [AcademicoController::class, 'materiasPorDivision']);
    Route::get('/materias/semestre', [AcademicoController::class, 'materiasPorSemestre']);
    Route::get('/alumnos/grupo-asignatura', [AcademicoController::class, 'obtenerAlumnosPorGrupoAsignatura']);
    Route::get('/profesores-por-division-detallado', [AcademicoController::class, 'profesoresPorDivisionDetallado']);
    Route::get('/profesores-por-division-activos', [AcademicoController::class, 'profesoresPorDivisionActivos']);
   


});
















