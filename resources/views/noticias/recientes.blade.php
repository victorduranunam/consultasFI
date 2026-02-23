@extends('layouts.app')

@section('title', 'Noticias Recientes de la Facultad de Ingenier&iacute;a')

@section('header-title')
    Noticias Recientes de la Facultad de Ingenier&iacute;a
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Noticias Recientes</h3>
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
                            Consulta de las noticias m&aacute;s recientes generadas por la Coordinaci&oacute;n de Comunicaci&oacute;n de la Facultad de Ingenier&iacute;a.
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Noticias/recientes</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este endpoint devuelve las noticias m&aacute;s recientes de la Facultad de Ingenier&iacute;a.
                            </p>
                            <p class="mb-0">
                                Permite indicar el n&uacute;mero de noticias a devolver mediante el par&aacute;metro 
                                <strong>limit</strong>.  
                                La respuesta se entrega en formato JSON e incluye los campos principales:
                                <strong>id_noticia</strong>, <strong>titulo</strong>, <strong>sintesis</strong>, 
                                <strong>autor</strong>, <strong>fecha_publicacion</strong>,
                                <strong>direccion_foto_principal</strong> y <strong>direccion_mini_foto</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/recientes?limit=5">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Noticias/recientes?limit=5
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
                                        <td>limit</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&uacute;mero de noticias recientes a devolver. Valor por defecto: 10.</td>
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
                                <li>Los resultados se ordenan por <strong>fecha_publicacion</strong> descendente.</li>
                                <li>Solo se devuelven noticias con estado activo.</li>
                                <li>Si no se env&iacute;a el par&aacute;metro <strong>limit</strong>, el sistema devuelve 10 noticias por defecto.</li>
                                <li>En caso de error se devuelve un c&oacute;digo HTTP 500 con el mensaje correspondiente.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?limit=5</code> &rarr; Devuelve 5 noticias recientes.</li>
                                <li><code>?limit=15</code> &rarr; Devuelve 15 noticias recientes.</li>
                                <li>Sin par&aacute;metros &rarr; Devuelve 10 noticias recientes.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Mostrar las noticias m&aacute;s recientes en la p&aacute;gina principal del sitio.</li>
                                <li>Generar un bloque lateral de &uacute;ltimas noticias.</li>
                                <li>Integrar noticias recientes en aplicaciones m&oacute;viles.</li>
                                <li>Consumir contenido actualizado desde sistemas externos.</li>
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
                        <strong>JavaScript (Fetch API)</strong>, enviando el par&aacute;metro <strong>limit</strong> en la URL.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('recientesDemo') }}" class="btn btn-primary">
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
                        la consulta de noticias recientes.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarNoticiasRecientes.rar" 
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
