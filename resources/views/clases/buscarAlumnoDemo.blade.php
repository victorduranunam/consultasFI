@extends('layouts.app')

@section('title', 'Buscar Alumnos')

@section('content')

<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <h5 class="mb-0">Consulta de Alumnos (Microservicio)</h5>
                </div>

                <div class="card-body">

                    {{-- FORMULARIO --}}
                    <form id="formAlumnos">

                        <div class="row g-3">

                            <div class="col-md-4">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control busqueda" id="nombre">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Apellido paterno</label>
                                <input type="text" class="form-control busqueda" id="apellido_paterno">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Apellido materno</label>
                                <input type="text" class="form-control busqueda" id="apellido_materno">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Correo personal</label>
                                <input type="email" class="form-control busqueda" id="correo_personal">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Número de cuenta</label>
                                <input type="text" class="form-control busqueda" id="num_cuenta">
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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Clases/alumnos/buscar";

    const form = document.getElementById('formAlumnos');
    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const resultadoRaw = document.getElementById('resultadoRaw');
    const tablaHead = document.getElementById('tablaHead');
    const tablaBody = document.getElementById('tablaBody');

    const btnLimpiar = document.getElementById('btnLimpiar');
    const btnBuscar = document.getElementById('btnBuscar');

    const camposBusqueda = ['nombre','apellido_paterno','apellido_materno','correo_personal','num_cuenta'];

    // Habilitar/deshabilitar botón según campos llenos
    function actualizarBoton(){
        const hayDato = camposBusqueda.some(id => document.getElementById(id).value.trim() !== '');
        btnBuscar.disabled = !hayDato;
    }

    document.querySelectorAll('.busqueda').forEach(el=>{
        el.addEventListener('input', actualizarBoton);
    });
    actualizarBoton();

    /* EVENTO BUSCAR */
    form.addEventListener('submit', function(e){
        e.preventDefault();

        // Reset visual
        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        resultadoRaw.textContent = '';

        const params = new URLSearchParams();

        camposBusqueda.forEach(id => {
            const el = document.getElementById(id);
            if(el.value.trim() !== ''){
                params.append(id, el.value.trim());
            }
        });

        ['limit','offset'].forEach(id => {
            const el = document.getElementById(id);
            if(el.value.trim() !== ''){
                params.append(id, el.value.trim());
            }
        });

        if(params.toString().trim() === ''){
            loader.classList.add('d-none');
            resultadoRaw.classList.remove('d-none');
            resultadoRaw.textContent = "Seleccione al menos un campo para consultar.";
            return;
        }

        const urlFinal = baseUrl + '?' + params.toString();

        fetch(urlFinal)
            .then(r => {
                if(!r.ok) throw new Error("Error HTTP " + r.status);
                return r.json();
            })
            .then(data => {
                loader.classList.add('d-none');
                renderTabla(data.data || []);
            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error:\n" + err.message;
            });
    });

    /* EVENTO LIMPIAR */
    btnLimpiar.addEventListener('click', function(){
        form.reset();
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        resultadoRaw.textContent = '';
        btnBuscar.disabled = true;
    });

    /* RENDER TABLA */
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
