@extends('layouts.app')

@section('title', 'Estadísticas de Inventario')

@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm rounded-4">

                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Estad&iacute;sticas de Inventario por Descripci&oacute;n</h5>
                </div>

                <div class="card-body">

                    <!-- Loader -->
                    <div id="loader" class="mt-4 d-none">
                        <div class="alert alert-info">Consultando microservicio...</div>
                    </div>

                    <!-- Tabla de resultados -->
                    <div class="mt-4">
                        <div class="table-responsive d-none" id="tablaContainer">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Descripci&oacute;n</th>
                                        <th>Total</th>
                                    </tr>
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

    const baseUrl = "https://www.ingenieria.unam.mx/consultasfi/api/Inventarios/estadisticas-bn-desc";
    const tablaBody = document.getElementById('tablaBody');
    const tablaContainer = document.getElementById('tablaContainer');
    const loader = document.getElementById('loader');
    const paginacion = document.getElementById('paginacion');
    const btnAnterior = document.getElementById('btnAnterior');
    const btnSiguiente = document.getElementById('btnSiguiente');
    const resultadoRaw = document.getElementById('resultadoRaw');

    let page = 1; // comenzamos en la página 2 como tu ejemplo
    let perPage = 50;
    let totalRows = 0;

    function escaparHTML(text) {
        if (!text) return '';
        return text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;')
            .replace(/á/g, '&aacute;')
            .replace(/é/g, '&eacute;')
            .replace(/í/g, '&iacute;')
            .replace(/ó/g, '&oacute;')
            .replace(/ú/g, '&uacute;')
            .replace(/Á/g, '&Aacute;')
            .replace(/É/g, '&Eacute;')
            .replace(/Í/g, '&Iacute;')
            .replace(/Ó/g, '&Oacute;')
            .replace(/Ú/g, '&Uacute;')
            .replace(/ñ/g, '&ntilde;')
            .replace(/Ñ/g, '&Ntilde;');
    }

    function consultar() {
        loader.classList.remove('d-none');
        tablaContainer.classList.add('d-none');
        paginacion.classList.add('d-none');
        resultadoRaw.classList.add('d-none');

        fetch(`${baseUrl}?per_page=${perPage}&page=${page}`)
            .then(r => {
                if (!r.ok) throw new Error('Error HTTP ' + r.status);
                return r.json();
            })
            .then(data => {
                loader.classList.add('d-none');
                renderTabla(data.data || []);
                totalRows = parseInt(data.count) || 0;
                actualizarPaginacion();
            })
            .catch(err => {
                loader.classList.add('d-none');
                resultadoRaw.classList.remove('d-none');
                resultadoRaw.textContent = 'Error al consultar:\n' + err.message;
            });
    }

    function renderTabla(data) {
        tablaBody.innerHTML = '';
        if (!Array.isArray(data) || data.length === 0) {
            resultadoRaw.classList.remove('d-none');
            resultadoRaw.textContent = "No se encontraron resultados.";
            return;
        }

        data.forEach(item => {
            const tr = document.createElement('tr');

            const tdDesc = document.createElement('td');
            tdDesc.innerHTML = escaparHTML(item.descripcion);
            tr.appendChild(tdDesc);

            const tdTotal = document.createElement('td');
            tdTotal.textContent = item.total;
            tr.appendChild(tdTotal);

            tablaBody.appendChild(tr);
        });

        tablaContainer.classList.remove('d-none');
    }

    function actualizarPaginacion() {
        paginacion.classList.remove('d-none');
        btnAnterior.disabled = page <= 1;
        btnSiguiente.disabled = totalRows <= page * perPage;
    }

    btnAnterior.addEventListener('click', function () {
        if (page > 1) {
            page--;
            consultar();
        }
    });

    btnSiguiente.addEventListener('click', function () {
        if (totalRows > page * perPage) {
            page++;
            consultar();
        }
    });

    // Consulta inicial
    consultar();

});
</script>
@endsection
