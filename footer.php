<?php
        echo '
        <footer id="main-footer" class="container">
            <section class="section footer-content">';

            $menu_secondary_id = get_nav_menu_locations()['secondary'];
            $menu_secondary = wp_get_nav_menu_object($menu_secondary_id);
            $items_secondary = wp_get_nav_menu_items($menu_secondary_id);

            if (!empty($items_secondary)) {
                wp_nav_menu(
                    array(
                        'container' => 'nav',
                        'container_class' => 'secondary',
                        'theme_location' => 'secondary',
                    )
                );
            }

            echo '<p>© '. bloginfo( 'name' ) . ' · ' . date("Y") . '</p>';

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
            </section>
        </footer>';
        wp_footer();
    echo '
    </body>
</html>';
