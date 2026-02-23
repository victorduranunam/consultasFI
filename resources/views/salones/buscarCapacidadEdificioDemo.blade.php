@extends('layouts.app')

@section('title', 'Capacidad por Edificio')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        Capacidad de alumnos por edificio
                    </h5>
                </div>

                <div class="card-body">

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
                                        <th>Edificio</th>
                                        <th>Capacidad total</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaBody"></tbody>
                            </table>
                        </div>

                        <pre id="resultadoRaw" class="d-none"></pre>
                    </div>

                    <div class="mt-3 d-flex gap-2">
                        <button class="btn btn-primary" id="btnConsultar">Consultar</button>
                        <button class="btn btn-secondary" id="btnLimpiar">Limpiar</button>
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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Salones/capacidad-edificio";

    const btnConsultar = document.getElementById('btnConsultar');
    const btnLimpiar = document.getElementById('btnLimpiar');
    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const tablaBody = document.getElementById('tablaBody');
    const resultadoRaw = document.getElementById('resultadoRaw');

    btnConsultar.addEventListener('click', function(){
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
                if(!data.data || data.data.length === 0){
                    resultadoRaw.classList.remove('d-none');
                    resultadoRaw.textContent = "No se encontraron resultados.";
                    return;
                }

                data.data.forEach(obj=>{
                    const tr = document.createElement('tr');

                    const tdEdificio = document.createElement('td');
                    tdEdificio.textContent = obj.edificio;
                    tr.appendChild(tdEdificio);

                    const tdCapacidad = document.createElement('td');
                    tdCapacidad.textContent = obj.capacidad_total;
                    tr.appendChild(tdCapacidad);

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

    btnLimpiar.addEventListener('click', function(){
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        tablaBody.innerHTML = '';
    });

});
</script>
@endsection