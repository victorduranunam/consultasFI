@extends('layouts.app')

@section('title', 'Consultar Inventario por Búsqueda')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Consulta de Inventario por b&uacute;squeda (Microservicio)</h5>
                </div>

                <div class="card-body">

                    <!-- Formulario -->
                    <form id="formInventario">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Campo</label>
                                <select id="campo" class="form-select">
                                    <option value="">Seleccione...</option>
                                    <option value="bn_desc">Descripci&oacute;n</option>
                                    <option value="laboratorio">Laboratorio</option>
                                    <option value="departamento">Departamento</option>
                                    <option value="division">Divisi&oacute;n</option>
                                    <option value="responsable">Responsable</option>
                                    <option value="inventario">Inventario</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Valor</label>
                                <input type="text" id="valor" class="form-control" placeholder="Ejemplo: Osciloscopio">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Registros</label>
                                <input type="number" id="limit" class="form-control" value="20" min="1">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">Offset</label>
                                <input type="number" id="offset" class="form-control" value="0" min="0" readonly>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-success" id="btnBuscar" disabled>
                                Consultar
                            </button>
                            <button type="button" class="btn btn-secondary" id="btnLimpiar">
                                Limpiar
                            </button>
                        </div>
                    </form>

                    <!-- Loader -->
                    <div id="loader" class="mt-4 d-none">
                        <div class="alert alert-info">Consultando microservicio...</div>
                    </div>

                    <!-- Tabla de resultados -->
                    <div class="mt-4">
                        <div class="table-responsive d-none" id="tablaContainer">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr id="tablaHead"></tr>
                                </thead>
                                <tbody id="tablaBody"></tbody>
                            </table>
                        </div>

                        <!-- Paginación -->
                        <div class="d-flex justify-content-between mt-3 d-none" id="paginacion">
                            <button class="btn btn-outline-primary" id="btnAnterior">&laquo; Anterior</button>
                            <button class="btn btn-outline-primary" id="btnSiguiente">Siguiente &raquo;</button>
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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/busqueda";

    const columnasPermitidas = [
        'inventario', 'descripcion', 'marca', 'modelo', 'serie',
        'responsable', 'telefono', 'extension', 'correo',
        'detalle_ubicacion', 'laboratorio', 'departamento', 'division', 'edificio'
    ];

    const form = document.getElementById('formInventario');
    const campoInput = document.getElementById('campo');
    const valorInput = document.getElementById('valor');
    const limitInput = document.getElementById('limit');
    const offsetInput = document.getElementById('offset');

    const btnBuscar = document.getElementById('btnBuscar');
    const btnLimpiar = document.getElementById('btnLimpiar');
    const btnAnterior = document.getElementById('btnAnterior');
    const btnSiguiente = document.getElementById('btnSiguiente');

    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const tablaHead = document.getElementById('tablaHead');
    const tablaBody = document.getElementById('tablaBody');
    const paginacion = document.getElementById('paginacion');
    const resultadoRaw = document.getElementById('resultadoRaw');

    let totalRegistros = 0;

    function validarFormulario(){
        const campo = campoInput.value.trim();
        const valor = valorInput.value.trim();
        btnBuscar.disabled = !(campo && valor);
    }

    campoInput.addEventListener('change', validarFormulario);
    valorInput.addEventListener('input', validarFormulario);

    form.addEventListener('submit', function(e){
        e.preventDefault();
        offsetInput.value = 0;
        consultar();
    });

    function consultar(){
        const campo = campoInput.value.trim();
        const valor = valorInput.value.trim();
        const limit = parseInt(limitInput.value) || 20;
        const offset = parseInt(offsetInput.value) || 0;

        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        resultadoRaw.classList.add('d-none');

        const url = `${baseUrl}?campo=${campo}&valor=${encodeURIComponent(valor)}&limit=${limit}&offset=${offset}`;

        fetch(url)
            .then(r => {
                if(!r.ok) throw new Error("Error HTTP " + r.status);
                return r.json();
            })
            .then(data => {
                loader.classList.add('d-none');

                // data.data y data.total deben venir del método en Laravel
                totalRegistros = data.total || data.length || 0;
                renderTabla(data.data || data);
                actualizarPaginacion();
            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = "Error al consultar:\n" + err.message;
            });
    }

    function actualizarPaginacion(){
        const limit = parseInt(limitInput.value) || 20;
        const offset = parseInt(offsetInput.value) || 0;

        paginacion.classList.toggle('d-none', totalRegistros <= limit);
        btnAnterior.disabled = offset <= 0;
        btnSiguiente.disabled = offset + limit >= totalRegistros;
    }

    btnAnterior.addEventListener('click', function(){
        const limit = parseInt(limitInput.value) || 20;
        let offset = parseInt(offsetInput.value) || 0;
        if(offset - limit >= 0){
            offsetInput.value = offset - limit;
            consultar();
        }
    });

    btnSiguiente.addEventListener('click', function(){
        const limit = parseInt(limitInput.value) || 20;
        let offset = parseInt(offsetInput.value) || 0;
        if(offset + limit < totalRegistros){
            offsetInput.value = offset + limit;
            consultar();
        }
    });

    btnLimpiar.addEventListener('click', function(){
        form.reset();
        btnBuscar.disabled = true;
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');
        tablaHead.innerHTML = '';
        tablaBody.innerHTML = '';
        totalRegistros = 0;
    });

    function renderTabla(data){
        tablaHead.innerHTML = '';
        tablaBody.innerHTML = '';

        if(!Array.isArray(data) || data.length === 0){
            resultadoRaw.classList.remove('d-none');
            resultadoRaw.textContent = "No se encontraron resultados.";
            return;
        }

        // Encabezados
        columnasPermitidas.forEach(col=>{
            const th = document.createElement('th');
            th.textContent = col;
            tablaHead.appendChild(th);
        });

        // Filas
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
