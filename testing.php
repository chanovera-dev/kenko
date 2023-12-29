<?php /* template name: Testing */
get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section sections-filters">';
        $taxonomy = 'product_cat';
        $categories = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ));
        
        echo '<ul class="categories-list">
            <li><a class="category-list_item active" href="#!" data-slug="">' . esc_html__('Todo', 'kenko') . '</a></li>';
        
        foreach($categories as $category) :
            echo '
            <li><a class="category-list_item" href="#!" data-slug="' . $category->slug . '">' . $category->name . '</a></li>';
        endforeach;
        
        echo '</ul>
        
        </section>
    </div>
    <div class="container">
        <section class="section sections-products">';

            $get_creators = new WP_Query([
            'post_type' => 'creators',
            'posts_per_page' => -1,
            ]);
            
            if ($get_creators->have_posts()): ?>
            <h4 class="filter-title"><?= _e('Creators','kenko'); ?></h4>
            <ul class="list-filters">
                <?php while ($get_creators->have_posts()):$get_creators->the_post(); ?>
                
                <li>
                    <a href="javascript:;" class="filter-link" data-type="creators" data-id="<?= get_the_ID(); ?>">
                    <?= esc_html(get_the_title()); ?>
                    <span class="remove"><i class="fas fa-times"></i></span>
                    </a>
                </li>
            
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
            <?php endif;
        echo '
        </section>
    </div>
</main>';

get_footer();