<?php /* template name: Testing */
get_header();

echo '
<main id="main">
    <div class="container">
        <section class="section sections-filters">
            <div class="filter--sidebar">
                <input type="hidden" id="filters-category" />
                <input type="hidden" id="filters-creators" />';
            
                // or use include_once('parts/filter-pricerange.php');
                get_template_part('parts/filter','pricerange');
            
                get_template_part('parts/filter','categories');
                
                get_template_part('parts/filter','creators');
            echo '
            </div>
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