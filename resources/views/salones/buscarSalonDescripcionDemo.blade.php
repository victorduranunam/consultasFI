@extends('layouts.app')

@section('title', 'Caracter&iacute;sticas de un Sal&oacute;n')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        Caracter&iacute;sticas generales de un Sal&oacute;n
                    </h5>
                </div>

                <div class="card-body">

                    <!-- FORMULARIO -->
                    <form id="formSalon">
                        <div class="row g-3">

                            <div class="col-md-4">
                                <label class="form-label">Nombre del Sal&oacute;n</label>
                                <input type="text" id="nombre_salon" class="form-control" placeholder="Ejemplo: J-101">
                            </div>

                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary" id="btnConsultar" disabled>
                                Consultar
                            </button>

                            <button type="button" class="btn btn-secondary" id="btnLimpiar">
                                Limpiar
                            </button>
                        </div>
                    </form>

                    <!-- LOADER -->
                    <div id="loader" class="mt-4 d-none">
                        <div class="alert alert-info">Consultando microservicio...</div>
                    </div>

                    <!-- RESULTADOS -->
                    <div class="mt-4" id="resultadosContainer">

                        <div id="tablaContainer" class="d-none table-responsive"></div>
                        <div id="mensajeError" class="d-none mt-3"></div>

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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Salones/caracteristicas";

    const form = document.getElementById('formSalon');
    const nombreInput = document.getElementById('nombre_salon');
    const btnConsultar = document.getElementById('btnConsultar');
    const btnLimpiar = document.getElementById('btnLimpiar');

    const loader = document.getElementById('loader');
    const tablaContainer = document.getElementById('tablaContainer');
    const mensajeError = document.getElementById('mensajeError');

    function validarFormulario() {
        btnConsultar.disabled = nombreInput.value.trim() === '';
    }

    nombreInput.addEventListener('input', validarFormulario);

    form.addEventListener('submit', function(e){
        e.preventDefault();
        consultar();
    });

    btnLimpiar.addEventListener('click', function(){
        form.reset();
        btnConsultar.disabled = true;
        tablaContainer.classList.add('d-none');
        mensajeError.classList.add('d-none');
        tablaContainer.innerHTML = '';
        mensajeError.innerHTML = '';
    });

    function consultar() {
        const nombre = nombreInput.value.trim();
        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        mensajeError.classList.add('d-none');

        const url = `${baseUrl}?nombre_salon=${encodeURIComponent(nombre)}`;

        fetch(url)
            .then(r => { if(!r.ok) throw new Error("Error HTTP " + r.status); return r.json(); })
            .then(data => {
                loader.classList.add('d-none');

                if(!data.success || !data.data || data.data.length === 0){
                    mensajeError.classList.remove('d-none');
                    mensajeError.innerHTML = '<div class="alert alert-warning">No se encontraron resultados.</div>';
                    return;
                }

                renderTabla(data.data);

            })
            .catch(err => {
                loader.classList.add('d-none');
                mensajeError.classList.remove('d-none');
                mensajeError.innerHTML = '<div class="alert alert-danger">Error al consultar: ' + err.message + '</div>';
            });
    }

    function renderTabla(data){
        let html = '<table class="table table-bordered">';
        html += '<thead><tr><th>Nombre del Sal&oacute;n</th><th>Edificio</th><th>Capacidad</th><th>Tipo</th><th>Estatus</th></tr></thead><tbody>';

        data.forEach(item => {
            html += `<tr>
                <td>${item.nombre_salon}</td>
                <td>${item.edificio}</td>
                <td>${item.capacidad}</td>
                <td>${item.id_tipo_salon}</td>
                <td>${item.estatus ? 'Activo' : 'Inactivo'}</td>
            </tr>`;
        });

        html += '</tbody></table>';
        tablaContainer.innerHTML = html;
        tablaContainer.classList.remove('d-none');
    }

});
</script>
@endsection