<?php

function kenko_theme_custom_icons() {
    ?>
        <style>          
            /* iconos de redes sociales */
            /* blancos */
            .social .menu li a[href*="facebook"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/facebook-white.svg');}
            .social .menu li a[href*="twitter"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/twitter-white.svg');}
            .social .menu li a[href*="youtube"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/youtube-white.svg');}
            .social .menu li a[href*="instagram"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/instagram-white.svg');}
            .social .menu li a[href*="sites"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/google-white.svg');}
            /* oscuros */
            .social .menu li a[href*="facebook"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/facebook-dark.svg');}
            .social .menu li a[href*="twitter"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/twitter-dark.svg');}
            .social .menu li a[href*="youtube"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/youtube-dark.svg');}
            .social .menu li a[href*="instagram"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/instagram-dark.svg');}
            .social .menu li a[href*="sites"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/google-dark.svg');}
    <?php
}
add_action('wp_head', 'kenko_theme_custom_icons');