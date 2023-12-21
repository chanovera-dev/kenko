<?php

get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section">';
            while ( have_posts() ) :
                the_post();
                wc_get_template_part( 'content', 'single-product' );
            endwhile;
        echo '
        </section>
    </div>
</main>';

get_footer();