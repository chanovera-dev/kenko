<?php

get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section not-found">
            <div class="not-found--icon"></div>
            <h2>' . esc_html__('Página no encontrada', 'kenko') . '</h2>
            <p>' . esc_html__('Parece que no se encontró nada en esta ubicación. Haz clic en el enlace de abajo para regresar a la página de inicio.', 'kenko') . '</p>
            <a href="' . site_url() . '">' . '
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>' .
                esc_html__('Inicio', 'kenko') . '
            </a>
        </section>
    </div>
</main>';

get_footer();