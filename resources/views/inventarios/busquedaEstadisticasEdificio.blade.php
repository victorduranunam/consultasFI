@extends('layouts.app')

@section('title', 'Inventarios por Edificio')

@section('header-title')
    Inventarios por edificio
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Inventarios por edificio</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">Inventarios filtrados por edificio</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/edificio</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este endpoint devuelve los registros del inventario filtrados por
                                <strong>edificio</strong> seg&uacute;n la letra especificada en los par&aacute;metros de consulta.
                            </p>
                            <p class="mb-0">
                                La respuesta se entrega en formato JSON con paginaci&oacute;n e incluye
                                informaci&oacute;n detallada del bien, responsable y ubicaci&oacute;n administrativa.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/edificio?letra=O&amp;page=1&amp;per_page=20">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/edificio?letra=O&amp;page=1&amp;per_page=20
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
                                        <td>letra</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Letra identificadora del edificio (por ejemplo: O, A, B, etc.).</td>
                                    </tr>
                                    <tr>
                                        <td>page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&uacute;mero de p&aacute;gina para paginaci&oacute;n. Por defecto: 1.</td>
                                    </tr>
                                    <tr>
                                        <td>per_page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&uacute;mero de registros por p&aacute;gina. Por defecto: 20.</td>
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
                                <li>El par&aacute;metro <strong>letra</strong> es obligatorio.</li>
                                <li>La respuesta est&aacute; paginada con <strong>page</strong> y <strong>per_page</strong>.</li>
                                <li>Los resultados incluyen informaci&oacute;n del bien, responsable y ubicaci&oacute;n.</li>
                                <li>En caso de error se devuelve un c&oacute;digo HTTP 500 con el mensaje correspondiente.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?letra=O&amp;page=1</code> &rarr; Inventarios del edificio O en la p&aacute;gina 1.</li>
                                <li><code>?letra=A&amp;per_page=30</code> &rarr; 30 registros del edificio A.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Consultar bienes asignados a un edificio espec&iacute;fico.</li>
                                <li>Generar reportes administrativos por edificio.</li>
                                <li>Localizar responsables y ubicaciones f&iacute;sicas de los bienes.</li>
                                <li>Integrar informaci&oacute;n de inventarios en sistemas externos.</li>
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
                        Este ejemplo muestra c&oacute;mo consumir el microservicio desde un frontend utilizando
                        <strong>JavaScript (Fetch API)</strong>, enviando los par&aacute;metros <strong>letra</strong>,
                        <strong>page</strong> y <strong>per_page</strong> en la URL.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('busquedaEstadisticasEdificioDemo') }}" class="btn btn-primary">
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
                        <h4 class="mb-0">Descarga de los archivos</h4>
                        <span class="badge bg-success">Descarga</span>
                    </div>

                    <p>
                        Se ponen a su disposici&oacute;n los archivos base para implementar
                        la consulta de inventarios por edificio.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/busquedaInventariosEdificio.rar" class="btn btn-primary" target="_blank">
                            Descargar ejemplo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection