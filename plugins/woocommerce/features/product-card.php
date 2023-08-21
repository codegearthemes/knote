<?php
/**
 * Product Card
 *
 * @package Knote
 */

/**
 * Hooks
 */
function knote_product_card_hooks() {

    $layout             = get_theme_mod( 'knote_woocommerce_product_card_layout', 'default' );
    $purchase_layout    = get_theme_mod( 'knote_woocommerce_product_card_purchase_layout', 'secondary' );

    //Remove product title, rating, price
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

    //Card Wrapper
    add_action( 'woocommerce_before_shop_loop_item', 'knote_product_card_start', -1 );
    add_action( 'woocommerce_after_shop_loop_item', 'knote_product_card_end', 120 );

    //Media Wrapper
    add_action( 'woocommerce_before_shop_loop_item_title', 'knote_product_card_media_start', 5 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'knote_product_card_media_end', 30 );

    add_action( 'woocommerce_before_shop_loop_item_title', 'knote_product_card_content_before', 50 );
    add_action( 'woocommerce_after_shop_loop_item_title', 'knote_product_card_content_after', 50 );
    add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 100);

    if( $purchase_layout != 'hidden' ){
        add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 101);
    }

}
add_action( 'wp', 'knote_product_card_hooks', 5 );

/**
 * Loop product structure
 */
function knote_loop_product_structure() {

	$priority = 20;
    $elements 	= get_theme_mod( 'knote_woocommerce_product_card_elements', array( 'title', 'price' ) );

    foreach ( $elements as $element ) {
        switch ( $element ) {
            case 'brand':
                add_action( 'woocommerce_shop_loop_item_title', 'knote_products_loop_brand', $priority );
                break;
            case 'title':
                add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', $priority );
                break;
            case 'price':
                add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', $priority );
                break;
            case 'review':
                add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', $priority );
                break;
            case 'category':
                add_action( 'woocommerce_shop_loop_item_title', 'knote_products_loop_category', $priority );
                break;
        }

        $priority++;

    }
}
add_action( 'wp', 'knote_loop_product_structure', 10 );

function knote_product_card_start(){ ?>
    <div class="product-card-inner">
<?php
}

function knote_product_card_end(){ ?>
    </div>
<?php
}

function knote_product_card_media_start() { ?>
    <div class="card-media">
<?php
}

function knote_product_card_media_end() { ?>
    </div>
    <?php
    }

function knote_product_card_content_before(){
    $alignment = get_theme_mod( 'knote_woocommerce_product_card_alignment', 'center' );
    ?>
    <div class="card-content text-<?php echo esc_attr( $alignment ); ?>">
        <div class="item-content__inner">
    <?php
}

function knote_product_card_content_after(){ ?>
        </div>
    </div>
    <?php
}

/**
 * Product brand
 */
function knote_products_loop_brand(){

}

/**
 * Product category
 */
function knote_products_loop_category(){

}

/**
 * Product Classes
 */
function knote_product_card_content_class( $classes ) {
	return $classes;
}

add_action( 'wp', function(){
	if ( is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy() ) {
		add_filter( 'knote_content_class', 'knote_product_card_content_class' );
	}
} );


/**
 * Pass through all the legacy WooCommerce shortcodes to handle attributes
 */
$knote_woocommerce_shortcodes = array(
	'products',
	'sale_products',
	'recent_products',
	'related_products',
	'featured_products',
	'top_rated_products',
	'best_selling_products',
);

foreach( $knote_woocommerce_shortcodes as $knote_shortcode ) {
	add_filter( "shortcode_atts_{$knote_shortcode}", function( $atts ){

		// Always product grid layout
		$atts[ 'class' ] = 'product-grid product-card';

		return $atts;
	} );
}
