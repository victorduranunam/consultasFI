@extends('layouts.app')

@section('title', 'Informacion Escolar')

@section('header-title')
    Grupos por divisi&oacute;n
@endsection

@section('content')
<div class="container-fluid">

    <!-- ============================= -->
    <!-- BLOQUE PRINCIPAL DOCUMENTACIÓN -->
    <!-- ============================= -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <!-- Header -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Grupos por divisi&oacute;n</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">materiasPorDivision</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                        <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>
https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/division
                            </code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite consultar los grupos disponibles
                                pertenecientes a una divisi&oacute;n acad&eacute;mica espec&iacute;fica.
                            </p>
                            <p class="mb-0">
                                Devuelve informaci&oacute;n relacionada con la materia, clave,
                                grupo, modalidad, estatus y dem&aacute;s datos acad&eacute;micos
                                asociados a dicha divisi&oacute;n.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
https://www.ingenieria.unam.mx/consultasfi/api/Clases/materias/division?division=DIE&limit=50&offset=0
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
                                        <td>division</td>
                                        <td>string</td>
                                        <td>S&iacute;</td>
                                        <td>Clave de la divisi&oacute;n acad&eacute;mica (ej. DIE, DCB, DIC, etc.)</td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>L&iacute;mite de registros a devolver</td>
                                    </tr>
                                    <tr>
                                        <td>offset</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>Desplazamiento para paginaci&oacute;n</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Reglas -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127919; Reglas de b&uacute;squeda</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>El par&aacute;metro <strong>division</strong> es obligatorio.</li>
                                <li>Si no se env&iacute;a, el servicio devolver&aacute; un mensaje de error.</li>
                                <li>Se recomienda utilizar <strong>limit</strong> y <strong>offset</strong> para paginar resultados extensos.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Casos de uso -->
                    <div class="row mb-0">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Consultar todos los grupos pertenecientes a una divisi&oacute;n acad&eacute;mica.</li>
                                <li>Integrar informaci&oacute;n acad&eacute;mica en sistemas administrativos.</li>
                                <li>Mostrar oferta acad&eacute;mica segmentada por divisi&oacute;n.</li>
                                <li>Generar reportes institucionales por &aacute;rea acad&eacute;mica.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================= -->
    <!-- USO EN FRONTEND -->
    <!-- ============================= -->
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
                        utilizando <strong>JavaScript nativo (Fetch API)</strong>.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('buscarMateriaDivisionDemo') }}" class="btn btn-primary">
                            Ir al demo interactivo
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================= -->
    <!-- DESCARGA DE ARCHIVOS -->
    <!-- ============================= -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Descarga de los archivos</h4>
                        <span class="badge bg-success">Descarga</span>
                    </div>

                    <p>
                        Se ponen a disposici&oacute;n los archivos fuente para facilitar
                        la implementaci&oacute;n del microservicio en cualquier proyecto.
                        Solo descargue los componentes HTML, CSS y JavaScript e
                        int&eacute;grelos seg&uacute;n sus necesidades.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarMateriaDivision.rar"
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
