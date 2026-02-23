@extends('layouts.app')

@section('title', 'Busqueda de Recursos en Salones')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        B&uacute;squeda de Recursos en Salones
                    </h5>
                </div>

                <div class="card-body">

                    <!-- FORMULARIO -->
                    <form id="formBuscarRecurso">
                        <div class="row g-3">

                            <div class="col-md-4">
                                <label class="form-label">Recurso</label>
                                <input type="text"
                                       id="criterio"
                                       class="form-control"
                                       placeholder="Ejemplo: proyector">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">P&aacute;gina</label>
                                <input type="number"
                                       id="page"
                                       class="form-control"
                                       value="1"
                                       min="1">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Registros por p&aacute;gina</label>
                                <input type="number"
                                       id="per_page"
                                       class="form-control"
                                       value="20"
                                       min="1">
                            </div>

                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit"
                                    class="btn btn-primary"
                                    id="btnConsultar"
                                    disabled>
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
                                        <th>Sal&oacute;n</th>
                                        <th>Edificio</th>
                                        <th>Capacidad</th>
                                        <th>Recurso</th>
                                        <th>Descripci&oacute;n</th>
                                        <th>Cantidad</th>
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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Salones/buscar-recurso";

    const form = document.getElementById('formBuscarRecurso');
    const criterioInput = document.getElementById('criterio');
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

    function validarFormulario(){
        btnConsultar.disabled = criterioInput.value.trim() === '';
    }

    criterioInput.addEventListener('input', validarFormulario);

    form.addEventListener('submit', function(e){
        e.preventDefault();
        currentPage = parseInt(pageInput.value) || 1;
        consultar();
    });

    function consultar(){
        const criterio = criterioInput.value.trim();
        const perPage = parseInt(perPageInput.value) || 20;

        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');

        const url = `${baseUrl}?criterio=${encodeURIComponent(criterio)}&page=${currentPage}&per_page=${perPage}`;

        fetch(url)
            .then(r => { if(!r.ok) throw new Error("Error HTTP " + r.status); return r.json(); })
            .then(data => {
                loader.classList.add('d-none');

                if(!data.data || data.data.length === 0){
                    resultadoRaw.classList.remove('d-none');
                    resultadoRaw.textContent = "No se encontraron resultados.";
                    return;
                }

                renderTabla(data.data);
                actualizarPaginacion(data.count, perPage);
            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error al consultar:\n" + err.message;
            });
    }

    function actualizarPaginacion(count, perPage){
        paginacion.classList.toggle('d-none', count < perPage);
        btnAnterior.disabled = currentPage <= 1;
        btnSiguiente.disabled = count < perPage;
    }

    btnAnterior.addEventListener('click', function(){ if(currentPage > 1){ currentPage--; consultar(); }});
    btnSiguiente.addEventListener('click', function(){ currentPage++; consultar(); });

    btnLimpiar.addEventListener('click', function(){
        form.reset();
        btnConsultar.disabled = true;
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        tablaBody.innerHTML = '';
        currentPage = 1;
    });

    function renderTabla(data){
        tablaBody.innerHTML = '';

        data.forEach(obj=>{
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${obj.nombre_salon}</td>
                <td>${obj.edificio}</td>
                <td>${obj.capacidad}</td>
                <td>${obj.nombre_recurso}</td>
                <td>${obj.descripcion_recurso}</td>
                <td>${obj.cantidad}</td>
            `;
            tablaBody.appendChild(tr);
        });

        tablaContainer.classList.remove('d-none');
    }

});
</script>
@endsection