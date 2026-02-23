@extends('layouts.app')

@section('title', 'Estadisticas por Laboratorio de Inventarios')

@section('header-title')
    Estad&iacute;sticas de inventarios por laboratorio
@endsection

@section('content')
<div class="container-fluid">

    <!-- BLOQUE PRINCIPAL DOCUMENTACIÓN -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <!-- Header -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Estad&iacute;sticas por laboratorio</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">
                            Estad&iacute;sticas de inventarios filtradas por laboratorio
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>
                                https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas/laboratorio
                            </code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este endpoint devuelve las estad&iacute;sticas del inventario
                                agrupadas por <strong>laboratorio</strong>.
                            </p>
                            <p class="mb-0">
                                La respuesta se entrega en formato JSON,
                                ordenada por el total descendente de registros
                                y con soporte de paginaci&oacute;n.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank"
                                   href="https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas/laboratorio?laboratorio=LAB01&amp;page=1&amp;per_page=20">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas/laboratorio?laboratorio=LAB01&amp;page=1&amp;per_page=20
                                </a>
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
                                        <td>laboratorio</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>
                                            Clave o nombre del laboratorio para filtrar
                                            las estad&iacute;sticas.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>
                                            N&uacute;mero de p&aacute;gina.
                                            Valor por defecto: 1.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>per_page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>
                                            Cantidad de registros por p&aacute;gina.
                                            Valor por defecto: 20.
                                        </td>
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
                                <li>El par&aacute;metro <strong>laboratorio</strong> es obligatorio.</li>
                                <li>Los resultados se ordenan por <strong>total</strong> descendente.</li>
                                <li>La respuesta incluye metadatos de paginaci&oacute;n.</li>
                                <li>En caso de error se devuelve un c&oacute;digo HTTP 500.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>
                                    <code>?laboratorio=LAB01&amp;page=1</code>
                                    &rarr; Estad&iacute;sticas del laboratorio LAB01, primera p&aacute;gina.
                                </li>
                                <li>
                                    <code>?laboratorio=LAB02&amp;per_page=30</code>
                                    &rarr; Estad&iacute;sticas del laboratorio LAB02 con 30 registros.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Generaci&oacute;n de reportes por laboratorio.</li>
                                <li>An&aacute;lisis de distribuci&oacute;n de bienes en espacios f&iacute;sicos.</li>
                                <li>Apoyo en auditor&iacute;as internas.</li>
                                <li>Comparaci&oacute;n de inventario entre laboratorios.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- USO EN FRONTEND -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Uso del microservicio en Frontend</h4>
                        <span class="badge bg-success">Ejemplo</span>
                    </div>

                    <p>
                        El siguiente bot&oacute;n dirige al demo interactivo
                        donde se realiza la consulta mediante
                        <strong>Fetch API</strong>.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('busquedaEstadisticasLaboratorioDemo') }}"
                           class="btn btn-primary">
                            Ir al demo interactivo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- DESCARGA -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Descarga de archivos base</h4>
                        <span class="badge bg-success">Descarga</span>
                    </div>

                    <p>
                        Archivos HTML, CSS y JavaScript
                        para implementar el consumo del microservicio.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/BusquedaEstadisticasLaboratorio.rar"
                           class="btn btn-primary"
                           target="_blank">
                            Descargar ejemplo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
