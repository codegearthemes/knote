<?php
/**
 * Single Product Tabs
 *
 * @package Knote
 */

/**
 * WC Hooks
 */
function knote_single_product_tabs_wc_hooks() {

    $product_tabs_enable = get_theme_mod( 'knote_single_product_description_tabs_enable', 1 );

    //Product tabs
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' );

	//Single product
	if ( is_product() && $product_tabs_enable ) {
        add_action( 'woocommerce_single_product_summary', 'knote_single_product_tabs_accordion_output', 55 );
	}
}
add_action( 'wp', 'knote_single_product_tabs_wc_hooks' );

/**
 * Woocommerce tabs titles
 */
add_filter( 'woocommerce_product_description_heading', '__return_false' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );

/**
 * Tabs Accordion Style
 */
function knote_single_product_tabs_accordion_output() {
    /**
     * Filter tabs and allow third parties to add their own.
     */
    $count = 0;
    $product_tabs = apply_filters( 'woocommerce_product_tabs', array() ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound

    if ( ! empty( $product_tabs ) ) : ?>

        <div class="product--single-accordion">
            <ul class="collapsible__items" role="tablist">
                <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                    <li class="<?php echo esc_attr( $key ); ?>_tab" role="tab" data-collapsible>
                        <h4 class="collapsible__item collapsible__toggle h5" role="button" aria-expanded="false" aria-controls="tab-title-<?php echo esc_attr( $key ); ?>" data-collapsible-title>
                            <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </h4>
                        <div id="tab-title-<?php echo esc_attr( $key ); ?>" class="collapsible__content hide" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>" data-collapsible-content>
                            <?php
                                if ( isset( $product_tab['callback'] ) ) {
                                    call_user_func( $product_tab['callback'], $key, $product_tab );
                                }
                            ?>
                        </div>
                    </li>
                    <?php $count++; ?>
                <?php endforeach; ?>
            </ul>
		    <?php do_action( 'woocommerce_product_after_tabs' ); ?>
	    </div>

    <?php endif; ?>
    <?php
}
