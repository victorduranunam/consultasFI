@extends('layouts.app')

@section('title', 'Inventario por Departamento')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        Inventario por Departamento
                    </h5>
                </div>

                <div class="card-body">

                    <!-- FORMULARIO -->
                    <form id="formDepartamento">
                        <div class="row g-3">

                            <div class="col-md-4">
                                <label class="form-label">Departamento</label>
                                <input type="text"
                                       id="departamento"
                                       class="form-control"
                                       placeholder="Ejemplo: fisica">
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
                                    <tr id="tablaHead"></tr>
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

    const baseUrl =
    "https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/departamento";

    const columnasPermitidas = [
        'inventario',
        'descripcion',
        'marca',
        'modelo',
        'serie',
        'responsable',
        'telefono',
        'extension',
        'correo',
        'laboratorio',
        'departamento',
        'division',
        'edificio'
    ];

    const form = document.getElementById('formDepartamento');
    const departamentoInput = document.getElementById('departamento');
    const pageInput = document.getElementById('page');
    const perPageInput = document.getElementById('per_page');

    const btnConsultar = document.getElementById('btnConsultar');
    const btnLimpiar = document.getElementById('btnLimpiar');
    const btnAnterior = document.getElementById('btnAnterior');
    const btnSiguiente = document.getElementById('btnSiguiente');

    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const tablaHead = document.getElementById('tablaHead');
    const tablaBody = document.getElementById('tablaBody');
    const paginacion = document.getElementById('paginacion');
    const resultadoRaw = document.getElementById('resultadoRaw');

    let currentPage = 1;

    function validarFormulario(){
        btnConsultar.disabled = departamentoInput.value.trim() === '';
    }

    departamentoInput.addEventListener('input', validarFormulario);

    form.addEventListener('submit', function(e){
        e.preventDefault();
        currentPage = parseInt(pageInput.value) || 1;
        consultar();
    });

    function consultar(){

        const departamento = departamentoInput.value.trim();
        const perPage = parseInt(perPageInput.value) || 20;

        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');

        const url = `${baseUrl}?departamento=${encodeURIComponent(departamento)}&page=${currentPage}&per_page=${perPage}`;

        fetch(url)
            .then(r => {
                if(!r.ok) throw new Error("Error HTTP " + r.status);
                return r.json();
            })
            .then(data => {

                loader.classList.add('d-none');

                if(!data || data.length === 0){
                    resultadoRaw.classList.remove('d-none');
                    resultadoRaw.textContent = "No se encontraron resultados.";
                    return;
                }

                renderTabla(data);
                paginacion.classList.toggle('d-none', data.length < perPage);
                btnAnterior.disabled = currentPage <= 1;
                btnSiguiente.disabled = data.length < perPage;
            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error al consultar:\n" + err.message;
            });
    }

    btnAnterior.addEventListener('click', function(){
        if(currentPage > 1){
            currentPage--;
            consultar();
        }
    });

    btnSiguiente.addEventListener('click', function(){
        currentPage++;
        consultar();
    });

    btnLimpiar.addEventListener('click', function(){
        form.reset();
        btnConsultar.disabled = true;
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        tablaHead.innerHTML = '';
        tablaBody.innerHTML = '';
        currentPage = 1;
    });

    function renderTabla(data){

        tablaHead.innerHTML = '';
        tablaBody.innerHTML = '';

        columnasPermitidas.forEach(col=>{
            const th = document.createElement('th');
            th.textContent = col.charAt(0).toUpperCase() + col.slice(1);
            tablaHead.appendChild(th);
        });

        data.forEach(obj=>{
            const tr = document.createElement('tr');

            columnasPermitidas.forEach(col=>{
                const td = document.createElement('td');
                td.textContent = obj[col] ?? '';
                tr.appendChild(td);
            });

            tablaBody.appendChild(tr);
        });

        tablaContainer.classList.remove('d-none');
    }

});
</script>
@endsection
