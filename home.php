<?php
get_header();

    echo '
    <main id="main">
        <div class="container">
            <section class="section">

            <div id="category-buttons">';
            
                $categories = get_categories();
            
                foreach ($categories as $category) {
                    echo '<button class="category-button" data-category="' . $category->slug . '">' . $category->name . '</button>';
                }
            echo '
            </div>
            
            <div id="post-list">';
    
                $default_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                );
            
                $default_query = new WP_Query($default_args);
            
                if ($default_query->have_posts()) :
                    while ($default_query->have_posts()) : $default_query->the_post();
                        // Mostrar el contenido de la entrada aquí
                        the_title('<h2>', '</h2>');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo 'No hay entradas disponibles.';
                endif;

            echo '
            </div>';

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
                    echo '<p>' . esc_html__('No se encontraron artículos', 'kenko') . '</p>';
                }

                the_post_pagination();
                
            echo '
            </section>
        </div>
    </main>';
    
get_footer();