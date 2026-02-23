@extends('layouts.app')

@section('title', 'Noticias por Persona')

@section('header-title')
    Noticias por Persona
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Noticias por Persona</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">
                            Consulta de noticias donde una persona aparece mencionada.
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Noticias/persona</code>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank"
                                   href="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/persona?persona=rosalba&limit=2&offset=0">
                                   https://www.ingenieria.unam.mx/consultasfi/api/Noticias/persona?persona=rosalba&limit=2&offset=0
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Parámetros -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128451; Par&aacute;metros</div>
                        <div class="col-md-9 table-responsive">
                            <table class="table table-bordered table-sm">
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
                                        <td>persona</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Nombre o parte del nombre de la persona a buscar.</td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&uacute;mero de registros a devolver.</td>
                                    </tr>
                                    <tr>
                                        <td>offset</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>Desplazamiento de registros para paginaci&oacute;n.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul>
                                <li>Integrar noticias en p&aacute;ginas personales de acad&eacute;micos.</li>
                                <li>Mostrar producci&oacute;n institucional de profesores.</li>
                                <li>Generar portafolios autom&aacute;ticos de apariciones en medios institucionales.</li>
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
                <div class="card-body text-center">
                    <h4>Uso del microservicio en Frontend</h4>
                    <a href="{{ route('personaDemo') }}" class="btn btn-primary">
                        Ir al demo interactivo
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- DESCARGA -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h4>Descarga de los archivos</h4>
                    <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/NoticiasPersona.rar"
                       class="btn btn-primary"
                       target="_blank">
                        Descargar ejemplo
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection