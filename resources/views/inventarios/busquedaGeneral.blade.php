@extends('layouts.app')

@section('title', 'Inventarios')

@section('header-title')
    Consulta de inventarios
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Consulta de inventarios</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">Inventarios</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Inventarios</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite consultar la informaci&oacute;n del inventario institucional
                                con soporte de paginaci&oacute;n mediante los par&aacute;metros <strong>limit</strong> y <strong>offset</strong>,
                                optimizando el rendimiento cuando el volumen de datos es grande.
                            </p>
                            <p class="mb-0">
                                La respuesta incluye el total de registros disponibles y los datos correspondientes
                                al bloque solicitado, facilitando la integraci&oacute;n con sistemas administrativos,
                                reportes y plataformas institucionales.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_black" href="https://www.ingenieria.unam.mx/consultasfi/api/Inventarios?limit=50&amp;offset=0">https://www.ingenieria.unam.mx/consultasfi/api/Inventarios?limit=50&amp;offset=0</a>
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
                                        <td>limit</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>N&uacute;mero m&aacute;ximo de registros a devolver.</td>
                                    </tr>
                                    <tr>
                                        <td>offset</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>Desplazamiento de paginaci&oacute;n (desde qu&eacute; registro comenzar).</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Reglas -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127919; Reglas de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Los par&aacute;metros son opcionales.</li>
                                <li>Si no se env&iacute;an, el sistema puede aplicar un l&iacute;mite por defecto.</li>
                                <li><strong>limit</strong> define la cantidad de registros por consulta.</li>
                                <li><strong>offset</strong> define el punto de inicio para la paginaci&oacute;n.</li>
                                <li>La respuesta se entrega en formato JSON estructurado.</li>
                                <li>El c&oacute;digo de respuesta HTTP es 200 (OK).</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de paginaci&oacute;n</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?limit=20&amp;offset=0</code> ? Primera p&aacute;gina</li>
                                <li><code>?limit=20&amp;offset=20</code> ? Segunda p&aacute;gina</li>
                                <li><code>?limit=50&amp;offset=100</code> ? P&aacute;gina avanzada</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Obtener inventarios paginados para sistemas administrativos.</li>
                                <li>Generar reportes de bienes institucionales.</li>
                                <li>Integrar informaci&oacute;n patrimonial con otros microservicios.</li>
                                <li>Consumir datos desde dashboards o aplicaciones externas.</li>
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
                        <strong>JavaScript nativo (Fetch API)</strong> con soporte de paginaci&oacute;n.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('busquedaGeneralDemo') }}" class="btn btn-primary">
                            Ir al demo interactivo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================= -->
    <!-- DESCARGA -->
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
                        de este microservicio con paginaci&oacute;n.
                        Descargue los componentes HTML/CSS/JS para integrarlos en su proyecto.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarInventarioGeneral.rar"
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

