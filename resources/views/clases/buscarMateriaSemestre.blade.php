@extends('layouts.app')

@section('title', 'Informacion Escolar')

@section('header-title')
    Materias por semestre
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Consulta de materias por semestre</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">materiasPorSemestre</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/semestre</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite consultar las materias correspondientes a un semestre espec&iacute;fico
                                dentro de una divisi&oacute;n acad&eacute;mica determinada.
                            </p>
                            <p class="mb-0">
                                La consulta se realiza a partir del nombre o alias de la divisi&oacute;n y el n&uacute;mero de semestre.
                                El resultado incluye informaci&oacute;n detallada de cada asignatura, permitiendo paginaci&oacute;n mediante
                                los par&aacute;metros <strong>limit</strong> y <strong>offset</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/semestre?division=Dcb&amp;semestre=1&amp;limit=50&amp;offset=0
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
                                    <tr>
                                        <td>division</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Nombre o alias de la divisi&oacute;n acad&eacute;mica</td>
                                    </tr>
                                    <tr>
                                        <td>semestre</td>
                                        <td>int</td>
                                        <td>S&iacute;</td>
                                        <td>N&uacute;mero de semestre a consultar</td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>L&iacute;mite de registros a retornar (por defecto 50)</td>
                                    </tr>
                                    <tr>
                                        <td>offset</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>Desplazamiento para paginaci&oacute;n (por defecto 0)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Reglas -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127919; Reglas de b&uacute;squeda</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Los par&aacute;metros <strong>division</strong> y <strong>semestre</strong> son obligatorios.</li>
                                <li>La b&uacute;squeda por divisi&oacute;n permite coincidencias parciales (ILIKE).</li>
                                <li>El semestre se calcula a partir de la clave de la asignatura.</li>
                                <li>Los resultados se ordenan alfab&eacute;ticamente por nombre de la asignatura.</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Consultar materias de una divisi&oacute;n espec&iacute;fica en determinado semestre.</li>
                                <li>Obtener el listado de asignaturas para generar horarios.</li>
                                <li>Integrar la informaci&oacute;n en sistemas de planeaci&oacute;n acad&eacute;mica.</li>
                                <li>Construir interfaces din&aacute;micas para consulta estudiantil.</li>
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
                        <a href="{{ route('buscarMateriaSemestreDemo') }}" class="btn btn-primary">
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
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarMateriaSemestre.rar"
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
