@extends('layouts.app')

@section('title', 'Estadisticas por Departamento de Inventarios')

@section('header-title')
    Estad&iacute;sticas de inventarios por departamento
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Estad&iacute;sticas por departamento</h3>
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
                            Estad&iacute;sticas de inventarios filtradas por departamento
                        </div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas/departamento</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este endpoint devuelve las estad&iacute;sticas del inventario agrupadas por 
                                <strong>departamento</strong> especificado en los par&aacute;metros de consulta.
                            </p>
                            <p class="mb-0">
                                La respuesta se entrega en formato JSON con paginaci&oacute;n y ordenada por 
                                el total descendente de registros por descripci&oacute;n.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
  
                                
                                 <a target="_blank" href="https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/departamento?departamento=Planeaci%C3%B3n&amp;page=1&amp;per_page=20">
                                      https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/departamento?departamento=Planeaci%C3%B3n&amp;page=1&amp;per_page=20
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
                                        <td>departamento</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Nombre del departamento para filtrar las estad&iacute;sticas.</td>
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
                                <li>El par&aacute;metro <strong>departamento</strong> es obligatorio.</li>
                                <li>La respuesta est&aacute; paginada con <strong>page</strong> y <strong>per_page</strong>.</li>
                                <li>Los resultados se ordenan por <strong>total</strong> descendente.</li>
                                <li>En caso de error se devuelve un c&oacute;digo HTTP 500 con el mensaje de error.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Ejemplos -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128202; Ejemplos de consulta</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li><code>?departamento=Planeaci&oacute;n&page=1</code> &rarr; Estad&iacute;sticas del departamento p&aacute;gina 1.</li>
                                <li><code>?departamento=Inform&aacute;tica&amp;per_page=30</code> &rarr; 30 resultados por p&aacute;gina.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Analizar la distribuci&oacute;n de bienes por descripci&oacute;n dentro de un departamento.</li>
                                <li>Generar reportes administrativos filtrados por departamento.</li>
                                <li>Evaluar concentraci&oacute;n de inventario por &aacute;rea.</li>
                                <li>Comparar carga de inventario entre departamentos.</li>
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
                        <strong>JavaScript (Fetch API)</strong>, enviando los par&aacute;metros 
                        <strong>departamento</strong>, <strong>page</strong> y <strong>per_page</strong>.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('busquedaEstadisticasDepartamentoDemo') }}" class="btn btn-primary">
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
                        la consulta de estad&iacute;sticas por departamento.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/busquedaEstadisticasDepartamento.rar" class="btn btn-primary" target="_blank">
                            Descargar ejemplo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
