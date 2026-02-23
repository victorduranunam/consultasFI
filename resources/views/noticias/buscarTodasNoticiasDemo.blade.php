@extends('layouts.app')

@section('title', 'Noticias de la Facultad de Ingenier&iacute;a')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        Noticias de la Facultad de Ingenier&iacute;a
                    </h5>
                </div>

                <div class="card-body">

                    <!-- FORMULARIO -->
                    <form id="formNoticias">
                        <div class="row g-3">

                            <div class="col-md-2">
                                <label class="form-label">P&aacute;gina</label>
                                <input type="number"
                                       id="page"
                                       class="form-control"
                                       value="1"
                                       min="1">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Noticias por p&aacute;gina</label>
                                <input type="number"
                                       id="per_page"
                                       class="form-control"
                                       value="5"
                                       min="1">
                            </div>

                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit"
                                    class="btn btn-primary"
                                    id="btnConsultar">
                                Consultar
                            </button>

                            <button type="button"
                                    class="btn btn-secondary"
                                    id="btnLimpiar">
                                Limpiar
                            </button>
                        </div>
                    </form>

                    <!-- LOADER -->
                    <div id="loader" class="mt-4 d-none">
                        <div class="alert alert-info">
                            Consultando microservicio...
                        </div>
                    </div>

                    <!-- TABLA -->
                    <div class="mt-4">
                        <div class="table-responsive d-none" id="tablaContainer">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>T&iacute;tulo</th>
                                        <th>S&iacute;ntesis</th>
                                        <th>Autor</th>
                                        <th>Fecha Publicaci&oacute;n</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaBody"></tbody>
                            </table>
                        </div>

                        <!-- PAGINACIÓN -->
                        <div class="d-flex justify-content-between mt-3 d-none" id="paginacion">
                            <button class="btn btn-outline-primary" id="btnAnterior">
                                &laquo; Anterior
                            </button>
                            <button class="btn btn-outline-primary" id="btnSiguiente">
                                Siguiente &raquo;
                            </button>
                        </div>

                        <pre id="resultadoRaw" class="d-none"></pre>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Noticias/completas";
    const noticiaBaseUrl = "https://www.comunicacionfi.unam.mx/mostrar_nota.php?id_noticia=";

    const form = document.getElementById('formNoticias');
    const pageInput = document.getElementById('page');
    const perPageInput = document.getElementById('per_page');

    const btnConsultar = document.getElementById('btnConsultar');
    const btnLimpiar = document.getElementById('btnLimpiar');
    const btnAnterior = document.getElementById('btnAnterior');
    const btnSiguiente = document.getElementById('btnSiguiente');

    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const tablaBody = document.getElementById('tablaBody');
    const paginacion = document.getElementById('paginacion');
    const resultadoRaw = document.getElementById('resultadoRaw');

    let currentPage = 1;
    let totalPages = 1;

    form.addEventListener('submit', function(e){
        e.preventDefault();
        currentPage = parseInt(pageInput.value) || 1;
        consultar();
    });

    function consultar(){
        const perPage = parseInt(perPageInput.value) || 5;

        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        tablaBody.innerHTML = '';

        const url = `${baseUrl}?page=${currentPage}&per_page=${perPage}`;

        fetch(url)
            .then(r => {
                if(!r.ok) throw new Error("Error HTTP " + r.status);
                return r.json();
            })
            .then(resp => {
                loader.classList.add('d-none');

                if(!resp.data || resp.data.length === 0){
                    resultadoRaw.classList.remove('d-none');
                    resultadoRaw.textContent = "No se encontraron resultados.";
                    return;
                }

                renderTabla(resp.data);

                // Guardar total de páginas
                totalPages = resp.meta.total_pages;

                // Actualizar paginación
                actualizarPaginacion(resp.meta.total, perPage, totalPages);
            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error al consultar:\n" + err.message;
            });
    }

    function actualizarPaginacion(total, perPage, totalPages){
        paginacion.classList.toggle('d-none', total <= perPage);
        btnAnterior.disabled = currentPage <= 1;
        btnSiguiente.disabled = currentPage >= totalPages;
    }

    btnAnterior.addEventListener('click', function(){
        if(currentPage > 1){
            currentPage--;
            pageInput.value = currentPage;
            consultar();
        }
    });

    btnSiguiente.addEventListener('click', function(){
        if(currentPage < totalPages){
            currentPage++;
            pageInput.value = currentPage;
            consultar();
        }
    });

    btnLimpiar.addEventListener('click', function(){
        form.reset();
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        tablaBody.innerHTML = '';
        currentPage = 1;
        totalPages = 1;
    });

    function renderTabla(data){
        data.forEach(obj=>{
            const tr = document.createElement('tr');

            const tdTitulo = document.createElement('td');
            const a = document.createElement('a');
            a.href = noticiaBaseUrl + obj.id_noticia;
            a.textContent = obj.titulo;
            a.target = "_blank";
            tdTitulo.appendChild(a);
            tr.appendChild(tdTitulo);

            const tdSintesis = document.createElement('td');
            tdSintesis.textContent = obj.sintesis;
            tr.appendChild(tdSintesis);

            const tdAutor = document.createElement('td');
            tdAutor.textContent = obj.autor;
            tr.appendChild(tdAutor);

            const tdFecha = document.createElement('td');
            const fecha = new Date(obj.fecha_publicacion);
            tdFecha.textContent = fecha.toLocaleDateString('es-ES');
            tr.appendChild(tdFecha);

            tablaBody.appendChild(tr);
        });

        tablaContainer.classList.remove('d-none');
        paginacion.classList.remove('d-none');
    }

});
</script>
@endsection