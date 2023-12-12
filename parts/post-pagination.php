<?php

echo '
<div class="container pagination-wrapper">
    <section class="single-post-pagination">
        <div class="left">';
            $prev_post = get_previous_post();
            if ($prev_post) :
            echo '
            <a href="' . esc_url(get_permalink($prev_post->ID)); echo '" class="previous-post-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <p class="pagination-indicator">' . esc_html__('Siguiente', 'kenko') . '</p>
                <p class="title-post">' . esc_html($next_post->post_title); echo '</p>
            </a>';
            endif;
        echo '
        </div>
    </section>
</div>';