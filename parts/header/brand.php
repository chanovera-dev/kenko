<?php
    echo '<div class="site-brand">';
        if ( has_custom_logo() == false ) :
            echo '<a href="'.get_home_url().'">';
                bloginfo( 'title' );
            echo '</a>';
            else:
            the_custom_logo();
        endif;
    echo '</div>';