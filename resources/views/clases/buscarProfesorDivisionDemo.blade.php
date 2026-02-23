@extends('layouts.app')

@section('title', 'Buscar Profesor por Division')

@section('content')

<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <h5 class="mb-0">Consulta de Profesores Activos por Divisi&oacute;n (Microservicio)</h5>
                </div>

                <div class="card-body">

                    {{-- FORMULARIO --}}
                    <form id="formDivision">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Divisi&oacute;n *</label>
                                <input type="text" class="form-control" id="division" placeholder="Ejemplo: DIE">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Limit</label>
                                <input type="number" class="form-control" id="limit" value="10">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Offset</label>
                                <input type="number" class="form-control" id="offset" value="0">
                            </div>

                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Consultar
                            </button>

                            <button type="button" class="btn btn-secondary" id="btnLimpiar">
                                Limpiar
                            </button>
                        </div>

                    </form>

                    {{-- LOADER --}}
                    <div id="loader" class="mt-4 d-none">
                        <div class="alert alert-info d-flex align-items-center gap-2">
                            <div class="spinner-border spinner-border-sm"></div>
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

    // ?? URL CORRECTA CON SUBDIRECTORIO
    const baseUrl = "/consultasfi/api/Clases/profesores-por-division-activos";

    const form = document.getElementById('formDivision');
    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const resultadoRaw = document.getElementById('resultadoRaw');
    const tablaHead = document.getElementById('tablaHead');
    const tablaBody = document.getElementById('tablaBody');
    const btnLimpiar = document.getElementById('btnLimpiar');

    /* ==========================
       EVENTO BUSCAR
    ========================== */
    form.addEventListener('submit', function(e){
        e.preventDefault();

        const division = document.getElementById('division').value.trim();
        const limit = document.getElementById('limit').value;
        const offset = document.getElementById('offset').value;

        if(division === ''){
            alert('Debe ingresar una divisi&oacute;n');
            return;
        }

        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        resultadoRaw.textContent = '';

        const params = new URLSearchParams({
            division: division,
            limit: limit,
            offset: offset
        });

        const urlFinal = baseUrl + '?' + params.toString();

        fetch(urlFinal)
            .then(response => {
                if(!response.ok) {
                    throw new Error("Error HTTP " + response.status);
                }
                return response.json();
            })
            .then(data => {

                loader.classList.add('d-none');

                // ?? Si viene error desde el backend
                if(data.error){
                    resultadoRaw.classList.remove('d-none');
                    resultadoRaw.textContent = data.error;
                    return;
                }

                // ?? CORRECCIÓN IMPORTANTE: ahora usamos data.data
                renderTabla(data.data || []);
            })
            .catch(error => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error:\n" + error.message;
            });

    });

    /* ==========================
       EVENTO LIMPIAR
    ========================== */
    btnLimpiar.addEventListener('click', function(){
        form.reset();
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        resultadoRaw.textContent = '';
    });

    /* ==========================
       RENDER TABLA
    ========================== */
    function renderTabla(data){

        tablaHead.innerHTML = '';
        tablaBody.innerHTML = '';

        if(!Array.isArray(data) || data.length === 0){
            resultadoRaw.classList.remove('d-none');
            resultadoRaw.textContent = "No se encontraron resultados.";
            return;
        }

        Object.keys(data[0]).forEach(key=>{
            const th = document.createElement('th');
            th.textContent = key;
            tablaHead.appendChild(th);
        });

        data.forEach(obj=>{
            const tr = document.createElement('tr');
            Object.values(obj).forEach(val=>{
                const td = document.createElement('td');
                td.textContent = val ?? '';
                tr.appendChild(td);
            });
            tablaBody.appendChild(tr);
        });

        tablaContainer.classList.remove('d-none');
    }

});
</script>
@endsection
