<?php
get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section">';

        echo '<h1 class="title-section">' . esc_html__('Resultados de búsqueda para: ', 'kenko'); echo the_search_query(); echo '</h1>';
                
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