<?php
echo '
<main id="main">
    <div class="container">
        <article class="section">';
            the_title('<h1 class="title">','</h1>');
            echo '
            <img src="'; the_post_thumbnail_url( 'full' ); echo '" alt="'.esc_html__('Imagen destacada', 'kenko').'">';
            the_content();
        echo '
        </article>
    </div>
</main>'; 