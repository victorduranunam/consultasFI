@extends('layouts.app')

@section('title', 'Informacion Escolar')

@section('header-title')
    Buscar materias
@endsection

@section('content')
<div class="container-fluid">

    <!-- ============================= -->
    <!-- BLOQUE PRINCIPAL DOCUMENTACIÓN -->
    <!-- ============================= -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <!-- Header -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Consulta de materias</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">buscarMateria</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Clases/buscarMateria</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                          <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite consultar informaci&oacute;n de las materias disponibles en el sistema acad&eacute;mico,
                                filtrando por clave o por nombre de la materia.
                            </p>
                            <p class="mb-0">
                                Puede integrarse con otros microservicios de la API institucional para obtener informaci&oacute;n complementaria,
                                como los grupos asignados a cada materia.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
https://www.ingenieria.unam.mx/consultasfi/api/Clases/buscarMateria?clave=MAT101&amp;nombre=&Aacute;lgebra&amp;limit=50&amp;offset=0
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
                                        <th>Par&aacute;metro</th>
                                        <th>Tipo</th>
                                        <th>Obligatorio</th>
                                        <th>Descripci&oacute;n</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>clave</td><td>string</td><td>No</td><td>Clave de la materia</td></tr>
                                    <tr><td>nombre</td><td>string</td><td>No</td><td>Nombre completo o parcial</td></tr>
                                    <tr><td>limit</td><td>int</td><td>No</td><td>L&iacute;mite de registros</td></tr>
                                    <tr><td>offset</td><td>int</td><td>No</td><td>Desplazamiento de paginaci&oacute;n</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Reglas -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127919; Reglas de b&uacute;squeda</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Se puede usar uno o ambos par&aacute;metros.</li>
                                <li>Si se env&iacute;a <strong>clave</strong>, tiene prioridad.</li>
                                <li>La b&uacute;squeda por nombre permite coincidencias parciales.</li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    
                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Consultar una materia espec&iacute;fica mediante su clave.</li>
                                <li>Buscar materias por nombre completo o parcial.</li>
                                <li>Obtener un listado paginado de materias disponibles.</li>
                                <li>Integrar la informaci&oacute;n con otros microservicios acad&eacute;micos.</li>
                            </ul>
                        </div>
                    </div>


                   
                    
                    

                </div>
            </div>
        </div>
    </div>

    <!-- ============================= -->
    <!-- USO EN FRONTEND -->
    <!-- ============================= -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Uso del microservicio en Frontend</h4>
                        <span class="badge bg-success">Ejemplo</span>
                    </div>

                    <p>
                        Este ejemplo muestra c&oacute;mo consumir el microservicio desde un frontend utilizando
                        <strong>JavaScript nativo (Fetch API)</strong>.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('buscarMateriaDemo') }}" class="btn btn-primary">
                            Ir al demo interactivo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================= -->
    <!-- DESCARGA DE ARCHIVOS -->
    <!-- ============================= -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Descarga de los archivos</h4>
                        <span class="badge bg-success">Descarga</span>
                    </div>

                    <p>
                        Ponemos a su disposici&oacute;n los archivos fuente para facilitar la implementaci&oacute;n de este microservicio.
                        Solo descargue los componentes HTML/CSS/JS para que pueda a&ntilde;adirlos a su proyecto.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarMateria.rar"
                           class="btn btn-primary" target="_blank">
                            Descargar ejemplo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
