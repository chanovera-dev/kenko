<div id="cart-panel">
    <button id="close-panels" class="close-panels" onclick="closePanels()"><?php echo esc_html__('Cerrar', 'kenko'); ?></button>
    <?php if ( is_active_sidebar('mini-cart-sidebar') ) { dynamic_sidebar('mini-cart-sidebar'); } ?>
</div>