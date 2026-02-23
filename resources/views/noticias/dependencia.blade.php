@extends('layouts.app')

@section('title', 'Noticias por Dependencia o &Aacute;rea')

@section('header-title')
    Noticias por &Aacute;rea
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Noticias por &Aacute;rea</h3>
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
                            Consulta de noticias asociadas a una   &aacute;rea de la Facultad de Ingenier&iacute;a.
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Noticias/dependencia</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            Permite consultar noticias filtradas por &aacute;rea utilizando paginaci&oacute;n
                            mediante los par&aacute;metros <strong>limit</strong> y <strong>offset</strong>.
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank"
                                   href="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/dependencia?dependencia=DIMEI&limit=10&offset=10">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Noticias/dependencia?dependencia=DIMEI&limit=10&offset=10
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
                                        <td>dependencia</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Nombre corto de la dependencia (Ejemplo: DIMEI).</td>
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

                    <!-- Reglas -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127919; Reglas de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Los resultados se ordenan por fecha descendente.</li>
                                <li>Si no se env&iacute;a <strong>limit</strong>, el valor por defecto es 10.</li>
                                <li>El par&aacute;metro <strong>offset</strong> permite avanzar en los registros.</li>
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
                    <a href="{{ route('dependenciaDemo') }}" class="btn btn-primary">
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
                    <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/noticiasArea.rar"
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