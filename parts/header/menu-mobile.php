<?php
echo '
<div class="menu-mobile">';

    $menu_mobile_id = get_nav_menu_locations()['mobile'];
    $menu_mobile = wp_get_nav_menu_object($menu_mobile_id);
    $items_mobile = wp_get_nav_menu_items($menu_mobile_id);

    if (!empty($items_mobile)) {
        wp_nav_menu(
            array(
                'container' => 'nav',
                'container_class' => 'mobile',
                'theme_location' => 'mobile',
            )
        );
    }

    echo '
    <nav class="attachment-nav">
        <ul class="attachment-list">';
        if (is_plugin_active('woocommerce/woocommerce.php')) {
            echo '
            <li class="sign-in-wrapper">
                <a href="' . esc_url(home_url('/mi-cuenta')) . '">' . esc_html__('Acceso', 'kenko') . '</a>
            </li>';
        } else {}
        if (is_plugin_active('yith-woocommerce-wishlist/init.php')) {
            echo '
            <li class="wishlist-wrapper">'.
                do_shortcode('[yith_wcwl_items_count]').'
            </li>';
        } else {}
        echo '
        </ul>
    </nav>';

    $menu_social_id = get_nav_menu_locations()['social'];
    $menu_social = wp_get_nav_menu_object($menu_social_id);
    $items_social = wp_get_nav_menu_items($menu_social_id);

    if (!empty($items_social)) {
        wp_nav_menu(
            array(
                'container' => 'nav',
                'container_class' => 'social',
                'theme_location' => 'social',
            )
        );
    }

echo '    
</div>';