<?php
/**
 * Sale Badge
 *
 * @package Knote
 */

/**
 * Sale badge text
 */
function knote_sale_badge( $html, $post, $product ) {

	if ( !$product->is_on_sale() ) {
		return;
	}

	$knote_text 			    = get_theme_mod( 'knote_catalog_sale_badge_text', esc_html__( 'Sale', 'knote' ) );
	$knote_enable_percent 		= get_theme_mod( 'knote_catalog_sale_badge_percent', 0 );
	$knote_percent_text 		= get_theme_mod( 'knote_catalog_sale_badge_percent_text', '-{value}%' );
	$knote_sale_position 		= get_theme_mod( 'knote_catalog_sale_badge_layout', 'layout1');

	if ( !$knote_enable_percent ) {
		$badge = '<span class="onsale '.esc_attr( $knote_sale_position ).'">' . esc_html( $knote_text ) . '</span>';
	} else {
		if ( $product->is_type('variable' ) ) {
			$percentages = array();
			$prices = $product->get_variation_prices();
			foreach( $prices['price'] as $key => $price ){
				if( $prices['regular_price'][$key] !== $price ){
					$percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
				}
			}
			$percentage = max( $percentages );

		} elseif ( $product->is_type('grouped') ) {
			$percentages 	= array();
			$children_ids 	= $product->get_children();

			foreach ( $children_ids as $child_id ) {
				$child_product = wc_get_product($child_id);

				$regular_price = (float) $child_product->get_regular_price();
				$sale_price    = (float) $child_product->get_sale_price();

				if ( $sale_price != 0 || ! empty($sale_price) ) {
					$percentages[] = round(100 - ($sale_price / $regular_price * 100));
				}
			}
			$percentage = max($percentages) ;
		} else {
			$regular_price = (float) $product->get_regular_price();
			$sale_price    = (float) $product->get_sale_price();

			if ( $sale_price != 0 || ! empty($sale_price) ) {
				$percentage = round(100 - ($sale_price / $regular_price * 100) );
			} else {
				return $html;
			}
		}

		$knote_percent_text = str_replace( '{value}', $percentage, $knote_percent_text );

		$badge = '<span class="onsale '.esc_attr( $knote_sale_position ).'">' . esc_html( $knote_percent_text ) .'</span>';

	}

	return $badge;
}
add_filter( 'woocommerce_sale_flash', 'knote_sale_badge', 10, 3 );
