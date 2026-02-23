@extends('layouts.app')

@section('title', 'Demo Noticias por Secci&oacute;n - Carrusel')

@section('header-title')
    Demo - Noticias por Secci&oacute;n (Carrusel)
@endsection

@section('content')
<div class="container-fluid py-4">

    <div class="card shadow-sm rounded-4">

        <div class="card-header bg-primary text-white">
            Noticias por Secci&oacute;n - Carrusel
        </div>

        <div class="card-body">

            <!-- DESCRIPCIÓN -->
            <div class="mb-4">
                <p>
                    Este demo muestra directamente el carrusel de noticias de una secci&oacute;n determinada.
                    El carrusel se carga autom&aacute;ticamente con im&aacute;genes, t&iacute;tulos y fechas.
                    A continuaci&oacute;n se muestra el bloque HTML que utiliza para ejecutarse:
                </p>

                <!-- BLOQUE DE CÓDIGO PARA USO DEL USUARIO -->
                <pre class="bg-light p-3 rounded">
&lt;div id="widget-noticias" 
     data-endpoint="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/seccion/3?page=1&per_page=10"&gt;&lt;/div&gt;
&lt;script src="https://www.ingenieria.unam.mx/consultasfi/widgets/widget-noticias.js"&gt;&lt;/script&gt;
                </pre>
            </div>

            <!-- CARRUSEL CONTAINER RESPONSIVO -->
            <div style="overflow-x: hidden; max-width: 1200px; width: 90%; margin: 0 auto;">
                <div id="widget-noticias" 
                     data-endpoint="https://www.ingenieria.unam.mx/consultasfi/api/Noticias/seccion/3?page=1&per_page=10">
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    // Espera a que todo el DOM se haya cargado antes de agregar el script
    window.addEventListener('DOMContentLoaded', () => {
        const s = document.createElement('script');
        s.src = "https://www.ingenieria.unam.mx/consultasfi/widgets/widget-noticias.js";
        s.onload = () => {
            // Aseguramos que las imágenes del carrusel no desborden
            const style = document.createElement('style');
            style.innerHTML = `
                #widget-noticias .owl-carousel .item img {
                    max-width: 100%;
                    height: auto;
                }
            `;
            document.head.appendChild(style);
            console.log("Widget de noticias cargado correctamente y responsivo");
        };
        document.body.appendChild(s);
    });
</script>
@endsection