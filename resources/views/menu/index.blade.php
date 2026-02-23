@extends('layouts.app')

@section('title', 'Clases')

@section('header-title')
    Informacion Academica
@endsection

@section('content')
<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h2>Bienvenido a ConsultasFI</h2>
            <p class="text-muted">MicroServicios para el servicio de la comunidad de la FI</p>
            
        </div>
    </div>

    <div class="row g-4">

        <!-- Clases -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <div style="font-size:40px">&#x1F4DA;</div> <!-- ?? -->
                    <h5 class="mt-2">Informaci&oacute;n Escolar</h5>
                    <p class="text-muted">Gesti&oacute;n acad&eacute;mica y grupos</p>
                    <a href="{{ url('/clases') }}" class="btn btn-outline-primary btn-sm w-100">Entrar</a>
                </div>
            </div>
        </div>

        <!-- Inventarios -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <div style="font-size:40px">&#x1F4E6;</div> <!-- ?? -->
                    <h5 class="mt-2">Inventarios de Laboratorios</h5>
                    <p class="text-muted">Control de recursos y activos</p>
                    <a href="{{ url('/inventarios') }}" class="btn btn-outline-primary btn-sm w-100">Entrar</a>
                </div>
            </div>
        </div>

        <!-- Noticias -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <div style="font-size:40px">&#x1F4F0;</div> <!-- ?? -->
                    <h5 class="mt-2">Noticias</h5>
                    <p class="text-muted">Gesti&oacute;n y consulta de noticias institucionales</p>
                    <a href="{{ url('/noticias') }}" class="btn btn-outline-primary btn-sm w-100">Entrar</a>
                </div>
            </div>
        </div>

        <!-- Salones -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <div style="font-size:40px">&#x1F3EB;</div> <!-- ?? -->
                    <h5 class="mt-2">Informaci&oacute;n de Salones</h5>
                    <p class="text-muted">Capacidad, recursos y caracter&iacute;sticas</p>
                    <a href="{{ url('/salones') }}" class="btn btn-outline-primary btn-sm w-100">Entrar</a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
