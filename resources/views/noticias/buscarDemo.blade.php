@extends('layouts.app')

@section('title', 'Demo Buscar Noticias')

@section('header-title')
    Demo - Buscar Noticias
@endsection

@section('content')
<div class="container-fluid py-4">

    <div class="card shadow-sm rounded-4">

        <div class="card-header bg-primary text-white">
            Buscar Noticias (B&uacute;squeda Avanzada)
        </div>

        <div class="card-body">

            <!-- ============================= -->
            <!-- FORMULARIO DE BÚSQUEDA -->
            <!-- ============================= -->

            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">T&iacute;tulo</label>
                    <input type="text" id="titulo" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">S&iacute;ntesis</label>
                    <input type="text" id="sintesis" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Contenido</label>
                    <input type="text" id="contenido" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Autor</label>
                    <input type="text" id="autor" class="form-control">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Fot&oacute;grafo</label>
                    <input type="text" id="fotografo" class="form-control">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Fecha</label>
                    <input type="date" id="fecha" class="form-control">
                </div>

                <div class="col-md-2">
                    <label class="form-label">ID Noticia</label>
                    <input type="number" id="id_noticia" class="form-control">
                </div>

                <div class="col-md-1">
                    <label class="form-label">Limit</label>
                    <input type="number" id="limit" class="form-control" value="10" min="1">
                </div>

                <div class="col-md-1">
                    <label class="form-label">Offset</label>
                    <input type="number" id="offset" class="form-control" value="0" min="0">
                </div>

            </div>

            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-primary" id="btnConsultar" disabled>
                    Consultar
                </button>

                <button class="btn btn-secondary" id="btnLimpiar">
                    Limpiar Campos
                </button>
            </div>

            <hr>

            <!-- ============================= -->
            <!-- RESULTADOS -->
            <!-- ============================= -->

            <ul id="listaNoticias" class="list-group mt-3"></ul>

        </div>

    </div>

</div>
@endsection

@section('scripts')
<script>

const camposBusqueda = [
    'titulo',
    'sintesis',
    'contenido',
    'autor',
    'fotografo',
    'fecha',
    'id_noticia'
];

const btnConsultar = document.getElementById('btnConsultar');
const btnLimpiar = document.getElementById('btnLimpiar');
const lista = document.getElementById('listaNoticias');

/* ============================= */
/* VALIDAR CAMPOS */
/* ============================= */

function validarCampos() {

    let hayDatos = false;

    camposBusqueda.forEach(id => {
        const valor = document.getElementById(id).value.trim();
        if (valor !== '') {
            hayDatos = true;
        }
    });

    btnConsultar.disabled = !hayDatos;

}

camposBusqueda.forEach(id => {
    document.getElementById(id).addEventListener('input', validarCampos);
});

/* ============================= */
/* CONSULTAR */
/* ============================= */

btnConsultar.addEventListener('click', function(){

    lista.innerHTML = '';

    const params = new URLSearchParams();

    camposBusqueda.forEach(id => {
        const valor = document.getElementById(id).value.trim();
        if (valor !== '') {
            params.append(id, valor);
        }
    });

    params.append('limit', document.getElementById('limit').value || 10);
    params.append('offset', document.getElementById('offset').value || 0);

    fetch(`/consultasfi/api/Noticias/buscar?${params.toString()}`)
        .then(r => r.json())
        .then(data => {

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
                    ${noticia.sintesis ?? ''}
                    <br>
                    <small>${noticia.fecha ?? ''}</small>
                `;

                lista.appendChild(li);

            });

        });

});

/* ============================= */
/* LIMPIAR */
/* ============================= */

btnLimpiar.addEventListener('click', function(){

    camposBusqueda.forEach(id => {
        document.getElementById(id).value = '';
    });

    document.getElementById('limit').value = 10;
    document.getElementById('offset').value = 0;

    lista.innerHTML = '';

    btnConsultar.disabled = true;

});

</script>
@endsection