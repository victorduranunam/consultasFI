@extends('layouts.app')

@section('title', 'Consultar Inventario')

@section('content')

<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Consulta general de Inventario (Microservicio)</h5>
                </div>

                <div class="card-body">

                    <form id="formInventario">

                        <div class="row g-3">

                            <div class="col-md-3">
                                <label class="form-label">Registros por p&aacute;gina</label>
                                <input type="number" id="limit" class="form-control" value="20">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Offset</label>
                                <input type="number" id="offset" class="form-control" value="0">
                            </div>

                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                Consultar
                            </button>

                            <button type="button" class="btn btn-secondary" id="btnLimpiar">
                                Limpiar
                            </button>
                        </div>

                    </form>

                    {{-- LOADER --}}
                    <div id="loader" class="mt-4 d-none">
                        <div class="alert alert-info">
                            Consultando microservicio...
                        </div>
                    </div>

                    {{-- RESULTADO --}}
                    <div class="mt-4">

                        <div class="table-responsive d-none" id="tablaContainer">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr id="tablaHead"></tr>
                                </thead>
                                <tbody id="tablaBody"></tbody>
                            </table>
                        </div>

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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Inventarios";

    const columnasPermitidas = [
        'id_equipo',
        'bn_id',
        'inventario',
        'bn_desc',
        'bn_marca',
        'laboratorio',
        'departamento',
        'division',
        'detalle_ubicacion',
        'nombre',
        'a_paterno',
        'a_materno',
        'correo'
    ];

    const form = document.getElementById('formInventario');
    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const resultadoRaw = document.getElementById('resultadoRaw');
    const tablaHead = document.getElementById('tablaHead');
    const tablaBody = document.getElementById('tablaBody');
    const btnLimpiar = document.getElementById('btnLimpiar');
    const btnAnterior = document.getElementById('btnAnterior');
    const btnSiguiente = document.getElementById('btnSiguiente');
    const paginacion = document.getElementById('paginacion');

    const limitInput = document.getElementById('limit');
    const offsetInput = document.getElementById('offset');

    let ultimoResultado = [];

    /* ========================== */
    function consultar() {

        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');

        const limit = limitInput.value || 20;
        const offset = offsetInput.value || 0;

        const url = baseUrl + '?limit=' + limit + '&offset=' + offset;

        fetch(url)
            .then(r => {
                if(!r.ok) throw new Error("Error HTTP " + r.status);
                return r.json();
            })
            .then(data => {
                loader.classList.add('d-none');
                ultimoResultado = data.data || data; 
                renderTabla(ultimoResultado);
            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error:\n" + err.message;
            });
    }

    /* ========================== */
    form.addEventListener('submit', function(e){
        e.preventDefault();
        consultar();
    });

    /* ========================== */
    btnAnterior.addEventListener('click', function(){
        let offset = parseInt(offsetInput.value);
        let limit = parseInt(limitInput.value);

        if(offset - limit >= 0){
            offsetInput.value = offset - limit;
            consultar();
        }
    });

    btnSiguiente.addEventListener('click', function(){
        let offset = parseInt(offsetInput.value);
        let limit = parseInt(limitInput.value);

        offsetInput.value = offset + limit;
        consultar();
    });

    /* ========================== */
    btnLimpiar.addEventListener('click', function(){
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        tablaHead.innerHTML = '';
        tablaBody.innerHTML = '';
    });

    /* ========================== */
    function renderTabla(data){

        tablaHead.innerHTML = '';
        tablaBody.innerHTML = '';

        if(!Array.isArray(data) || data.length === 0){
            resultadoRaw.classList.remove('d-none');
            resultadoRaw.textContent = "No se encontraron registros.";
            return;
        }

        columnasPermitidas.forEach(col => {
            const th = document.createElement('th');
            th.textContent = col;
            tablaHead.appendChild(th);
        });

        data.forEach(obj => {
            const tr = document.createElement('tr');

            columnasPermitidas.forEach(col => {
                const td = document.createElement('td');
                td.textContent = obj[col] ?? '';
                tr.appendChild(td);
            });

            tablaBody.appendChild(tr);
        });

        tablaContainer.classList.remove('d-none');
        paginacion.classList.remove('d-none');
    }

});
</script>
@endsection
