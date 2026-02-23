@extends('layouts.app')

@section('title', 'Informaci&#243;n de Recursos por Sal&#243;n')

@section('header-title')
    Informaci&#243;n de recursos por sal&#243;n
@endsection

@section('content')
<div class="container-fluid">

    <!-- BLOQUE PRINCIPAL DOCUMENTACI&#211;N -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <!-- Header -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Informaci&#243;n de Recursos por Sal&#243;n</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">Devuelve todos los recursos asociados a un sal&#243;n determinado.</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Salones/info</code>
                        </div>
                    </div>

                    <!-- Descripci&#243;n -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&#243;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este endpoint devuelve un <strong>listado de recursos</strong> asociados a un sal&#243;n especificado por su nombre.
                            </p>
                            <p class="mb-0">
                                La respuesta se entrega en formato JSON incluyendo detalles del sal&#243;n y de cada recurso.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Salones/info?nombre_salon=J-101">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Salones/info?nombre_salon=J-101
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Par&#225;metros -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128451; Par&#225;metros</div>
                        <div class="col-md-9 table-responsive">
                            <table class="table table-bordered table-sm align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Par&#225;metro</th>
                                        <th>Tipo</th>
                                        <th>Obligatorio</th>
                                        <th>Descripci&#243;n</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>nombre_salon</td>
                                        <td>string</td>
                                        <td>S&#237;</td>
                                        <td>Nombre del sal&#243;n del cual se desean obtener los recursos.</td>
                                    </tr>
                                    <tr>
                                        <td>page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&#250;mero de p&#225;gina para paginaci&#243;n. Por defecto: 1.</td>
                                    </tr>
                                    <tr>
                                        <td>per_page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&#250;mero de registros por p&#225;gina. Por defecto: 20.</td>
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
                                <li>El par&#225;metro <strong>nombre_salon</strong> es obligatorio.</li>
                                <li>La respuesta est&#225; paginada con <strong>page</strong> y <strong>per_page</strong>.</li>
                                <li>Devuelve detalles de cada recurso (nombre, cantidad, tipo de sal&#243;n, edificio, etc.).</li>
                                <li>En caso de error se devuelve un c&#243;digo HTTP 500 con el mensaje de error.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?nombre_salon=J-101</code> &rarr; Devuelve todos los recursos asociados al sal&#243;n J-101.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Mostrar todos los recursos disponibles en un sal&#243;n determinado.</li>
                                <li>Generar reportes de recursos por sal&#243;n.</li>
                                <li>Integrar con sistemas de reserva de salones considerando sus recursos.</li>
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
                        Este ejemplo muestra c&#243;mo consumir el microservicio desde un frontend utilizando
                        <strong>JavaScript (Fetch API)</strong> enviando el par&#225;metro <strong>nombre_salon</strong>.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('buscarInformacionSalonDemo') }}" class="btn btn-primary">
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
                        Se ponen a su disposici&#243;n los archivos base para implementar
                        la consulta de recursos por sal&#243;n en sus proyectos.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarInformacionSalones.rar" class="btn btn-primary" target="_blank">
                            Descargar ejemplo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection