<?php

get_header();

echo '
<main id="main">';
    while ( have_posts() ) :
        the_post();
        wc_get_template_part( 'content', 'single-product' );
    endwhile;
echo '
</main>';

get_footer();