@extends('layouts.app')

@section('title', 'Informacion Escolar')

@section('header-title')
    Grupos asignados a profesor
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
                        <h3 class="mb-2 mb-md-0">&#128196; Microservicio: Consulta de grupos por profesor</h3>
                        <div>
                            <span class="badge bg-primary">GET</span>
                            <span class="badge bg-secondary">API REST</span>
                            <span class="badge bg-info text-dark">Microservicio</span>
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="row mb-3">
                       <div class="col-md-3 col-12 fw-bold">&#128105;&#8205;&#128187; Nombre del servicio</div>
                        <div class="col-md-9">gruposPorMaestro</div>
                    </div>

                    <!-- Endpoint -->
                    <div class="row mb-3">
                         <div class="col-md-3 col-12 fw-bold">&#128205; Endpoint</div>
                        <div class="col-md-9">
                            <code>https://www.ingenieria.unam.mx/consultasfi/api/Clases/maestros/grupos</code>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Descripci&oacute;n</div>
                        <div class="col-md-9">
                            <p class="mb-2">
                                Este microservicio permite consultar los grupos acad&eacute;micos asignados a un profesor,
                                incluyendo la clave de la asignatura, nombre de la materia, n&uacute;mero de grupo,
                                modalidad, estatus y total de alumnos inscritos.
                            </p>
                            <p class="mb-0">
                                La b&uacute;squeda puede realizarse mediante el n&uacute;mero de trabajador, nombre completo
                                o correo electr&oacute;nico del profesor.
                            </p>
                        </div>
                    </div>

                    <!-- URL ejemplo -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127760; URL de ejemplo</div>
                        <div class="col-md-9">
                            <div class="bg-light p-2 rounded small text-break">
https://www.ingenieria.unam.mx/consultasfi/api/Clases/maestros/grupos?num_trabajador=803771&amp;limit=50&amp;offset=0
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
                                        <td>num_trabajador</td>
                                        <td>string</td>
                                        <td>No*</td>
                                        <td>N&uacute;mero de trabajador del profesor</td>
                                    </tr>
                                    <tr>
                                        <td>nombre</td>
                                        <td>string</td>
                                        <td>No*</td>
                                        <td>Nombre completo o parcial del profesor</td>
                                    </tr>
                                    <tr>
                                        <td>correo</td>
                                        <td>string</td>
                                        <td>No*</td>
                                        <td>Correo electr&oacute;nico del profesor</td>
                                    </tr>
                                    <tr>
                                        <td>limit</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>L&iacute;mite de registros (por defecto 50)</td>
                                    </tr>
                                    <tr>
                                        <td>offset</td>
                                        <td>int</td>
                                        <td>No</td>
                                        <td>Desplazamiento de paginaci&oacute;n</td>
                                    </tr>
                                </tbody>
                            </table>
                            <small class="text-muted">
                                * Se debe proporcionar al menos uno de los siguientes: num_trabajador, nombre o correo.
                            </small>
                        </div>
                    </div>

                    <!-- Reglas -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#127919; Reglas de b&uacute;squeda</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Se debe enviar al menos un par&aacute;metro de identificaci&oacute;n del profesor.</li>
                                <li>Si se env&iacute;a <strong>num_trabajador</strong>, la consulta se realiza mediante la funci&oacute;n almacenada en base de datos.</li>
                                <li>Si se env&iacute;a <strong>nombre</strong> o <strong>correo</strong>, se realiza una b&uacute;squeda directa en la tabla de profesores.</li>
                                <li>La b&uacute;squeda por nombre y correo permite coincidencias parciales (ILIKE).</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Casos de uso -->
                    <div class="row mb-3">
                        <div class="col-md-3 fw-bold">&#128221; Casos de uso</div>
                        <div class="col-md-9">
                            <ul class="mb-0">
                                <li>Consultar los grupos asignados a un profesor espec&iacute;fico.</li>
                                <li>Obtener el total de alumnos inscritos por grupo.</li>
                                <li>Integrar la informaci&oacute;n con sistemas acad&eacute;micos externos.</li>
                                <li>Generar reportes acad&eacute;micos por docente.</li>
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
                        Este ejemplo muestra c&oacute;mo consumir el microservicio desde un frontend utilizando
                        <strong>JavaScript nativo (Fetch API)</strong>.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('buscarGrupoProfesorDemo') }}" class="btn btn-primary">
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
                        Ponemos a su disposici&oacute;n los archivos fuente para facilitar la implementaci&oacute;n
                        de este microservicio en sus desarrollos.
                    </p>

                    <div class="d-flex justify-content-center">
                        <a href="https://www.ingenieria.unam.mx/consultasfi/downloads/buscarGrupoProfesor.rar"
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
