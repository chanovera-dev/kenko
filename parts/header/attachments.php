<?php
echo '<ul class="attachment-list">';
    if (is_plugin_active('yith-woocommerce-wishlist/init.php')) {
        echo 
        '<li>'.
            do_shortcode('[yith_wcwl_items_count]').
        '</li>';
    } else {}
    
    echo '<li>
        <a class="counter cart-customlocation" href="'; echo esc_url(wc_get_cart_url()); echo '">'.
            esc_html__('Carrito', 'kenko').'
            <div class="wrapper"><span class="parentesis">'.esc_html__('(', 'kenko').'</span><span class="number">'; echo sprintf ( WC()->cart->get_cart_contents_count() );  echo'</span><span class="parentesis">'.esc_html__(')', 'kenko').'</span></div>
        </a>
    </li>';
echo '</ul>';