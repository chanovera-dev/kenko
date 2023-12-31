<?php /* Template name: Wishlist */
    get_header();
    
    echo 
    '<main id="main">
        <div class="container main-content">
            <section class="section padding-section product-cart">';
                the_content();
            echo 
            '</section>
        </div>
    </main>';

    get_footer();