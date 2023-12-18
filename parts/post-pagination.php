<?php

echo '
<div class="container pagination-wrapper">
    <section class="single-post-pagination">
        <div class="left">';
            $prev_post = get_previous_post();
            if ($prev_post) :
            echo '
            <a href="' . esc_url(get_permalink($prev_post->ID)); echo '" class="previous-post-link">
                <i class="nm-font nm-font-angle-thin-left"></i>
                <p class="pagination-indicator">' . esc_html__('Anterior', 'kenko') . '</p>
                <p class="title-post">' . esc_html($prev_post->post_title); echo '</p>
            </a>';
            endif;
        echo '
        </div>
        <div class="right">';
            $next_post = get_next_post();
            if ($next_post) :
            echo '
            <a href="' . esc_url(get_permalink($next_post->ID)); echo '" class="next-post-link">
                <i class="nm-font nm-font-angle-thin-left"></i>
                <p class="pagination-indicator">' . esc_html__('Siguiente', 'kenko') . '</p>
                <p class="title-post">' . esc_html($next_post->post_title); echo '</p>
            </a>';
            endif;
        echo '
        </div>
    </section>
</div>';