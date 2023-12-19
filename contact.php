<?php /* Template name: Contacto */

get_header();

echo '
<main id="main">
    <div class="container contact-page--wrapper">
        <section class="section contact-page">
            <h1 class="title-section">' . esc_html('Nos encantaría conocer tu opinión.', 'kenko') . '</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.0889968287265!2d-96.1047354221305!3d19.103751282106604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c34030df283fa1%3A0xc5a82fdae0720c9a!2sDise%C3%B1o%20Gr%C3%A1fico%20y%20Desarrollo%20Web%20InGenio%20Alfalfa%20%2F%2F%20PeraManzana!5e0!3m2!1ses-419!2smx!4v1702919470034!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="info-and-contact--wrapper">
                <div class="info">
                    <div><h3>' . esc_html__('Información práctica', 'kenko') . '</h3></div>
                    <div>
                        <p>' . esc_html__('Messenger bag raw denim health goth pour-over, twee Neutra Vice ethical bespoke. Irony hashtag mixtape kogi blog you probably haven’t heard of them, fashion axe readymade scenester flexitarian. Ugh bespoke actually vinyl photo booth tattooed paleo Pinterest Schlitz. Cronut hella selfies, flexitarian sriracha keffiyeh Intelligentsia biodiesel.', 'kenko') . '</p>
                        <p>' . esc_html__('Teléfono: ', 'kenko') . ' <a id="number-contact" href="' . get_theme_mod('office_phone_number', '2290000000') . '">' . get_theme_mod('office_phone_number', '2290000000') . '</a></p>
                        <p>' . get_theme_mod('address_line1', 'Mártires del HTML #404') . '<br>' . get_theme_mod('address_line2', 'Veracruz, México.') . '</p>
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