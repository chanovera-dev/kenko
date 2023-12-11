<?php

// Estilos para todos los artículos
function kenko_single_styles() {
    if ( is_single() ) {
        wp_enqueue_style( 'single-styles', get_template_directory_uri() . '/assets/css/single.css' );
        wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'kenko_single_styles' );

// Estilos para la página archivo
function archive_styles() {
    if ( is_home() or is_page_template('home.php') or is_archive() or is_search() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_enqueue_style( 'blog-styles', get_template_directory_uri() . '/assets/css/blog.css' );
        wp_enqueue_style( 'pagination-styles', get_template_directory_uri() . '/assets/css/pagination.css' );
        wp_enqueue_script('jquery');
        wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/ajax-blog.js', array('jquery'), null, true);
        // Pasa la URL de admin-ajax.php a script.js
        wp_localize_script('custom-script', 'ajax_params', array('ajax_url' => admin_url('admin-ajax.php')));
    }
}
add_action( 'wp_enqueue_scripts', 'archive_styles' );