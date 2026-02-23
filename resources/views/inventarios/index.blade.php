@extends('layouts.app')

@section('title', 'Inventarios')

@section('header-title')
    M&oacute;dulo de Inventarios
@endsection

@section('content')
<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h3>Consultas de Inventarios</h3>
            <p class="text-muted">Selecciona el tipo de consulta</p>
        </div>
    </div>

    <div class="row g-3">

        <!-- Inventario general -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaGeneral') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Inventario general</h5>
                        <p class="text-muted">Listado completo</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- B�squeda -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaInventarioPersonalizada') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">B&uacute;squeda</h5>
                        <p class="text-muted">Consulta personalizada</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Estad�sticas por descripci�n -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaEstadisticasDesc') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">B&uacute;squeda</h5>
                        <p class="text-muted">Por tipo de equipo (descripci&oacute;n)</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Estad�sticas por divisi�n -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaEstadisticasDivision') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">B&uacute;squeda</h5>
                        <p class="text-muted">Por divisi&oacute;n</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Estad�sticas por laboratorio -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaEstadisticasLaboratorio') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">B&uacute;squeda</h5>
                        <p class="text-muted">Por laboratorio</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Por departamento -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaEstadisticasDepartamento') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Por departamento</h5>
                        <p class="text-muted">Filtro por &aacute;rea</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>




        <!-- Por edificio -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaEstadisticasEdificio') }}" class="text-decoration-none">
            
            
            
            
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Por edificio</h5>
                        <p class="text-muted">Filtro por letra</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Por responsable -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaEstadisticasResponsable') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Por responsable</h5>
                        <p class="text-muted">Asignaci&oacute;n de bienes</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Totales por laboratorio -->
        <div class="col-md-4">
            <a href="{{ url('/Inventarios/busquedaTotalLaboratorios') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Totales</h5>
                        <p class="text-muted">Por laboratorio</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection
