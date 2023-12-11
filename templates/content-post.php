<?php
echo '
<main id="main">
    <div class="container post-wrapper">';

        if ( has_post_thumbnail() == false ) :
        else:
            echo '<img class="featured-picture" src="'; the_post_thumbnail_url( 'full' ); echo '" alt="'.esc_html__('Imagen destacada', 'kenko').'">';
        endif;

        echo '
        <section class="section">

            <article class="post">';
                the_title('<h1 class="title">','</h1>');
                echo '
                <div class="author-and-date">' . esc_html__('Escrito por ', 'kenko'). '<span>'; the_author(); echo '</span>' . esc_html__(' en ', 'kenko') . get_the_date() . '</div>';
                the_content();
                echo '
            </article>';

            include(TEMPLATEPATH . '/parts/sidebars/sidebar-post.php');

        echo '
        </section>
    </div>';
    
    include(TEMPLATEPATH . '/parts/sidebars/post-pagination.php');

    echo '
    <div class="container comments-wrapper">
        <section class="section comments-section">';
            comments_template();
        echo '
        </section">
    </div>
</main>';