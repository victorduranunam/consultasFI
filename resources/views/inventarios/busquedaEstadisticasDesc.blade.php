@extends('layouts.app')

@section('title', 'Estad&iacute;sticas de Inventarios')

@section('header-title')
    Estad&iacute;sticas de inventarios por tipo de equipo (descripci&oacute;n)
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Estad&iacute;sticas de inventarios por tipo de equipo</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9"> Estad&iacute;sticas por tipo de equipo (descripci&oacute;n) </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas-bn-desc</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite obtener las <strong>estad&iacute;sticas de inventario</strong> agrupadas
                                por descripci&oacute;n de los bienes (<strong>bn_desc</strong>), incluyendo el total de registros
                                por cada descripci&oacute;n.
                            </p>
                            <p class="mb-0">
                                La respuesta se entrega en formato JSON e incluye informaci&oacute;n de paginaci&oacute;n mediante
                                los par&aacute;metros <strong>page</strong> y <strong>per_page</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas-bn-desc?per_page=50&page=2">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas-bn-desc?per_page=50&page=2
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
                                        <td>page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>P&aacute;gina actual de resultados. Valor por defecto: 1.</td>
                                    </tr>
                                    <tr>
                                        <td>per_page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&uacute;mero de registros por p&aacute;gina. Valor por defecto: 20.</td>
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
                                <li>Si no se env&iacute;an par&aacute;metros, se utilizan los valores por defecto <strong>page=1</strong> y <strong>per_page=20</strong>.</li>
                                <li>La respuesta incluye <strong>data</strong> con los resultados, <strong>page</strong>, <strong>per_page</strong> y <strong>count</strong>.</li>
                                <li>Los resultados est&aacute;n ordenados por el total de registros en forma descendente.</li>
                                <li>En caso de error, se devuelve c&oacute;digo HTTP 500 con detalle del mensaje.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?per_page=10&amp;page=1</code> &rarr; Obtiene los primeros 10 registros ordenados por total.</li>
                                <li><code>?per_page=50&amp;page=2</code> &rarr; Obtiene la segunda p&aacute;gina con 50 registros por p&aacute;gina.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Analizar qu&eacute; descripci&oacute;n de bien es la m&aacute;s frecuente en el inventario.</li>
                                <li>Generar reportes y dashboards de inventario por descripci&oacute;n.</li>
                                <li>Filtrar y exportar estad&iacute;sticas para auditor&iacute;as internas.</li>
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
                        Este ejemplo muestra c&oacute;mo consumir el microservicio desde un frontend utilizando <strong>JavaScript (Fetch API)</strong>,
                        enviando los par&aacute;metros <strong>page</strong> y <strong>per_page</strong> en la URL.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('busquedaEstadisticasDescDemo') }}" class="btn btn-primary">
                            Ir al demo interactivo
                        </a>
                    </div>

                    <p class="mt-3">
                        Nota: Aseg&uacute;rese de que la URL sea HTTPS para evitar bloqueos por contenido mixto.
                    </p>

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
                        <h4 class="mb-0">Descarga de los archivos</h4>
                        <span class="badge bg-success">Descarga</span>
                    </div>

                    <p>
                        Se ponen a su disposici&oacute;n los archivos base para implementar
                        la visualizaci&oacute;n de las estad&iacute;sticas de inventario.
                        Descargue los componentes HTML/CSS/JS para integrarlos en su proyecto.
                    </p>

                     <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/busquedaEstadisticasDesc.rar"
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
