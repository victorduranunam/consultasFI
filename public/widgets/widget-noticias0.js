(function () {

    const BASE_IMAGEN = "https://www.comunicacionfi.unam.mx/imagenes_noticias/";
    const BASE_LINK   = "https://www.comunicacionfi.unam.mx/mostrar_nota.php?id_noticia=";

    document.addEventListener("DOMContentLoaded", function () {

        const widgets = document.querySelectorAll(".fi-noticias-widget");

        widgets.forEach(widget => {

            const endpoint = widget.dataset.endpoint;

            if (!endpoint) {
                console.error("El widget necesita data-endpoint");
                return;
            }

            cargarNoticias(endpoint, widget);
        });

    });

    function cargarNoticias(endpoint, contenedor) {

        fetch(endpoint)
            .then(res => res.json())
            .then(json => {

                if (!json.success || !json.data) return;

                construirCarrusel(json.data, contenedor);

            })
            .catch(err => console.error("Error cargando noticias:", err));
    }

    function construirCarrusel(noticias, contenedor) {

        let html = `
            <div class="section pb-0 header-stick">
            <div class="container">
                <div class="fancy-title title-center title-border mt-5">
                    <h3>Noticias</h3>
                </div>

                <div class="owl-carousel fi-owl posts-carousel posts-md mb-5">
        `;

        noticias.forEach(noticia => {

            const imagen = noticia.direccion_foto_principal
                ? BASE_IMAGEN + noticia.direccion_foto_principal
                : "";

            const link = BASE_LINK + noticia.id_noticia;

            html += `
                <div class="item">
                    <div class="entry">

                        <div class="entry-image">
                            <a href="${link}" target="_blank">
                                <img src="${imagen}" alt="${noticia.titulo}">
                            </a>
                        </div>

                        <div class="entry-title title-xs">
                            <h3>${noticia.titulo}</h3>
                        </div>

                        <div class="entry-meta">
                            <ul>
                                <li>${formatearFecha(noticia.fecha_publicacion)}</li>
                                <li>${noticia.seccion ?? ''}</li>
                            </ul>
                        </div>

                    </div>
                </div>
            `;
        });

        html += `
                </div>
            </div>
            </div>
        `;

        contenedor.innerHTML = html;

        inicializarOwl(contenedor);
    }

    function formatearFecha(fecha) {
        const opciones = { day: '2-digit', month: 'short', year: 'numeric' };
        return new Date(fecha).toLocaleDateString('es-MX', opciones);
    }

    function inicializarOwl(contenedor) {

        if (typeof jQuery !== "undefined") {

            setTimeout(function () {

                jQuery(contenedor)
                    .find(".fi-owl")
                    .owlCarousel({
                        margin: 30,
                        loop: false,
                        autoplay: true,
                        autoplayHoverPause: true,
                        smartSpeed: 600,
                        slideBy: 1,
                        dots: true,
                        nav: false,
                        responsive: {
                            0: { items: 1 },
                            576: { items: 2 },
                            768: { items: 3 },
                            1200: { items: 5 }
                        }
                    });

            }, 300);
        }
    }

})();