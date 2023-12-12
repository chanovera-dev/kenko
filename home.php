<?php get_header(); ?>

<main id="main">
    <div class="container">
        <section class="section">';

        <?php $categories = get_categories(); ?>
        <ul class="cat-list">
            <li><a class="cat-list_item active" href="#!" data-slug="">All projects</a></li>

            <?php foreach($categories as $category) : ?>
                <li>
                    <a class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">
                        <?= $category->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
            
        
    
            <?php

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

            ?>
        
        </section>
    </div>
</main>';
    
<?php get_footer(); ?>