<?php /* Template name: Contacto */

get_header();

echo '
<main id="main">
    <div class="container contact-page--wrapper">
        <section class="section contact-page">
            <h1 class="title-section">' . esc_html('Nos encantaría conocer tu opinión.', 'kenko') . '</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1088.245986387935!2d-99.21029677545259!3d19.38813831898164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20156edc0e3bd%3A0x681a45b5cb2c26f5!2sgrupo%2026!5e0!3m2!1ses-419!2smx!4v1704858171841!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="info-and-contact--wrapper">
                <div class="info">
                    <div><h3>' . esc_html__('Información práctica', 'kenko') . '</h3></div>
                    <div>
                        <p>' . esc_html__('Messenger bag raw denim health goth pour-over, twee Neutra Vice ethical bespoke. Irony hashtag mixtape kogi blog you probably haven’t heard of them, fashion axe readymade scenester flexitarian. Ugh bespoke actually vinyl photo booth tattooed paleo Pinterest Schlitz. Cronut hella selfies, flexitarian sriracha keffiyeh Intelligentsia biodiesel.', 'kenko') . '</p>
                        <p>' . esc_html__('Teléfono: ', 'kenko') . ' <a id="number-contact" href="' . get_theme_mod('office_phone_number', '5523797688') . '">' . get_theme_mod('office_phone_number', '5523797688') . '</a></p>
                        <p>' . get_theme_mod('address_line1', 'Calle Mz 4 Grupo 26 #8') . '<br>' . get_theme_mod('address_line2', 'Col. Santa Fe IMSS.') . '<br>' . get_theme_mod('address_line3', 'C.P. 01170') . '<br>' . get_theme_mod('address_line4', 'Ciudad de México') . '</p>
                    </div>
                </div>
                <div class="contact">
                    <div><h3>' . esc_html__('Contáctanos', 'kenko') . '</h3></div>
                    <div>'; the_content(); echo '</div>
                </div>
            </div>
        </section>
    </div>
</main>';

get_footer();