<?php
        echo '
        <footer id="main-footer" class="container">
            <section class="section">';
            $menu_tertiary_id = get_nav_menu_locations()['tertiary'];
            $menu_tertiary = wp_get_nav_menu_object($menu_tertiary_id);
            $items_tertiary = wp_get_nav_menu_items($menu_tertiary_id);

            if (!empty($items_tertiary)) {
                wp_nav_menu(
                    array(
                        'container' => 'nav',
                        'container_class' => 'tertiary',
                        'theme_location' => 'tertiary',
                    )
                );
            }
            echo '<p>©'.date("Y").esc_html__(' Kenko', 'kenko').' - '.esc_html__('Desarrollado y hospedado por ', 'kenko').'<a href="https://peramanzana.com">PeraManzana</a></p>';
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
