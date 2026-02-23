@extends('layouts.app')

@section('title', 'Noticias por Dependencia - Carrusel de la Facultad de Ingenier&iacute;a')

@section('header-title')
    Noticias por Dependencia - Carrusel
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Noticias por Dependencia (Carrusel)</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre del servicio -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">
                            Consulta de noticias filtradas por dependencia o &aacute;rea de la Facultad de Ingenier&iacute;a, presentadas en un <strong>carrusel visual</strong> mostrando t&iacute;tulo, imagen principal y fecha.
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Noticias/dependencia</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este endpoint devuelve noticias filtradas por dependencia o &aacute;rea de la Facultad de Ingenier&iacute;a. 
                                Los resultados se presentan en un <strong>carrusel de fotos</strong> mediante un widget que muestra el t&iacute;tulo de la noticia, la imagen principal y la fecha de publicaci&oacute;n.
                            </p>
                            <p class="mb-0">
                                Esta es una <strong>forma alternativa</strong> de mostrar la informaci&oacute;n comparado con los listados tradicionales. 
                                Los usuarios pueden elegir entre visualizar las noticias en forma de listado o mediante un carrusel interactivo, seg&uacute;n sus necesidades.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/dependencia?dependencia=DIE&limit=5&offset=0">
                                    https://www.ingenieria.unam.mx/consultasfi/api/Noticias/dependencia?dependencia=DIE&limit=5&offset=0
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
                                        <td>Nombre corto de la dependencia (Ejemplo: DIE).</td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&uacute;mero de noticias a devolver. Valor por defecto: 10.</td>
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
                                <li>Los resultados se ordenan por <strong>fecha_publicacion</strong> descendente.</li>
                                <li>Solo se devuelven noticias con estado activo.</li>
                                <li>Si no se env&iacute;a el par&aacute;metro <strong>limit</strong>, se devuelven 10 noticias por defecto.</li>
                                <li>El par&aacute;metro <strong>offset</strong> permite navegar entre registros.</li>
                                <li>El usuario debe proporcionar la <strong>ruta exacta del endpoint</strong> al invocar el widget en su sitio.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?dependencia=DIE&amp;limit=5&amp;offset=0</code> &rarr; Devuelve 5 noticias de la dependencia DIMEI desde el inicio.</li>
                                <li><code>?dependencia=DEPI&amp;limit=10&amp;offset=10</code> &rarr; Devuelve 10 noticias de la dependencia DEPI comenzando desde el registro 11.</li>
                                <li>Sin par&aacute;metros opcionales &rarr; Devuelve 10 noticias por defecto desde el inicio.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Mostrar noticias recientes de una dependencia espec&iacute;fica en la p&aacute;gina principal de la facultad.</li>
                                <li>Permitir que sitios de la facultad tengan un bloque de noticias filtrado por &aacute;rea.</li>
                                <li>Integrar noticias de dependencia en aplicaciones externas de forma visual y din&aacute;mica.</li>
                                <li>Proporcionar un carrusel de noticias actualizado autom&aacute;ticamente mediante el microservicio.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- BLOQUE IMPLEMENTACIÓN / DEMO -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Implementaci&oacute;n / Demo</h4>
                        <span class="badge bg-success">Ejemplo</span>
                    </div>

                    <p>
                        Para ver el carrusel funcionando, los usuarios pueden acceder a un demo interactivo en otra p&aacute;gina de ejemplo:
                    </p>
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('dependenciaCarruselDemo') }}" class="btn btn-primary">
                            Ver demo del carrusel
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- BLOQUE DESCARGA / USO DIRECTO -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Descarga / Uso directo</h4>
                        <span class="badge bg-success">Descarga</span>
                    </div>

                    <p>
                        Para usar el carrusel, el usuario debe copiar el siguiente bloque HTML en la p&aacute;gina donde desee mostrar el widget y reemplazar <code>data-endpoint</code> con la ruta exacta del microservicio:
                    </p>
                    <pre class="bg-light p-3 rounded">
&lt;div id="widget-noticias" 
     data-endpoint="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/dependencia?dependencia=DIE&amp;limit=10"&gt;&lt;/div&gt;
&lt;script src="https://www.ingenieria.unam.mx/consultasfi/widgets/widget-noticias.js"&gt;&lt;/script&gt;
                    </pre>
                    <p>
                        Este c&oacute;digo se ingresa directamente en la p&aacute;gina web donde se desee mostrar el carrusel, y se cargar&aacute;n autom&aacute;ticamente las noticias con im&aacute;genes, t&iacute;tulos y fechas.
                    </p>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection