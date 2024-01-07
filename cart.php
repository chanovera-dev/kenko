<?php /* Template name: Carrito */

get_header(); 

echo '
<main id="main">
    <div class="container">
        <section class="section">' .
            do_shortcode('[woocommerce_cart]');
        echo '
        </section>
    </div>
</main>';

get_footer();

