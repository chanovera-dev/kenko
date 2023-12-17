<?php
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
    if (is_plugin_active('woocommerce/woocommerce.php')) {
        echo '
        <li class="cart-wrapper">
            <a class="counter cart-customlocation" href="'; echo esc_url(wc_get_cart_url()); echo '">'.
                esc_html__('Carrito', 'kenko').'
                <div class="wrapper"><span class="parentesis">'.esc_html__('(', 'kenko').'</span><span class="number">'; echo sprintf ( WC()->cart->get_cart_contents_count() );  echo'</span><span class="parentesis">'.esc_html__(')', 'kenko').'</span></div>
            </a>
        </li>';
    } else {}
    echo '
    </ul>
</nav>';