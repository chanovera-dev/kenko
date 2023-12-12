<?php

    echo '
    <article class="post">';

    if ( has_post_thumbnail() == false ) :
        
    else:
        echo '
        <a class="permalink" href="'; the_permalink(); echo '" target="_blank">
            <img class="thumbnail" src="'; the_post_thumbnail_url( 'media' ); echo '" alt="Imagen del artículo" loading="lazy" width="300" height="200">
        </a>';
    endif;

    echo '
    <div class="publicate-date">' . get_the_date() . '</div>';
    the_title('<h2 class="title">', '</h2>');
    the_excerpt();
    echo '
        <a class="permalink" href="'; the_permalink(); echo '" target="_blank">'; 
            echo esc_html__('Ver más') . 
            '
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>'.
        '</a>';
              
    echo '
    </article>';