<?php
/**
 * Builder
 * Woocommerce Component
 *
 * @package Knote
 */

$styles = array();
$margin = Knote_Styles::dimensions_variables( 'knote_header_component_account_margin', 'margin', 'woocommerce-widgets' );
$padding = Knote_Styles::dimensions_variables( 'knote_header_component_account_padding', 'padding', 'woocommerce-widgets' );

if ( is_array( $margin ) ){
    $styles = array_merge( $styles, $margin );
}

if ( is_array( $padding ) ){
    $styles = array_merge( $styles, $padding );
}

?>

<div class="builder-item component-woocommerce-account" style="<?php echo esc_attr( implode(';', $styles ) ); ?>" data-element-id="cart" tabindex="0" data-component>
    <?php $this->customizer_edit_button('cart'); ?>
    <?php

        $styles = array();

        $knote_woocommerce_widget_color               = get_theme_mod( 'knote_header_component_account_color', '#212121' );
        $knote_woocommerce_widget_color_hover         = get_theme_mod( 'knote_header_component_account_color_hover', '#757575' );

        $knote_woocommerce_widget_sticky_color        = get_theme_mod( 'knote_header_component_account_sticky_color', '#212121' );
        $knote_woocommerce_widget_sticky_color_hover  = get_theme_mod( 'knote_header_component_account_sticky_color_hover', '#757575' );

        $styles[] = '--woocommerce-widget-icon-color:'.esc_attr( $knote_woocommerce_widget_color );
        $styles[] = '--woocommerce-widget-icon-color-hover:'.esc_attr( $knote_woocommerce_widget_color_hover );

        if( get_theme_mod('knote_header_builder_sticky_enable', 0) ){
            $styles[] = '--woocommerce-widget-icon-sticky-color:'.esc_attr( $knote_woocommerce_widget_sticky_color );
            $styles[] = '--woocommerce-widget-icon-sticky-color-hover:'.esc_attr( $knote_woocommerce_widget_sticky_color_hover );
        }

    ?>
    <div class="block-woocommerce-widgets"
            style="<?php echo esc_attr( implode(';', $styles ) );?>">
        <?php knote_woocommerce_header_account(); ?>
    </div>
</div>
