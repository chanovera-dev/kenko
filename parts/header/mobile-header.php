<?php
echo '
<div class="container mobile-header">';
// include(TEMPLATEPATH . '/parts/header/menu-mobile.php');
    echo '
    <section class="section header-content">';
        include(TEMPLATEPATH . '/parts/header/menu-button.php');
        wp_nav_menu(
            array(
                'container' => 'nav', 
                'container_class' => 'primary', 
                'theme_location' => 'primary',
            ) 
        ); 
        include(TEMPLATEPATH . '/parts/header/brand.php');
        include(TEMPLATEPATH . '/parts/header/attachments.php');
    echo '
    </section>
</div>';