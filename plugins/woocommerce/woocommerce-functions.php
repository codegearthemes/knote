<?php
/**
 * WooCommerce functions
 *
 * @package Knote
 */
/**
 * Default single product components
 */
function knote_get_single_product_default_components() {
	$components = array(
		'woocommerce_template_single_title',
		'woocommerce_template_single_rating',
		'woocommerce_template_single_price',
		'woocommerce_template_single_add_to_cart',
		'knote_woocommerce_divider_output',
		'woocommerce_template_single_meta',
	);

	return apply_filters( 'knote_single_product_default_components', $components );
}

function knote_woocommerce_product_meta_start() { ?>
    <div class="block-product_meta <?php echo esc_attr( apply_filters( 'knote_woocommerce_meta_class', '' ) ); ?>">
<?php
}
add_action( 'woocommerce_product_meta_start', 'knote_woocommerce_product_meta_start' );

function knote_woocommerce_product_meta_end() { ?>
    </div>
<?php
}
add_action( 'woocommerce_product_meta_end', 'knote_woocommerce_product_meta_end' );

/**
 * Divider output
 */
function knote_woocommerce_divider_output() {
	echo '<hr class="divider">';
}

/**
 * Hook into Woocommerce
 */
function knote_woocommerce_hooks() {

    //Single product settings
	if ( is_product() ) {

        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

        $defaults 	= knote_get_single_product_default_components();
		$components = get_theme_mod( 'knote_single_product_elements_order', $defaults );

        foreach ( $components as $component ) {
            if( ! function_exists( $component ) ) {
                continue;
            }

            add_action( 'woocommerce_single_product_summary', $component, 5 );
        }

        //Woocommerce single
        $single_sku         = get_theme_mod( 'knote_single_product_sku', 0 );
        if( ! is_admin() && ! $single_sku ){
            add_filter( 'wc_product_sku_enabled', '__return_false' );
        }

        add_filter( 'knote_woocommerce_meta_class', 'knote_woocommerce_meta' );

        //Move sale tag
		// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );
		// add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 99 );

    }

}
add_action( 'wp', 'knote_woocommerce_hooks' );


function knote_woocommerce_meta() {
    $single_tags 	 	= get_theme_mod( 'knote_single_product_tags', 0 );
    $single_categories  = get_theme_mod( 'knote_single_product_categories', 0 );

    $meta_class = '';
    if( ! $single_tags ){
        $meta_class .= 'hide-tags';
    }

    if( ! $single_categories ){
        $meta_class .= ' hide-categories';
    }

    return $meta_class;
}

function knote_woocommerce_product_card_class( $classes ) {

    if ( 'product' == get_post_type() ) {

        $layout     = get_theme_mod( 'knote_woocommerce_product_card_layout', 'default' );
        $card_align = get_theme_mod( 'knote_woocommerce_product_card_alignment', 'center');

        $purchase_layout = get_theme_mod( 'knote_woocommerce_product_card_purchase_layout', 'secondary' );

        $flex_align = $card_align;
        if( $flex_align == 'right' ){
            $flex_align = 'end';
        }

        $classes = array_diff( $classes, array( 'last','first' ) );
        $classes[] = 'product-card swiper-slide';
        $classes[] = "product-card-".$layout;
        $classes[] = "text-".$card_align;
        $classes[] = "flex-".$flex_align;
        $classes[] = "purchase-".$purchase_layout;
    }
    return $classes;

}
add_filter( 'woocommerce_post_class', 'knote_woocommerce_product_card_class', 21, 3 );

function knote_woocommerce_category_class( $classes ) {

    if ( 'product' == get_post_type() ) {
        $classes = array_diff( $classes, array( 'last','first' ) );
    }
    return $classes;

}
add_filter( 'product_cat_class', 'knote_woocommerce_category_class', 21, 3 );

function knote_woocommerce_cart_icon(){

    $knote_cart_icon = 'icon-bag';
    if( defined( 'KNOTE_PREMIUM_VERSION' ) ){
        $knote_cart_icon = get_theme_mod( 'knote_header_component_cart_icons', 'icon-bag' );
    }

    if( $knote_cart_icon == 'icon-text' ){ ?>
        <span class="text"><?php esc_html_e( 'cart', 'knote' ); ?></span>
    <?php
    }else{
        knote_get_svg_icon( $knote_cart_icon, true, false );
    }
}
add_action( 'knote_minicart_icons', 'knote_woocommerce_cart_icon', 10);

