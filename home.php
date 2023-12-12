<?php
get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section">';

            echo '
            <div class="ajax-filters">
                <form id="ajax-filter">';
                    $categories = get_terms(
                        array(
                            'taxonomy' => 'category',
                            'orderby'  => 'name',
                        )
                    );
                    if ($categories) :
                        echo '
                        <div>
                            <label>
                                <input type="radio" name="category" value="all" checked>Todas las categorías
                            </label>';
                            
                            foreach ($categories as $category) :
                                echo '
                                <label>
                                    <input type="radio" name="category" value="' . $category->term_id . '">' .
                                    $category->name . '
                                </label>';
                            
                            endforeach;
                        echo '
                        </div>';
                    endif;
                echo '
                </form>
            </div>';
        

    
                
            // if ( have_posts() ){           
            //     echo '
            //     <div class="posts">';
                    

            //         while( have_posts() ){            
            //             the_post();  
            //             get_template_part( 'templates/content', 'archive' );    
            //         }

            //         echo '
                    
            //     </div>';     
            // } else {
            //     echo '<p>' . esc_html__('No se encontraron artículos', 'kenko') . '</p>';
            // }

            // the_posts_pagination();
            
        echo '
        </section>
    </div>
</main>';
    
get_footer();