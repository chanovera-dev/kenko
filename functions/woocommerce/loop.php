<?php

// A J U S T E S   A L   L O O P   D E   W O O C O M M E R C E

// quita el contenedor inferior del link de la plantilla del loop de woocommerce
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

// lo coloca debajo de la foto
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11);



// agrega un contenedor para la info del producto
function contenedor_antes_del_titulo() {
	echo '<div class="content">';
}
add_action('woocommerce_shop_loop_item_title', 'contenedor_antes_del_titulo', 8);

function contenedor_despues_de_todo() {
	echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'contenedor_despues_de_todo', 6);



function contenedor_link_arriba_titulo() {
    echo '<a class="title-wrapper" href="' . esc_url( get_permalink( $loop->post->ID ) ) . '">';
}
add_action('woocommerce_shop_loop_item_title', 'contenedor_link_arriba_titulo', 9);

function contenedor_link_debajo_titulo() {
    echo '</a>';
}
add_action('woocommerce_shop_loop_item_title', 'contenedor_link_debajo_titulo', 11);


// agregar botón de wishlist
function boton_wishlist() {
    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
}
add_action('woocommerce_after_shop_loop_item', 'boton_wishlist', 5);



// agregar link al producto con mensaje de mostrar más
function mostrar_mas() {
    echo '<a class="show-more" href="' . esc_url( get_permalink( $loop->post->ID ) ) . '">' . esc_html('Mostrar más', 'kenko') . '</a>';
}
add_action('woocommerce_after_shop_loop_item', 'mostrar_mas', 4);



// desactiva el mensaje de oferta
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);



// desactivar la calificación
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);



// mostrar solamente el precio final
    // Elimina la etiqueta de precio regular
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

    // Añade la etiqueta de precio final
    add_action('woocommerce_after_shop_loop_item_title', 'custom_display_final_price', 10);
    function custom_display_final_price() {
        global $product;

        // Obtiene el precio final
        $final_price = wc_get_price_to_display($product);

        // Muestra el precio final
        echo '<span class="price">' . wc_price($final_price) . '</span>';
    }



// desactivar los botones de agregar al carrito y seleccionar opciones
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);



function cambiar_aspect_ratio_miniatura_woocommerce() {
    // Obtenemos las configuraciones actuales de tamaño de miniaturas
    $thumbnail_size = wc_get_image_size('woocommerce_thumbnail');

    // Cambiamos el aspect ratio (ancho/alto) a 4:5
    $thumbnail_size['width'] = 4;
    $thumbnail_size['height'] = 5;
    $thumbnail_size['crop'] = 1; // Puedes ajustar esto según tus necesidades (1 para recortar, 0 para redimensionar)

    // Aplicamos las nuevas configuraciones
    add_filter('woocommerce_get_image_size_woocommerce_thumbnail', function ($size) use ($thumbnail_size) {
        return $thumbnail_size;
    });
}

// Aplicamos la función al gancho 'after_setup_theme'
add_action('after_setup_theme', 'cambiar_aspect_ratio_miniatura_woocommerce');
