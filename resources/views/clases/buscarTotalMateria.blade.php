@extends('layouts.app')

@section('title', 'Informacion Escolar')

@section('header-title')
    Totales de alumnos por materia
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
                        <h3 class="mb-2 mb-md-0">&#128202; Microservicio: Totales de alumnos por materia</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">alumnosTotalesPorMateria</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/totales-por-materia</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite consultar el total de alumnos inscritos en una materia,
                                ya sea proporcionando la clave o el nombre de la asignatura.
                            </p>
                            <p class="mb-0">
                                La informaci&oacute;n se obtiene a partir de la funci&oacute;n almacenada
                                <strong>public.alumnos_totales_por_materia(text)</strong> en PostgreSQL,
                                agrupando los resultados por asignatura y orden&aacute;ndolos de mayor a menor
                                seg&uacute;n el total de alumnos inscritos.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/totales-por-materia?materia=algebra&amp;limit=20&amp;offset=0
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
                                        <td>materia</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Clave o nombre (completo o parcial) de la materia a consultar</td>
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
                                <li>El par&aacute;metro <strong>materia</strong> es obligatorio.</li>
                                <li>La b&uacute;squeda se realiza con coincidencias parciales utilizando <strong>ILIKE</strong>.</li>
                                <li>Los resultados se agrupan por asignatura.</li>
                                <li>El orden se realiza de mayor a menor seg&uacute;n el total de alumnos.</li>
                                <li>Si no se env&iacute;a el par&aacute;metro obligatorio, el servicio devuelve un error 400.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Conocer cu&aacute;les materias tienen mayor demanda de alumnos.</li>
                                <li>Obtener estad&iacute;sticas acad&eacute;micas para coordinaciones.</li>
                                <li>Integrar informaci&oacute;n en dashboards institucionales.</li>
                                <li>Apoyar procesos de planeaci&oacute;n acad&eacute;mica.</li>
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
                        <a href="{{ route('buscarTotalMateria') }}" class="btn btn-primary">
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
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarTotalMateria.rar"
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
