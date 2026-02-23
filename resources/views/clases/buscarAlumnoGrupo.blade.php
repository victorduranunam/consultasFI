@extends('layouts.app')

@section('title', 'Informacion Escolar')

@section('header-title')
    Alumnos por grupo y asignatura
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Consulta de alumnos por grupo y asignatura</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">obtenerAlumnosPorGrupoAsignatura</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>
https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/grupo-asignatura
                            </code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite consultar el listado de alumnos inscritos en un grupo
                                espec&iacute;fico de una asignatura determinada.
                            </p>
                            <p class="mb-0">
                                Devuelve informaci&oacute;n acad&eacute;mica b&aacute;sica del alumno como n&uacute;mero de cuenta,
                                nombre completo y correo personal, permitiendo su integraci&oacute;n con otros
                                microservicios institucionales.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/grupo-asignatura?clave_asignatura=1121&amp;numero_grupo=16&amp;limit=50&amp;offset=0
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
                                        <td>clave_asignatura</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Clave num&eacute;rica de la asignatura</td>
                                    </tr>
                                    <tr>
                                        <td>numero_grupo</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>N&uacute;mero de grupo asociado a la asignatura</td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>L&iacute;mite de registros a devolver (por defecto 50)</td>
                                    </tr>
                                    <tr>
                                        <td>offset</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>Desplazamiento para paginaci&oacute;n</td>
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
                                <li>Los par&aacute;metros <strong>clave_asignatura</strong> y <strong>numero_grupo</strong> son obligatorios.</li>
                                <li>Si alguno no se proporciona, el servicio devuelve un error HTTP 400.</li>
                                <li>La respuesta incluye informaci&oacute;n de paginaci&oacute;n: total, limit, offset y count.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Consultar la lista oficial de alumnos inscritos en un grupo.</li>
                                <li>Generar reportes acad&eacute;micos por asignatura.</li>
                                <li>Integrar datos en plataformas de seguimiento escolar.</li>
                                <li>Validar inscripciones dentro de sistemas administrativos.</li>
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
                        <a href="{{ route('buscarAlumnoGrupoDemo') }}" class="btn btn-primary">
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
                        Ponemos a su disposici&oacute;n los archivos fuente para facilitar la implementaci&oacute;n
                        de este microservicio. Solo descargue los componentes HTML/CSS/JS para que pueda
                        a&ntilde;adirlos a su proyecto.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarAlumnoGrupo.rar"
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
