<?php

if ( ! function_exists( 'knote_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function knote_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		knote_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'knote_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'knote_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function knote_woocommerce_cart_link() {
		$knote_icon_class = get_theme_mod( 'knote_header_component_cart_icons', 'icon-bag' ); ?>
		<a class="cart-contents <?php echo esc_attr( $knote_icon_class ); ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'knote' ); ?>">
			<?php
				$item_count_text = sprintf(
					/* translators: number of items in the mini cart. */
					_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'knote' ),
					WC()->cart->get_cart_contents_count()
				);
			?>
			<?php do_action('knote_minicart_icons'); ?>
			<?php if( $knote_icon_class == 'icon-text' ): ?>
				<span class="count" cart-count-bubble>(<?php echo absint ( WC()->cart->get_cart_contents_count() ); ?>)</span>
			<?php else: ?>
				<span class="count" cart-count-bubble><?php echo absint ( WC()->cart->get_cart_contents_count() ); ?></span>
			<?php endif; ?>
			<span class="amount screen-reader-text" cart-amount-bubble><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'knote_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function knote_woocommerce_header_cart() {
		$class = 'cart-item';
		if ( is_cart() ) {
			$class = 'current-menu-item cart-item';
		}
		?>

        <?php if( class_exists( 'KnotePro' ) ): ?>
            <?php do_action( 'knote_minicart' ); ?>
        <?php else: ?>
            <div class="block-minicart">
                <div id="site-header-cart" class="header-mincart">
                    <div class="<?php echo esc_attr( $class ); ?> js-drawer-open-right" data-cart-bubble>
                        <?php knote_woocommerce_cart_link(); ?>
                    </div>
                    <?php if( !is_cart() ){ ?>
                        <?php do_action('knote_before_minicart'); ?>
                            <div id="header--widget-cart" class="header--widget-cart" data-widget-minicart-inner>
                                <div class="widget--cart-inner">
                                    <?php
                                        $instance = array(
                                            'title' => '',
                                        );
                                        the_widget( 'WC_Widget_Cart', $instance );
                                    ?>
                                </div>
                            </div>
                        <?php do_action('knote_after_minicart'); ?>
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>
    <?php
	}
}
