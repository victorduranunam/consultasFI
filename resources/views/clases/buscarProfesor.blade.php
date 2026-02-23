@extends('layouts.app')

@section('title', 'Informacion Escolar')

@section('header-title')
    Buscar profesores activos
@endsection

@section('content')
<div class="container-fluid">

   

    <!-- Contenido din�mico -->
    <div class="row">
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h3 class="mb-2 mb-md-0"> &#128196;  Microservicio: Consulta de estado académico del profesor</h3>
                <div>
                    <span class="badge bg-primary">GET</span>
                    <span class="badge bg-secondary">API REST</span>
                    <span class="badge bg-info text-dark">Microservicio</span>
                </div>
            </div>

            <!-- Nombre -->
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">&#128105;&#8205;&#128187;  Nombre del servicio</div>
                <div class="col-md-9">buscarProfesor</div>
            </div>

            <!-- Endpoint -->
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">&#128205; Endpoint</div>
                <div class="col-md-9">
                    <code>https://www.ingenieria.unam.mx/consultasfi/api/Clases/buscarProfesor</code>
                </div>
            </div>

            <!-- Descripción -->
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                <div class="col-md-9">
                    <p class="mb-2">
                        Este microservicio permite consultar el estado actual de un profesor, indicando si se encuentra
                        impartiendo clases durante el semestre vigente. Apoya la gestión académica y la toma de decisiones
                        operativas por parte de coordinadores y personal académico-administrativo.
                    </p>
                    <p class="mb-0">
                        Puede integrarse con otros microservicios de la API institucional para obtener información
                        complementaria, como las asignaturas y grupos que imparte el docente.
                    </p>
                </div>
            </div>

            <!-- URL -->
            <div class="row mb-3">
               <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                <div class="col-md-9">
                    <div class="bg-light p-2 rounded small text-break">
https://www.ingenieria.unam.mx/consultasfi/api/Clases/buscarProfesor?nombre=JUAN&ape_paterno=PEREZ&ape_materno=LOPEZ&correo_personal=juan.perez@unam.mx&num_trabajador=12345&limit=50&offset=0
                    </div>
                </div>
            </div>

            <!-- Parámetros -->
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">&#128451; Par&aacute;metros</div>
                <div class="col-md-9 table-responsive">
                    <table class="table table-bordered table-sm align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Parámetro</th>
                                <th>Tipo</th>
                                <th>Obligatorio</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>nombre</td><td>string</td><td>No</td><td>Nombre del profesor</td></tr>
                            <tr><td>ape_paterno</td><td>string</td><td>No</td><td>Apellido paterno</td></tr>
                            <tr><td>ape_materno</td><td>string</td><td>No</td><td>Apellido materno</td></tr>
                            <tr><td>correo_personal</td><td>string</td><td>No</td><td>Correo personal</td></tr>
                            <tr><td>num_trabajador</td><td>string</td><td>No</td><td>Número de trabajador</td></tr>
                            <tr><td>limit</td><td>int</td><td>No</td><td>Límite de registros</td></tr>
                            <tr><td>offset</td><td>int</td><td>No</td><td>Desplazamiento de paginación</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Reglas -->
            <div class="row mb-3">
                 <div class="col-md-3 fw-bold">&#127919; Reglas de b&uacute;squeda</div>
                <div class="col-md-9">
                    <ul class="mb-0">
                        <li>Se pueden usar uno o varios parámetros de forma combinada.</li>
                        <li><strong>Nombre completo:</strong> nombre + ape_paterno + ape_materno.</li>
                        <li><strong>Búsqueda directa:</strong> <code>num_trabajador</code>.</li>
                    </ul>
                </div>
            </div>



            <!-- Casos de uso -->
            <div class="row">
                <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                <div class="col-md-9">
                    <ul class="mb-0">
                        <li>Validación de profesores activos.</li>
                        <li>Planeación académica.</li>
                        <li>Asignación de grupos.</li>
                        <li>Control administrativo.</li>
                        <li>Integración con sistemas escolares.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>





<!-- Uso en Frontend -->
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">&#10145; Uso del microservicio en Frontend</h4>
                <span class="badge bg-success">Ejemplo</span>
            </div>

            <p>
                Este ejemplo muestra cómo consumir el microservicio desde un frontend utilizando 
                <strong>JavaScript nativo (Fetch API)</strong>, permitiendo realizar una consulta dinámica
                y procesar la respuesta para su visualización en la interfaz de usuario.
            </p>

           

            <div class="d-flex justify-content-center">
                <a href="{{ route('buscarProfesorDemo') }}" class="btn btn-primary">
                 Ir al demo interactivo
                </a>
            </div>


        </div>
    </div>
</div>



<!-- Uso en Frontend -->
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">&#128187; Descarga de los archivos</h4>
                <span class="badge bg-success">Descarga</span>
            </div>

            <p>
               Ponemos a su disposición los archivos fuente para facilitar la implementación de este microservicio. 
               Solo descargue los componentes HTML/CSS/JS para que pueda añ&aacute;dirlos a su proyecto.
            </p>

           


            <div class="d-flex justify-content-center">
                
                <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarProfesor.rar" class="btn btn-primary" target="_blank">
                        Descargar ejemplo
                </a>
            </div>



        </div>
    </div>
</div>

    </div>

</div>
@endsection
