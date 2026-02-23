(function () {

    const container = document.getElementById("widget-noticias");
    if (!container) return;

    const endpoint = container.getAttribute("data-endpoint");
    if (!endpoint) {
        container.innerHTML = "No se definió el endpoint.";
        return;
    }

    // ==========================
    // CARGAR CSS PROPIO
    // ==========================
    const css = document.createElement("link");
    css.rel = "stylesheet";
    css.href = "https://www.ingenieria.unam.mx/consultasfi/widgets/widget-noticias.css";
    document.head.appendChild(css);

    function loadScript(src) {
        return new Promise(resolve => {
            const s = document.createElement("script");
            s.src = src;
            s.onload = resolve;
            document.body.appendChild(s);
        });
    }

    function loadCSS(href) {
        const l = document.createElement("link");
        l.rel = "stylesheet";
        l.href = href;
        document.head.appendChild(l);
    }

    Promise.all([
        loadScript("https://code.jquery.com/jquery-3.6.0.min.js"),
        loadScript("https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js")
    ]).then(() => {

        loadCSS("https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css");
        loadCSS("https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css");

        fetch(endpoint)
            .then(res => res.json())
            .then(response => {

                if (!response.success) {
                    container.innerHTML = "No hay noticias disponibles.";
                    return;
                }

                container.innerHTML = `
                    <div class="owl-carousel owl-theme" id="owl-noticias"></div>
                `;

                const owl = document.getElementById("owl-noticias");

                response.data.forEach(noticia => {

                    owl.innerHTML += `
                        <div class="item">
                            <div class="entry">
                                <div class="entry-image">
                                    <a href="https://www.comunicacionfi.unam.mx/mostrar_nota.php?id_noticia=${noticia.id_noticia}" target="_blank">
                                        <img src="https://www.comunicacionfi.unam.mx/imagenes_noticias/${noticia.direccion_foto_principal}">
                                    </a>
                                </div>
                                <div class="entry-title">
                                    <h3>${noticia.titulo}</h3>
                                </div>
                                <div class="entry-meta">
                                    <span>${noticia.fecha_publicacion}</span>
                                </div>
                            </div>
                        </div>
                    `;
                });

                jQuery("#owl-noticias").owlCarousel({
                    margin: 20,
                    loop: false,
                    autoplay: true,
                    autoplayHoverPause: true,
                    nav: true,
                    dots: true,
                    responsive: {
                        0: { items: 1 },
                        576: { items: 2 },
                        768: { items: 3 },
                        1200: { items: 5 }
                    }
                });

            })
            .catch(() => {
                container.innerHTML = "Error al consultar el servicio.";
            });

    });

})();