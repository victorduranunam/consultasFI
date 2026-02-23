@extends('layouts.app')

@section('title', 'Noticias Recientes - Carrusel de la Facultad de Ingenier&iacute;a')

@section('header-title')
    Noticias Recientes - Carrusel
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Noticias Recientes (Carrusel)</h3>
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
                            Consulta de las noticias m&aacute;s recientes generadas por la Coordinaci&oacute;n de Comunicaci&oacute;n de la Facultad de Ingenier&iacute;a y presentadas en un <strong>carrusel visual</strong>.
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128205; Endpoint</div>
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
                                En esta versi&oacute;n, los resultados se presentan en un <strong>carrusel de fotos</strong> mediante un widget, mostrando t&iacute;tulo, imagen principal y fecha.
                            </p>
                            <p class="mb-0">
                                Esta es una <strong>forma alternativa</strong> de mostrar la informaci&oacute;n. 
                                Los usuarios podr&aacute;n elegir entre el listado tradicional de noticias o el carrusel visual, seg&uacute;n lo que les resulte m&aacute;s conveniente.
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
                                <li>Si no se env&iacute;a el par&aacute;metro <strong>limit</strong>, se devuelven 10 noticias por defecto.</li>
                                <li>El usuario debe proporcionar la <strong>ruta exacta del endpoint</strong> al invocar el widget en su sitio.</li>
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
                                <li>Mostrar noticias recientes en la p&aacute;gina principal mediante un carrusel.</li>
                                <li>Permitir que cualquier sitio de la facultad tenga un bloque de noticias actualizado autom&aacute;ticamente.</li>
                                <li>Integrar noticias recientes en aplicaciones externas de forma visual y din&aacute;mica.</li>
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
                        <a href="{{ route('recientesCarruselDemo') }}" class="btn btn-primary">
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
     data-endpoint="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/recientes?limit=10"&gt;&lt;/div&gt;
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