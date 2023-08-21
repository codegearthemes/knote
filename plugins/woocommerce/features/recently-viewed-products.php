<?php
/**
 * Recently viewed products
 *
 * @package Knote
 */

/**
 * Always track product views
 */
function knote_wc_track_product_view(){
	$knote_recently_viewed_products = get_theme_mod('knote_single_product_recently_viewed_products', 0);

	if (!is_singular('product') || !$knote_recently_viewed_products) {
		return;
	}

	global $post;

	if (empty($_COOKIE['woocommerce_recently_viewed'])) { // @codingStandardsIgnoreLine.
		$viewed_products = array();
	} else {
		$viewed_products = wp_parse_id_list((array) explode('|', wp_unslash($_COOKIE['woocommerce_recently_viewed']))); // @codingStandardsIgnoreLine.
	}

	// Unset if already in viewed products list.
	$keys = array_flip($viewed_products);

	if (isset($keys[$post->ID])) {
		unset($viewed_products[$keys[$post->ID]]);
	}

	$viewed_products[] = $post->ID;

	if (count($viewed_products) > 15) {
		array_shift($viewed_products);
	}

	// Store for session only.
	wc_setcookie('woocommerce_recently_viewed', implode('|', $viewed_products));
}
remove_action('template_redirect', 'wc_track_product_view', 20);
add_action('template_redirect', 'knote_wc_track_product_view', 20);

/**
 * Recently viewed products output
 */
function knote_woocommerce_recently_viewed_products($args = array())
{
	global $product;

	if (!$product || !isset($_COOKIE['woocommerce_recently_viewed'])) {
		return;
	}

	$knote_recently_viewed_products = get_theme_mod('knote_single_product_recently_viewed_products', 0);

	if (!$knote_recently_viewed_products) {
		return;
	}

	$columns            		= get_theme_mod('knote_single_product_recently_viewed_products_columns', 4);
	$knote_products_count     = get_theme_mod('knote_single_product_recently_viewed_products_count', 3);
	$knote_product_slider	  	= get_theme_mod('knote_single_product_recently_viewed_products_slider', 0);
	$knote_product_slider_nav = get_theme_mod('knote_single_product_recently_viewed_products_slider_nav', 0);

	$defaults = array(
		'posts_per_page' => $knote_products_count,
		'orderby'        => 'rand',
		'order'          => 'desc'
	);

	$args = wp_parse_args($args, $defaults);

	// Get visible recently viewed products then sort them at random.
	$args['products'] = array_filter(array_map('wc_get_product', explode('|', sanitize_text_field(wp_unslash($_COOKIE['woocommerce_recently_viewed'])))), 'wc_products_array_filter_visible');

	// Handle orderby.
	$products = array_slice(wc_products_array_orderby($args['products'], $args['orderby'], $args['order']), 0, $knote_products_count);

	if (count($products) === 0) {
		return;
	} ?>

	<section class="recently-viewed-products">
		<div class="<?php echo esc_attr( apply_filters( 'knote_woocommerce_container_class', 'container' ) ); ?>">
			<?php

			$heading = apply_filters('knote_woocommerce_recently_viewed_heading', __('Recently viewed products', 'knote'));

			if ($heading) : ?>
				<h2 class="heading"><?php echo esc_html($heading); ?></h2>
			<?php
			endif;

			//$wrapper_atts = array();
			$wrapper_classes = ['recently--viewed-products-inner'];

			if ($knote_product_slider) {

				$wrapper_classes[] = 'slider-items slider-carousel-items';

				if ($knote_product_slider_nav === 'show') {
					$wrapper_classes[] = 'slider--items-navshow';
				}

				//$wrapper_atts[] = 'data-per-page="' . absint($columns) . '"';
			}

			// Mount recently viewed products wrapper class
			//$wrapper_atts[] = 'class="' . esc_attr(implode(' ', $wrapper_classes)) . '"';
			?>

			<div class="<?php echo esc_attr(implode(' ', $wrapper_classes)); ?>">
				<ul class="products columns-<?php echo absint($columns) ?>">
					<?php
					foreach ($products as $item) :

						$post_object = get_post($item->get_id());
						setup_postdata($GLOBALS['post'] = &$post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
						wc_get_template_part('content', 'product');

					endforeach;
					?>
				</ul>
			</div>
		</div>
	</section>
<?php
}
add_action('woocommerce_after_single_product_summary', 'knote_woocommerce_recently_viewed_products', apply_filters('knote_woocommerce_recently_viewed_products_order', 21));
