<?php

echo '
<!DOCTYPE html>
<html '; language_attributes(); echo '>
    <head>
        <meta charset="'; bloginfo( 'charset' ); echo '">
        <meta name="description" content="'; bloginfo( 'description' ); echo '">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">';
        wp_head();
    echo '
    </head>
    <body id="body" '; body_class(); echo '>
        <div id="panel-overlay" onclick="closePanels()"></div>';
        include(TEMPLATEPATH . '/parts/sidebars/cart-panel.php'); 
        echo '
        <header id="main-header" class="container main-header">';
            include(TEMPLATEPATH . '/parts/header/mobile-header.php');
        echo '
        </header>';