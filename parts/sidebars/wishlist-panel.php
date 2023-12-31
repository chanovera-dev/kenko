<div id="wishlist-panel">
    <button id="close-panels" class="close-panels" onclick="closePanels()"><?php echo esc_html__('Cerrar', 'kenko'); ?></button>
    <?php if ( is_active_sidebar('wishlist-sidebar') ) { dynamic_sidebar('wishlist-sidebar'); } ?>
</div>