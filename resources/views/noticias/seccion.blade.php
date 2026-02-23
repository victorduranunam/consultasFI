@extends('layouts.app')

@section('title', 'Noticias por Secci&oacute;n - Facultad de Ingenier&iacute;a')

@section('header-title')
    Noticias por Secci&oacute;n - Facultad de Ingenier&iacute;a
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Noticias por Secci&oacute;n</h3>
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
                            Consulta paginada de noticias asociadas a una secci&oacute;n
                            de la Coordinaci&oacute;n de Comunicaci&oacute;n de la Facultad de Ingenier&iacute;a.
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Noticias/seccion/{id_seccion}</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este endpoint devuelve las noticias correspondientes a una secci&oacute;n espec&iacute;fica
                                con soporte de paginaci&oacute;n.
                            </p>
                            <p class="mb-2">
                                Las secciones disponibles son:
                                <strong>1) Vida Acad&eacute;mica</strong>,
                                <strong>2) Investigaci&oacute;n y Vinculaci&oacute;n</strong> y
                                <strong>3) Cultura, G&eacute;nero y Deporte</strong>.
                            </p>
                            <p class="mb-0">
                                Permite indicar el n&uacute;mero de p&aacute;gina y la cantidad de registros
                                por p&aacute;gina mediante los par&aacute;metros <strong>page</strong> y
                                <strong>per_page</strong>.
                                La respuesta se entrega en formato JSON e incluye:
                                <strong>id_noticia</strong>, <strong>titulo</strong>, 
                                <strong>sintesis</strong>, <strong>autor</strong>, 
                                <strong>fecha_publicacion</strong>,
                                <strong>direccion_foto_principal</strong>,
                                <strong>direccion_mini_foto</strong>,
                                <strong>pie_imagen</strong>,
                                <strong>id_seccion</strong> y
                                <strong>noticia_principal</strong>.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/seccion/3?page=1&per_page=10">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Noticias/seccion/3?page=1&per_page=10
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
                                        <td>id_seccion</td>
                                        <td>integer</td>
                                        <td>S&iacute;</td>
                                        <td>Identificador de la secci&oacute;n (1, 2 o 3).</td>
                                    </tr>
                                    <tr>
                                        <td>page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&uacute;mero de p&aacute;gina a consultar. Valor por defecto: 1.</td>
                                    </tr>
                                    <tr>
                                        <td>per_page</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>Cantidad de registros por p&aacute;gina. Valor por defecto: 10.</td>
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
                                <li>Si no se env&iacute;a <strong>page</strong>, el sistema devuelve la p&aacute;gina 1.</li>
                                <li>Si no se env&iacute;a <strong>per_page</strong>, el sistema devuelve 10 registros.</li>
                                <li>La respuesta incluye metadatos: <strong>total</strong>, <strong>page</strong> y <strong>last_page</strong>.</li>
                                <li>En caso de error se devuelve un c&oacute;digo HTTP 500 con el mensaje correspondiente.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>/seccion/1?page=1&per_page=5</code> &rarr; Primera p&aacute;gina con 5 noticias.</li>
                                <li><code>/seccion/2?page=2&per_page=10</code> &rarr; Segunda p&aacute;gina con 10 noticias.</li>
                                <li><code>/seccion/3</code> &rarr; Devuelve la primera p&aacute;gina con 10 noticias por defecto.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Mostrar noticias segmentadas por secci&oacute;n con paginaci&oacute;n.</li>
                                <li>Implementar navegaci&oacute;n tipo “Anterior / Siguiente”.</li>
                                <li>Integrar noticias en portales institucionales.</li>
                                <li>Consumir contenido desde aplicaciones externas.</li>
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
                        Este ejemplo muestra c&oacute;mo consumir el microservicio desde un frontend
                        utilizando <strong>JavaScript (Fetch API)</strong>, enviando los par&aacute;metros
                        <strong>page</strong> y <strong>per_page</strong>.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('seccionDemo') }}" class="btn btn-primary">
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
                        la consulta paginada de noticias por secci&oacute;n.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/noticiasSeccion.rar" 
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