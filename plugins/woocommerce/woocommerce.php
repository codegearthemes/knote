<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Knote
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function knote_woocommerce_setup() {


	$enable_zoom 	= get_theme_mod( 'knote_single_product_zoom_effects', 1 );
	$enable_gallery = get_theme_mod( 'knote_single_product_gallery_slider', 1 );

	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 320,
			'single_image_width'    => 768,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);

	if( $enable_zoom ){
		add_theme_support( 'wc-product-gallery-zoom' );
	}

	if( $enable_gallery ){
		add_theme_support( 'wc-product-gallery-slider' );
	}

	add_theme_support( 'wc-product-gallery-lightbox' );

	/**
	 * Functions which enhance the theme by hooking into WordPress.
	 */
	require KNOTE_THEME_DIR . 'plugins/woocommerce/woocommerce-functions.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require KNOTE_THEME_DIR . 'plugins/woocommerce/features/mini-cart.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require KNOTE_THEME_DIR . 'plugins/woocommerce/features/wc-page-header.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require KNOTE_THEME_DIR . 'plugins/woocommerce/features/product-card.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require KNOTE_THEME_DIR . 'plugins/woocommerce/features/sale-badge.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require KNOTE_THEME_DIR . 'plugins/woocommerce/features/single-product-gallery.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require KNOTE_THEME_DIR . 'plugins/woocommerce/features/single-product-tabs.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	require KNOTE_THEME_DIR . 'plugins/woocommerce/features/related-products.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require KNOTE_THEME_DIR . 'plugins/woocommerce/features/recently-viewed-products.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

}
add_action( 'after_setup_theme', 'knote_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function knote_woocommerce_scripts() {
	$min = '';
	$minified = get_theme_mod( 'knote_load_minified_assets', 0 );
	if( $minified ){
		$min = '.min';
	}

	wp_enqueue_style( 'knote-woocommerce-style', get_template_directory_uri() . '/assets/public/css/woocommerce/woocommerce'.$min.'.css', array(), KNOTE_VERSION);

	if( is_checkout() ){
		wp_enqueue_style( 'knote-woocommerce-checkout-style', get_template_directory_uri() . '/assets/public/css/woocommerce/checkout'.$min.'.css', array(), KNOTE_VERSION );
	}

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'knote-woocommerce-style', $inline_font );

}
add_action( 'wp_enqueue_scripts', 'knote_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function knote_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'knote_woocommerce_active_body_class' );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );

/**
 * Loop shop columns callback
 */
function knote_shop_loop_columns() {
	$columns_desktop = get_theme_mod( 'knote_woocommerce_catalog_columns_desktop', 4 );
	return $columns_desktop;
}
add_filter( 'loop_shop_columns', 'knote_shop_loop_columns' );

/**
 * Loop shop rows callback
 */
function knote_shop_loop_per_page() {
	$rows    = get_theme_mod( 'knote_woocommerce_catalog_rows', 4 );
	$columns = get_theme_mod( 'knote_woocommerce_catalog_columns_desktop', 4 );
	return $columns * $rows;
}
add_filter( 'loop_shop_per_page', 'knote_shop_loop_per_page' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'knote_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function knote_woocommerce_wrapper_before() { ?>
		<div class="content-inner content--woocommerce-inner <?php echo esc_attr( apply_filters( 'knote_woocommerce_class', '' ) ); ?>">
			<div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
				<div class="grid">
					<div id="primary" class="grid__item one-whole <?php echo esc_attr( apply_filters( 'knote_content_class', '' ) ); ?>content-area">
						<main id="main" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'knote_woocommerce_wrapper_before' );

if ( ! function_exists( 'knote_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function knote_woocommerce_wrapper_after() {
		?>
						</main><!-- #main -->
					</div>
					<?php do_action( 'knote_sidebar_shop' ); ?>
				</div>
			</div>
		</div>
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'knote_woocommerce_wrapper_after' );

if ( ! function_exists( 'knote_woocommerce_product_class' ) ) {
	function knote_woocommerce_product_class() {
		if( is_product() ){
			return 'main-content main-container';
		}

		return get_theme_mod( 'knote_website_container', 'container' );
	}
}
add_filter( 'knote_container_class', 'knote_woocommerce_product_class' );

if ( ! function_exists( 'knote_woocommerce_container_class_cb' ) ) {
	function knote_woocommerce_container_class_cb() {
		return get_theme_mod( 'knote_website_container', 'container' );
	}
}
add_filter( 'knote_woocommerce_container_class', 'knote_woocommerce_container_class_cb' );

add_action( 'woocommerce_before_single_product_summary', 'knote_single_product_wrapper_start', 0);
function knote_single_product_wrapper_start(){ ?>
	<div class="single-product__gallery single-product__content">
		<div class="single-product__main">
<?php
}

add_action( 'woocommerce_before_single_product_summary', 'knote_single_product_wrapper_end', 100);
function knote_single_product_wrapper_end(){ ?>
	</div>
<?php
}


add_action( 'woocommerce_after_single_product_summary', 'knote_single_product_wrapper_end', 0);
function knote_single_product_after_summery(){ ?>
	</div>
<?php
}


add_action( 'woocommerce_checkout_before_order_review_heading', 'knote_woocommerce_before_order_review', 5);
function knote_woocommerce_before_order_review(){ ?>
	<div class="block-order-review">
	<?php
}

add_action( 'woocommerce_checkout_after_order_review', 'knote_woocommerce_after_order_review', 100);
function knote_woocommerce_after_order_review(){ ?>
	</div>
<?php
}

add_action( 'woocommerce_after_quantity_input_field', 'knote_product_quantity_start', 10);
function knote_product_quantity_start(){ ?>
	<button type="button" class="plus" name="plus">
		<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"  width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-plus">
			<line x1="12" y1="5" x2="12" y2="19"/>
			<line x1="5" y1="12" x2="19" y2="12"/>
		</svg>
	</button>
<?php
}

add_action( 'woocommerce_before_quantity_input_field', 'knote_product_quantity_end', 10);
function knote_product_quantity_end(){ ?>
	<button type="button" class="minus" name="minus">
		<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-minus">
			<line x1="5" y1="12" x2="19" y2="12"/>
		</svg>
	</button>
<?php
}

if( ! function_exists('knote_woocommerce_header_account') ){
	/**
	 * Display Header Account.
	 *
	 * @return void
	 */
	function knote_woocommerce_header_account(){ ?>
		<div class="block-account">
			<a class="account-item wc-account-link" href=" <?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) ?> " title=" <?php echo esc_html__( 'Account', 'knote' ) ?> ">
				<svg width="21" height="21" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.29686 33.1524C11.0027 30.4302 14.1724 28.4421 17.8061 27.1881C15.912 25.8834 14.4023 24.1638 13.2767 22.029C12.1512 19.8943 11.5923 17.5948 11.6 15.1306C11.6079 12.5999 12.2646 10.2459 13.5702 8.06884C14.8757 5.89176 16.6294 4.15731 18.8312 2.86549C21.0997 1.57388 23.5243 0.932114 26.105 0.940188C28.6858 0.948262 31.0647 1.60506 33.2417 2.91058C35.4188 4.2161 37.1366 5.96973 38.3951 8.17148C39.72 10.44 40.3784 12.873 40.3703 15.4704C40.3627 17.9013 39.7728 20.1805 38.6007 22.3081C37.5287 24.336 36.0248 26.0629 34.0889 27.4888C37.5823 28.4987 40.7398 30.4233 43.5614 33.2627C45.9515 35.6678 47.7911 38.3958 49.0803 41.4468C50.3695 44.4978 51.0088 47.6883 50.9984 51.0183L47.0024 51.0058C47.0144 47.1763 46.0599 43.6102 44.1388 40.3075C42.2838 37.1715 39.7775 34.6661 36.6198 32.7914C33.3622 30.9164 29.8271 29.973 26.0142 29.961C22.2014 29.9491 18.6603 30.8871 15.391 32.775C12.2217 34.6299 9.71625 37.1528 7.87475 40.3439C5.96656 43.568 5.00652 47.0782 4.99464 50.8744L0.998659 50.8619C1.00929 47.4653 1.63539 44.2538 2.87696 41.2274C4.11854 38.2009 5.92517 35.5093 8.29686 33.1524ZM36.6241 15.4587C36.6299 13.5939 36.1608 11.8525 35.2168 10.2345C34.2728 8.61646 32.9948 7.33041 31.3827 6.37631C29.7707 5.42221 28.0239 4.94221 26.1425 4.93633C24.261 4.93044 22.5113 5.3995 20.8933 6.34349C19.2753 7.28748 17.9892 8.56552 17.0351 10.1776C16.081 11.7897 15.601 13.5364 15.5951 15.4179C15.5892 17.2993 16.0583 19.049 17.0023 20.6671C17.9463 22.2851 19.2243 23.5711 20.8364 24.5252C22.4485 25.4793 24.1953 25.951 26.0767 25.9402C27.9582 25.9295 29.708 25.4604 31.3259 24.5331C32.9439 23.6057 34.2299 22.336 35.184 20.7239C36.1381 19.1119 36.6181 17.3568 36.6241 15.4587Z" fill="currentColor"/>
				</svg>
			</a>
		</div>
	<?php
	}
}

if( ! function_exists('knote_woocommerce_header_wishlist') ){
	/**
	 * Display Header Wishlist.
	 *
	 * @return void
	 */
	function knote_woocommerce_header_wishlist(){ ?>
		<div class="block-wishlist">
			<a class="wishlit-item wc-wishlist-link" href=" <?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) ?> " title=" <?php echo esc_html__( 'Account', 'knote' ) ?> ">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-heart">
				<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
			</svg>
			</a>
		</div>
	<?php
	}
}

function knote_product_checkout_image( $name, $cart_item, $cart_item_key ) {
    if ( ! is_checkout() ){ return $name; }
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    $thumbnail = $_product->get_image();
    $image = '<div class="image-single">'
                . $thumbnail .
            '</div>';
    return $image . $name;
}
add_filter( 'woocommerce_cart_item_name', 'knote_product_checkout_image', 9999, 3 );

function knote_product_order_status_image( $name, $item, $visible ) {
    if ( ! is_order_received_page() ) { return $name; }

    $product_id = $item->get_product_id();
    $_product = wc_get_product( $product_id );
    $thumbnail = $_product->get_image();
    $image = '<div class="image-single">'
                . $thumbnail .
            '</div>';
    return $image . $name;
}
add_filter( 'woocommerce_order_item_name', 'knote_product_order_status_image', 10, 3 );

