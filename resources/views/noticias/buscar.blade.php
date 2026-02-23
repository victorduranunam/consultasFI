@extends('layouts.app')

@section('title', 'B&uacute;squeda Avanzada de Noticias de la Facultad de Ingenier&iacute;a')

@section('header-title')
    B&uacute;squeda Avanzada de Noticias de la Facultad de Ingenier&iacute;a
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: B&uacute;squeda Avanzada de Noticias</h3>
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
                            Consulta avanzada de noticias mediante m&uacute;ltiples criterios de filtrado 
                            como t&iacute;tulo, s&iacute;ntesis, contenido, autor, fot&oacute;grafo, 
                            fecha de publicaci&oacute;n o identificador de noticia.
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Noticias/buscar</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este endpoint permite realizar una b&uacute;squeda avanzada sobre la tabla 
                                <strong>noticias_sitio_swcc</strong>.
                            </p>
                            <p class="mb-2">
                                A diferencia de la b&uacute;squeda simple por palabra clave, este servicio 
                                acepta m&uacute;ltiples par&aacute;metros opcionales que pueden combinarse 
                                din&aacute;micamente.
                            </p>
                            <p class="mb-0">
                                Solo se devuelven noticias con <strong>estado_activo = 1</strong> y los resultados 
                                se ordenan por <strong>fecha_publicacion</strong> en orden descendente.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/buscar?titulo=ingenieria&amp;autor=Rosalba">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Noticias/buscar?titulo=ingenieria&amp;autor=Rosalba
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
                                        <td>titulo</td>
                                        <td>string</td>
                                        <td>No</td>
                                        <td>Busca coincidencia parcial en el t&iacute;tulo.</td>
                                    </tr>
                                    <tr>
                                        <td>sintesis</td>
                                        <td>string</td>
                                        <td>No</td>
                                        <td>Busca coincidencia parcial en la s&iacute;ntesis.</td>
                                    </tr>
                                    <tr>
                                        <td>contenido</td>
                                        <td>string</td>
                                        <td>No</td>
                                        <td>Busca dentro del contenido completo de la noticia.</td>
                                    </tr>
                                    <tr>
                                        <td>fecha_publicacion</td>
                                        <td>date</td>
                                        <td>No</td>
                                        <td>Filtra por fecha exacta (YYYY-MM-DD).</td>
                                    </tr>
                                    <tr>
                                        <td>id_noticia</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>Filtra por identificador &uacute;nico.</td>
                                    </tr>
                                    <tr>
                                        <td>autor</td>
                                        <td>string</td>
                                        <td>No</td>
                                        <td>Filtra por nombre del autor.</td>
                                    </tr>
                                    <tr>
                                        <td>fotografo</td>
                                        <td>string</td>
                                        <td>No</td>
                                        <td>Filtra por nombre del fot&oacute;grafo.</td>
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
                                <li>Todos los par&aacute;metros son opcionales.</li>
                                <li>Si se env&iacute;an varios filtros, se aplican de manera acumulativa (AND).</li>
                                <li>Los resultados se ordenan por fecha descendente.</li>
                                <li>Solo se devuelven registros activos.</li>
                                <li>En caso de error se devuelve c&oacute;digo HTTP 500.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?autor=Rosalba</code> &rarr; Noticias donde aparezca Rosalba como autora.</li>
                                <li><code>?titulo=ingenieria</code> &rarr; Noticias cuyo t&iacute;tulo contenga la palabra ingenier&iacute;a.</li>
                                <li><code>?fecha_publicacion=2023-09-11</code> &rarr; Noticias publicadas en esa fecha.</li>
                                <li><code>?autor=Rosalba&amp;titulo=libro</code> &rarr; Filtros combinados.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Implementar buscador interno del sitio.</li>
                                <li>Integrar resultados filtrados en portales externos.</li>
                                <li>Generar listados personalizados por autor.</li>
                                <li>Construir paneles administrativos de consulta.</li>
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
                        Este ejemplo muestra c&oacute;mo consumir el microservicio utilizando 
                        <strong>JavaScript (Fetch API)</strong> enviando los par&aacute;metros 
                        desde un formulario HTML.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('buscarDemo') }}" class="btn btn-primary">
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
                        Se ponen a su disposici&oacute;n los archivos base:
                        <strong>index.html</strong>, <strong>script.js</strong> y <strong>style.css</strong>
                        para integrar la b&uacute;squeda avanzada en cualquier proyecto web.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/NoticiasBuscar.rar" 
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