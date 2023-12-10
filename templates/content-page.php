<?php
echo '
<main id="main">
    <div class="container">
        <article class="section">';
            the_title('<h1 class="title">','</h1>');
            if ( has_post_thumbnail() == false ) :
        
            else:
                echo '
                <img class="thumbnail" src="'; the_post_thumbnail_url( 'full' ); echo '" alt="Imagen del artículo" loading="lazy" width="300" height="200">';
            endif;
            the_content();
        echo '
        </article>
    </div>
</main>'; 