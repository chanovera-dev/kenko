<?php /* Template name: Checkout */
    get_header();
    
    echo '
    <main id="main">
        <div class="container main-content">
            <section class="section product-checkout">';
                echo do_shortcode('[woocommerce_checkout]');
            echo '
            </section>
        </div>
    </main>';

    get_footer();