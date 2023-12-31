<?php
get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section">';

            the_archive_title( '<h1 class="title-section">', '</h1>' );
                
            if ( have_posts() ){           
                echo '
                <div class="posts">';
                    

                    while( have_posts() ){            
                        the_post();  
                        get_template_part( 'templates/content', 'archive' );    
                    }

                    echo '
                    
                </div>';     
            } else {
                echo '<p>' . esc_html__('No se encontraron coincidencias', 'kenko') . '</p>';
            }

            the_posts_pagination();
            
        echo '
        </section>
    </div>
</main>';
    
get_footer();