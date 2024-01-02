<?php /* Template name: Mi cuenta */

get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section">' .
            do_shortcode('[woocommerce_my_account]');
        echo '
        </section>
    </div>
</main>';

get_footer();