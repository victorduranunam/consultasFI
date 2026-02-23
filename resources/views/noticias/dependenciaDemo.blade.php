@extends('layouts.app')

@section('title', 'Demo Noticias por Dependencia')

@section('header-title')
    Demo - Noticias por Dependencia
@endsection

@section('content')
<div class="container-fluid py-4">

    <div class="card shadow-sm rounded-4">

        <div class="card-header bg-primary text-white">
            Noticias por Dependencia
        </div>

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Dependencia</label>
                    <input type="text"
                           id="dependencia"
                           class="form-control"
                           placeholder="Ejemplo: DIMEI">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Limit</label>
                    <input type="number"
                           id="limit"
                           class="form-control"
                           value="5">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Offset</label>
                    <input type="number"
                           id="offset"
                           class="form-control"
                           value="0">
                </div>

            </div>

            <div class="mt-4">
                <button class="btn btn-primary" id="btnConsultar">
                    Consultar
                </button>
            </div>

            <hr>

            <ul id="listaNoticias" class="list-group mt-3"></ul>

        </div>

    </div>

</div>
@endsection

@section('scripts')
<script>
document.getElementById('btnConsultar').addEventListener('click', function(){

    const dependencia = document.getElementById('dependencia').value;
    const limit = document.getElementById('limit').value || 5;
    const offset = document.getElementById('offset').value || 0;

    fetch(`/consultasfi/api/Noticias/dependencia?dependencia=${dependencia}&limit=${limit}&offset=${offset}`)
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
                    <small>${noticia.fecha_publicacion}</small>
                `;

                lista.appendChild(li);

            });

        });

});
</script>
@endsection