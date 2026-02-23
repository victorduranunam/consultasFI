@extends('layouts.app')

@section('title', 'Clases')

@section('header-title')
    Informacion Academica
@endsection

@section('content')
<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h3>Consultas Acad&eacute;micas</h3>
            <p class="text-muted">Selecciona el tipo de consulta</p>
        </div>
    </div>

    <div class="row g-3">

        <!-- Buscar profesor -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarProfesor') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">  </div>
                        <h5 class="mt-2">Buscar profesor</h5>
                        <p class="text-muted">Consulta por nombre</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>


          <!-- Buscar alumnos -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarAlumno') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Buscar alumnos</h5>
                        <p class="text-muted">Consulta acad&eacute;mica</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>



        <!-- Buscar materia -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarMateria') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Buscar materia</h5>
                        <p class="text-muted">Por nombre o clave</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>
        


        <!-- Grupos por maestro -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarGrupoProfesor') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Grupos por profesor</h5>
                        <p class="text-muted">Asignaciones docentes</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>



        <!-- Grupos por alumno -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarGrupoAlumno') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Grupos por alumno</h5>
                        <p class="text-muted">Carga acad&eacute;mica</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>



        <!-- Grupos por materia -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarGrupoMateria') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Grupos por materia</h5>
                        <p class="text-muted">Oferta acad&eacute;mica</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Materias por divisi�n -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarMateriaDivision') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Materias por divisi&oacute;n</h5>
                        <p class="text-muted">Filtro institucional</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>



        <!-- Totales de alumnos por materia -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarTotalMateria') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Totales por materia</h5>
                        <p class="text-muted">Cantidad de alumnos</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

      

        <!-- Materias por semestre -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarMateriaSemestre') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Materias por semestre</h5>
                        <p class="text-muted">Organizaci&oacute;n acad&eacute;mica</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Alumnos por grupo-asignatura -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarAlumnoGrupo') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Alumnos por grupo</h5>
                        <p class="text-muted">Grupo y asignatura</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Profesores por divisi�n detallado -->
        <div class="col-md-4">
            <a href="{{ url('/clases/buscarProfesorDivision') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Profesores por divisi&oacute;n</h5>
                        <p class="text-muted">Vista detallada</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection
