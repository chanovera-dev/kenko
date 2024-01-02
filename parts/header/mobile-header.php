<?php
echo '
<div class="container mobile-header">';
include(TEMPLATEPATH . '/parts/header/menu-mobile.php');
    echo '
    <section class="section header-content">';
        include(TEMPLATEPATH . '/parts/header/menu-button.php');
        $menu_primary_id = get_nav_menu_locations()['primary'];
        $menu_primary = wp_get_nav_menu_object($menu_primary_id);
        $items_primary = wp_get_nav_menu_items($menu_primary_id);
        if (!empty($items_primary)) {
            wp_nav_menu(
                array(
                    'container' => 'nav',
                    'container_class' => 'primary',
                    'theme_location' => 'primary',
                )
            );
        }
        include(TEMPLATEPATH . '/parts/header/brand.php');
        include(TEMPLATEPATH . '/parts/header/attachments.php');
    echo '
    </section>
</div>';