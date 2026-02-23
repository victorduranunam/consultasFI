@extends('layouts.app')

@section('title', 'Demo Noticias por Secci&oacute;n')

@section('header-title')
    Demo - Noticias por Secci&oacute;n
@endsection

@section('content')
<div class="container-fluid py-4">

    <div class="card shadow-sm rounded-4">

        <div class="card-header bg-primary text-white">
            Noticias por Secci&oacute;n
        </div>

        <div class="card-body">

            <!-- FORMULARIO -->
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">ID de Secci&oacute;n</label>
                    <input type="number"
                           id="id_seccion"
                           class="form-control"
                           placeholder="Ejemplo: 1"
                           min="1">
                </div>

                <div class="col-md-3">
                    <label class="form-label">P&aacute;gina</label>
                    <input type="number"
                           id="page"
                           class="form-control"
                           value="1"
                           min="1">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Registros por p&aacute;gina</label>
                    <input type="number"
                           id="per_page"
                           class="form-control"
                           value="5"
                           min="1">
                </div>

            </div>

            <div class="mt-4">
                <button class="btn btn-primary" id="btnConsultar">
                    Consultar
                </button>

                <button class="btn btn-secondary ms-2" id="btnAnterior">
                    Anterior
                </button>

                <button class="btn btn-secondary ms-2" id="btnSiguiente">
                    Siguiente
                </button>
            </div>

            <hr>

            <!-- LISTA -->
            <ul id="listaNoticias" class="list-group mt-3"></ul>

        </div>

    </div>

</div>
@endsection

@section('scripts')
<script>

let paginaActual = 1;

document.getElementById('btnConsultar').addEventListener('click', function(){

    paginaActual = parseInt(document.getElementById('page').value) || 1;
    consultar();

});

document.getElementById('btnAnterior').addEventListener('click', function(){

    if(paginaActual > 1){
        paginaActual--;
        document.getElementById('page').value = paginaActual;
        consultar();
    }

});

document.getElementById('btnSiguiente').addEventListener('click', function(){

    paginaActual++;
    document.getElementById('page').value = paginaActual;
    consultar();

});


function consultar(){

    const idSeccion = document.getElementById('id_seccion').value;
    const perPage = document.getElementById('per_page').value || 5;

    if(!idSeccion){
        alert('Debe ingresar un ID de secci&oacute;n');
        return;
    }

    fetch(`/consultasfi/api/Noticias/seccion/${idSeccion}?page=${paginaActual}&per_page=${perPage}`)
        .then(r => r.json())
        .then(data => {

            const lista = document.getElementById('listaNoticias');
            lista.innerHTML = '';

            if(!data.success || data.data.length === 0){
                lista.innerHTML = '<li class="list-group-item">No se encontraron resultados.</li>';
                return;
            }

            data.data.forEach(noticia => {

                const li = document.createElement('li');
                li.className = 'list-group-item';

                li.innerHTML = `
                    <strong>
                        <a href="https://www.comunicacionfi.unam.mx/mostrar_nota.php?id_noticia=${noticia.id_noticia}"
                           target="_blank">
                           ${noticia.titulo}
                        </a>
                    </strong>
                    <br>
                    ${noticia.sintesis}
                    <br>
                    <small>
                        ${noticia.fecha_publicacion}
                        ${noticia.noticia_principal == 1 ? ' | Noticia Principal' : ''}
                    </small>
                `;

                lista.appendChild(li);

            });

        });

}

</script>
@endsection