<?php
/**
 * Single Product Gallery
 *
 * @package Knote
 */

/**
 * WC Hooks
 */
function knote_single_product_gallery_hooks() {
    if( ! is_product() ) {
        return;
    }

    $single_product_gallery = get_theme_mod( 'knote_single_product_gallery', 'default' );

    switch( $single_product_gallery ){
        case 'stack':
        case 'scrolling':
            remove_theme_support( 'wc-product-gallery-zoom' );
            remove_theme_support( 'wc-product-gallery-slider' );
            add_action( 'woocommerce_single_product_summary', function(){ echo '<div class="sticky-entry-summary">'; }, -99 );
            add_action( 'woocommerce_single_product_summary', function(){ echo '</div>'; }, 99 );
            add_filter( 'woocommerce_gallery_image_size', function(){ return 'woocommerce-single'; } );
            break;

        case 'vertical':
            add_action( 'woocommerce_single_product_summary', function(){ echo '<div class="sticky-entry-summary">'; }, -99 );
            add_action( 'woocommerce_single_product_summary', function(){ echo '</div>'; }, 99 );
            break;

        default:
            add_action( 'woocommerce_single_product_summary', function(){ echo '<div class="sticky-entry-summary">'; }, -99 );
            add_action( 'woocommerce_single_product_summary', function(){ echo '</div>'; }, 99 );
    }
}
add_action( 'wp', 'knote_single_product_gallery_hooks' );

/**
 * Single product top area wrapper
 */
function knote_single_product_wrap_before() {
	$single_product_gallery = get_theme_mod( 'knote_single_product_gallery', 'default' ); ?>
	<div class="product-gallery-summary <?php echo esc_attr( 'single-gallery-'.$single_product_gallery ); ?>">
        <div class="container">
            <div class="single-inner">
    <?php
}
add_action( 'woocommerce_before_single_product_summary', 'knote_single_product_wrap_before', -99 );

/**
 * Single product top area wrapper
 */
function knote_single_product_wrap_after() { ?>
            </div>
        </div>
	</div>
    <?php
}
add_action( 'woocommerce_after_single_product_summary', 'knote_single_product_wrap_after', 9 );

/**
 * Filter single product Flexslider options
 */
function knote_product_carousel_options( $options ) {

	$layout = get_theme_mod( 'knote_single_product_gallery', 'default' );

	if ( 'default' === $layout || 'vertical' === $layout ) {
		$options['controlNav'] = 'thumbnails';
		$options['directionNav'] = true;
	}

	return $options;
}
add_filter( 'woocommerce_single_product_carousel_options', 'knote_product_carousel_options' );
