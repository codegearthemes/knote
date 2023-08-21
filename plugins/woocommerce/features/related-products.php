<?php
/**
 * Related Products
 *
 * @package Knote
 */

/**
 * Hooks
 */
function knote_related_products_hooks() {
    $related_products           = get_theme_mod( 'knote_single_product_related_products', 1 );
	$related_products_position  = apply_filters( 'knote_single_related_products_order', 20 );

    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

    if( $related_products ){
        $knote_related_products_slider  =  get_theme_mod( 'knote_single_product_related_products_slider', 0 );
        if( $knote_related_products_slider ) {
            add_action( 'woocommerce_after_single_product_summary', 'knote_woocommerce_output_related_products_slider', $related_products_position );
        }else{
            add_action( 'woocommerce_after_single_product_summary', 'knote_woocommerce_output_related_products_slider', $related_products_position );
        }
    }
}
add_action( 'wp', 'knote_related_products_hooks' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function knote_woocommerce_related_products_args( $args ) {

    $knote_columns            = get_theme_mod( 'knote_related_products_column', 4 );
	$knote_products_count     = get_theme_mod( 'knote_related_products_count', 4 );

	$defaults = array(
        'columns'        => $knote_columns,
		'posts_per_page' => $knote_products_count,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'knote_woocommerce_related_products_args' );

/**
 * Related products as slider
 */
function knote_woocommerce_output_related_products_slider( $args = array() ) {
	global $product;

	if ( ! $product ) {
		return;
	}

    $columns        = get_theme_mod( 'knote_related_products_column', 4 );
	$knote_products_count = get_theme_mod( 'knote_related_products_count', 4 );
	$knote_product_slider_nav 	= get_theme_mod( 'knote_related_products_slider_nav', 'show' );
    $knote_products_count                 = get_theme_mod( 'knote_single_product_related_products_count', 4 );

	$defaults = array(
		'posts_per_page' => $knote_products_count,
		'orderby'        => 'rand',
		'order'          => 'desc'
	);

	$args = wp_parse_args( $args, $defaults );

	// Get visible related products then sort them at random.
	$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

	// Handle orderby.
	$products = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

	if( count( $products ) === 0 ) {
		return;
	} ?>

	<section class="related-products">
        <div class="<?php echo esc_attr( apply_filters( 'knote_woocommerce_container_class', 'container' ) ); ?>">
            <?php
                $heading = apply_filters( 'knote_woocommerce_related_products_heading', __( 'Related Products', 'knote' ) );

                if ( $heading ) : ?>
                    <h2 class="heading"><?php echo esc_html( $heading ); ?></h2>
                <?php endif; ?>

                <?php

                $wrapper_atts = array();
                $wrapper_classes = ['related--products-inner'];

                $wrapper_classes[] = 'slider-items slider-carousel-items';

                if( $knote_product_slider_nav === 'show' ) {
                    $wrapper_classes[] = 'slider--items-navshow';
                }

                $wrapper_atts[] = 'data-per-page="'. absint( $columns ) .'"';

                // Mount related posts wrapper class
                $wrapper_atts[] = 'class="'. esc_attr( implode( ' ', $wrapper_classes ) ) .'"';
                ?>

                <div <?php echo esc_attr( implode( ' ', $wrapper_atts ) ); ?> >
                    <ul class="products columns-<?php echo absint( $columns ) ?>">
                        <?php
                            foreach ( $products as $item ) :

                                $post_object = get_post( $item->get_id() );
                                setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                wc_get_template_part( 'content', 'product' );

                            endforeach;
                        ?>
                    </ul>
                </div>
        </div>
	</section>
	<?php
}
