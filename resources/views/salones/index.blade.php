@extends('layouts.app')

@section('title', 'Salones')

@section('header-title')
    M�dulo de Salones
@endsection

@section('content')
<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h3>Consultas de Salones</h3>
            <p class="text-muted">Selecciona el tipo de consulta</p>
        </div>
    </div>

    <div class="row g-3">

        <!-- Informacion del salon -->
        <div class="col-md-4">
            <a href="{{ url('/Salones/buscarSalones') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Salones</h5>
                        <p class="text-muted">Listado de salones</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>


        <!-- Caracter�sticas del sal�n -->
        <div class="col-md-4">
            <a href="{{ url('/Salones/buscarSalonDescripcion') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Descripcion de un Sal&oacute;n </h5>
                        <p class="text-muted">Caracter&iacute;sticas generales de un sal&oacute;n </p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>


        <!-- Caracter�sticas del sal�n -->
        <div class="col-md-4">
            <a href="{{ url('/Salones/buscarInformacionSalon') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Sal&oacute;n Recursos</h5>
                        <p class="text-muted">Recursos que tiene asignados un sal&oacute;n </p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>
        

        <!-- Buscar por recurso -->
        <div class="col-md-4">
            <a href="{{ url('/Salones/buscarRecurso') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Buscar por recurso</h5>
                        <p class="text-muted">Proyector, PC, etc.</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>




        <!-- Capacidad por edificio -->
        <div class="col-md-4">
            <a href="{{ url('/Salones/buscarCapacidadEdificio') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px"></div>
                        <h5 class="mt-2">Capacidad  Edificios</h5>
                        <p class="text-muted">Capacidad de un edificio para recibir alumnos en un determinado momento</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>




    </div>

</div>
@endsection
