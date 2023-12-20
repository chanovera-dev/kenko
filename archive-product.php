<?php
    get_header();

    echo '
    <main id="main">';
        if ( have_posts() ){
            echo '
            <div class="container">';
                do_action( 'woocommerce_before_single_product' );
            echo'
            </div>
            <div class="container">
                <section class="section">';
                    woocommerce_breadcrumb();
                    echo '
                </section>
            </div>';
        echo '
        <div class="container main-content">
            <section class="section">
                <ul class="product-list">';
                    while( have_posts() ){         
                        the_post();
                        get_template_part( 'templates/content', 'archive-product' );          
                    }
                echo '
                </ul>
            </section>
        </div>
        <div class="container">
            <section class="section">';
                the_post_pagination();
            echo '
            </section>
        </div>';
        } else {
            echo '
            <div class="container">
                <section class="section">
                    <p>' . esc_html__('Actualmente no hay artículos en esta tienda', 'pinplast') . '</p>
                </section>
            </div>';
        }
        
    echo '    
    </main>';

    get_footer();