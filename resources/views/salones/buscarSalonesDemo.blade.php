@extends('layouts.app')

@section('title', 'Listado de Salones')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        Listado de Salones
                    </h5>
                </div>

                <div class="card-body">

                    <button class="btn btn-primary mb-3" id="btnCargar">
                        Cargar Salones
                    </button>

                    <!-- LOADER -->
                    <div id="loader" class="mt-2 d-none">
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
                                        <th>Nombre del Sal&oacute;n</th>
                                    </tr>
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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Salones/listadoSalones";

    const btnCargar = document.getElementById('btnCargar');
    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const tablaBody = document.getElementById('tablaBody');
    const resultadoRaw = document.getElementById('resultadoRaw');

    btnCargar.addEventListener('click', function(){

        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        tablaBody.innerHTML = '';

        fetch(baseUrl)
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

                data.forEach(obj => {
                    const tr = document.createElement('tr');
                    const td = document.createElement('td');
                    td.textContent = obj.nombre;
                    tr.appendChild(td);
                    tablaBody.appendChild(tr);
                });

                tablaContainer.classList.remove('d-none');

            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error al consultar:\n" + err.message;
            });

    });

});
</script>
@endsection