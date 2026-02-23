@extends('layouts.app')

@section('title', 'Noticias')

@section('header-title')
    Módulo de Noticias
@endsection

@section('content')
<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h3>Consultas de Noticias</h3>
            <p class="text-muted">Selecciona el tipo de consulta</p>
        </div>
    </div>

    <div class="row g-3">



        <!-- Noticias recientes -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/buscarTodasNoticias') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">🆕</div>
                        <h5 class="mt-2">Todas las noticias</h5>
                        <p class="text-muted">Listado de todas las noticias</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>


        <!-- Noticias recientes -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/recientes') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">🆕</div>
                        <h5 class="mt-2">Noticias recientes</h5>
                        <p class="text-muted">Últimas publicaciones</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Buscar noticia -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/buscar') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">🔎</div>
                        <h5 class="mt-2">Buscar noticias</h5>
                        <p class="text-muted">Por palabra clave</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Por dependencia -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/dependencia') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">🏢</div>
                        <h5 class="mt-2">Por dependencia</h5>
                        <p class="text-muted">Filtrar por área</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Por persona -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/persona') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">👤</div>
                        <h5 class="mt-2">Por persona</h5>
                        <p class="text-muted">Autor o responsable</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Por sección -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/seccion') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">🗂️</div>
                        <h5 class="mt-2">Por sección</h5>
                        <p class="text-muted">Categorías</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>
        
        
                <!-- Noticias recientes Carrusel -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/recientesCarrusel') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">🆕</div>
                        <h5 class="mt-2">Noticias recientes (Carrusel)</h5>
                        <p class="text-muted">Formato de salida en carrusel</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>
        
        
        <!-- Por dependencia -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/dependenciaCarrusel') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">🏢</div>
                        <h5 class="mt-2">Por &Aacute;rea</h5>
                        <p class="text-muted">Formato de salida en carrusel</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Por persona -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/personaCarrusel') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">👤</div>
                        <h5 class="mt-2">Por persona</h5>
                        <p class="text-muted">Formato de salida en carrusel</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Por sección Carrusel -->
        <div class="col-md-4">
            <a href="{{ url('/noticias/seccionCarrusel') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:35px">🗂️</div>
                        <h5 class="mt-2">Por sección (Carrusel)</h5>
                        <p class="text-muted">Formato de salida en carrusel</p>
                        <span class="btn btn-outline-primary btn-sm w-100">Entrar</span>
                    </div>
                </div>
            </a>
        </div>
        
        
        
        
        

    </div>

</div>
@endsection
