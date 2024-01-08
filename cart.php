<?php /* Template name: Carrito */

get_header(); 

echo '
<main id="main">
    <div class="container">
        <section class="section">
            <h1>' . the_title() . '</h1>' .

            do_shortcode('[woocommerce_cart]');
        echo '
        </section>
    </div>
</main>';

get_footer();

