@extends('layouts.app')

@section('title', 'Buscar Grupos por Alumno')

@section('content')

<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <h5 class="mb-0"> Consulta de Grupos por Alumno (Microservicio)</h5>
                </div>

                <div class="card-body">

                    {{-- FORMULARIO --}}
                    <form id="formAlumno">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">B&uacute;squeda</label>
                                <input type="text" 
                                       class="form-control busqueda" 
                                       id="busqueda"
                                       placeholder="N&uacute;mero de cuenta, nombre o correo">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Limit</label>
                                <input type="number" class="form-control" id="limit" value="50">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Offset</label>
                                <input type="number" class="form-control" id="offset" value="0">
                            </div>

                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary" id="btnBuscar" disabled>
                                <i class="bi bi-search"></i> Consultar
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
                        <h6 class="fw-bold">Resultado:</h6>

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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/grupos";

    const form = document.getElementById('formAlumno');
    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const resultadoRaw = document.getElementById('resultadoRaw');
    const tablaHead = document.getElementById('tablaHead');
    const tablaBody = document.getElementById('tablaBody');

    const btnLimpiar = document.getElementById('btnLimpiar');
    const btnBuscar = document.getElementById('btnBuscar');

    const campoBusqueda = document.getElementById('busqueda');

    /* ===================================
       HABILITAR / DESHABILITAR BOTÓN
    =================================== */
    function actualizarBoton(){
        btnBuscar.disabled = campoBusqueda.value.trim() === '';
    }

    campoBusqueda.addEventListener('input', actualizarBoton);
    actualizarBoton();


    /* ===================================
       EVENTO BUSCAR
    =================================== */
    form.addEventListener('submit', function(e){
        e.preventDefault();

        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        resultadoRaw.textContent = '';

        const busqueda = campoBusqueda.value.trim();
        const limit = document.getElementById('limit').value.trim();
        const offset = document.getElementById('offset').value.trim();

        if(busqueda === ''){
            loader.classList.add('d-none');
            resultadoRaw.classList.remove('d-none');
            resultadoRaw.textContent = "Debe ingresar un valor en el campo búsqueda.";
            return;
        }

        const params = new URLSearchParams();
        params.append('busqueda', busqueda);
        params.append('limit', limit);
        params.append('offset', offset);

        const urlFinal = baseUrl + '?' + params.toString();

        fetch(urlFinal)
            .then(async r => {
                const data = await r.json();

                if(!r.ok){
                    throw new Error(data.error || "Error HTTP " + r.status);
                }

                return data;
            })
            .then(data => {
                loader.classList.add('d-none');

                if(data.data){
                    renderTabla(data.data);
                }else{
                    resultadoRaw.classList.remove('d-none');
                    resultadoRaw.textContent = "Respuesta inesperada del servidor.";
                }
            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error:\n" + err.message;
            });
    });


    /* ===================================
       EVENTO LIMPIAR
    =================================== */
    btnLimpiar.addEventListener('click', function(){
        form.reset();
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        resultadoRaw.textContent = '';
        btnBuscar.disabled = true;
    });


    /* ===================================
       RENDER TABLA
    =================================== */
    function renderTabla(data){

        tablaHead.innerHTML = '';
        tablaBody.innerHTML = '';

        if(!Array.isArray(data) || data.length === 0){
            resultadoRaw.classList.remove('d-none');
            resultadoRaw.textContent = "No se encontraron resultados.";
            return;
        }

        // Encabezados dinámicos
        Object.keys(data[0]).forEach(key=>{
            const th = document.createElement('th');
            th.textContent = key;
            tablaHead.appendChild(th);
        });

        // Filas
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
