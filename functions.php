<?php

// carga componentes (estilos, javascript, etc) en el header
function load_components_header() {
    // Estilos globales
    wp_register_style( 'global', get_template_directory_uri() . '/style.css', '', 1, 'all' );
    wp_enqueue_style( 'global' );
}
add_action( 'wp_enqueue_scripts', 'load_components_header' );



// Carga componentes (estilos, javascript, etc) en el footer
function load_components_footer(){

}
add_action( 'get_footer', 'load_components_footer' );