<?php

get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section not-found">
            <div class="not-found--icon"></div>
            <h2>' . esc_html__('Página no encontrada', 'kenko') . '</h2>
            <p>' . esc_html__('Parece que no se encontró nada en esta ubicación. Haz clic en el enlace de abajo para regresar a la página de inicio.', 'kenko') . '</p>
        </section>
    </div>
</main>';

get_footer();