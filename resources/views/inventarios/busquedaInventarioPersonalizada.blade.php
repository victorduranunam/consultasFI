@extends('layouts.app')

@section('title', 'Busqueda de Inventarios')

@section('header-title')
    B&uacute;squeda avanzada de inventarios
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: B&uacute;squeda de inventarios</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">Inventarios - B&uacute;squeda din&aacute;mica</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/busqueda</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite realizar b&uacute;squedas din&aacute;micas sobre el inventario institucional,
                                indicando el <strong>Campo</strong> sobre el cual se desea consultar y el <strong>Valor</strong> a buscar.
                            </p>
                            <p class="mb-0">
                                La respuesta se entrega en formato JSON e incluye el n&uacute;mero total de registros disponibles y los datos solicitados.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
                                <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/busqueda?campo=bn_desc&valor=compu&limit=5&offset=10">
                                    https://https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/busqueda?campo=bn_desc&valor=compu&limit=5&offset=10
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
                                        <td>Campo</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Nombre del campo sobre el cual se realizar&aacute; la b&uacute;squeda (ejemplo: bn_desc, responsable, laboratorio, division, inventario).</td>
                                    </tr>
                                    <tr>
                                        <td>Valor</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Texto a buscar dentro del campo indicado. La b&uacute;squeda es parcial y no sensible a acentos ni may&uacute;sculas.</td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>N&uacute;mero m&aacute;ximo de registros a devolver. Valor por defecto: 50.</td>
                                    </tr>
                                    <tr>
                                        <td>offset</td>
                                        <td>integer</td>
                                        <td>No</td>
                                        <td>Desplazamiento inicial de los registros devueltos (para paginaci&oacute;n). Valor por defecto: 0.</td>
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
                                <li>Los par&aacute;metros <strong>Campo</strong> y <strong>Valor</strong> son obligatorios.</li>
                                <li>Se puede incluir <strong>limit</strong> y <strong>offset</strong> para paginaci&oacute;n.</li>
                                <li>La b&uacute;squeda es insensible a may&uacute;sculas, min&uacute;sculas y acentos.</li>
                                <li>La respuesta incluye <strong>total</strong> y <strong>data</strong> en formato JSON.</li>
                                <li>En caso de error, se devuelve c&oacute;digo HTTP 500 con detalle del mensaje.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?Campo=bn_desc&amp;Valor=OSCILOSCOPIO&amp;limit=10&amp;offset=0</code> &rarr; Buscar por descripci&oacute;n con paginaci&oacute;n.</li>
                                <li><code>?Campo=responsable&amp;Valor=JUAN&amp;limit=5&amp;offset=5</code> &rarr; Buscar por nombre del responsable a partir del sexto registro.</li>
                                <li><code>?Campo=division&amp;Valor=ELECTRICA&amp;limit=20</code> &rarr; Buscar por divisi&oacute;n con 20 registros m&aacute;ximos.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Localizar equipos por descripci&oacute;n o marca.</li>
                                <li>Consultar bienes asignados a un responsable.</li>
                                <li>Filtrar inventario por laboratorio o divisi&oacute;n.</li>
                                <li>Integrar resultados en dashboards administrativos.</li>
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
                        enviando los par&aacute;metros <strong>Campo</strong>, <strong>Valor</strong>, <strong>limit</strong> y <strong>offset</strong> en la URL.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('busquedaInventarioPersonalizadaDemo') }}" class="btn btn-primary">
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
                        la b&uacute;squeda din&aacute;mica de inventarios.
                        Descargue los componentes HTML/CSS/JS para integrarlos en su proyecto.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/busquedaInventarioPersonalizada.rar"
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
