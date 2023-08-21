<?php
/**
 * Builder
 * Button Component
 *
 * @package Knote
 */




$styles = array();
$margin = Knote_Styles::dimensions_variables( 'knote_header_component_button_margin', 'margin', 'button' );
$padding = Knote_Styles::dimensions_variables( 'knote_header_component_button_padding', 'padding', 'button' );

if ( is_array( $margin ) ){
    $styles = array_merge( $styles, $margin );
}

if ( is_array( $padding ) ){
    $styles = array_merge( $styles, $padding );
}

?>

<div class="builder-item component-button" style="<?php echo esc_attr( implode(';', $styles ) ); ?>" data-element-id="button" data-component>
    <?php $this->customizer_edit_button(  'button' );

    $knote_button_text 	= get_theme_mod( 'knote_header_component_button_text', esc_html__( 'Click me', 'knote' ) );
    $knote_button_url	    = get_theme_mod( 'knote_header_component_button_link', '#' );
    $knote_button_class   = get_theme_mod( 'knote_header_component_button_class', '' );
    $knote_button_target  = get_theme_mod( 'knote_header_component_button_target', 0 );

    $knote_link_target	= '';
    if ( $knote_button_target ) {
        $knote_link_target = 'target="_blank"';
    }

    $styles = array();

    $knote_button_color               = get_theme_mod( 'knote_header_component_button_color', '#FFFFFF' );
    $knote_button_color_hover         = get_theme_mod( 'knote_header_component_button_color_hover', '#FFFFFF' );

    $knote_button_background          = get_theme_mod( 'knote_header_component_button_background_color', '#212121' );
    $knote_button_background_hover    = get_theme_mod( 'knote_header_component_button_background_color_hover', '#757575' );

    $knote_button_border_color        = get_theme_mod( 'knote_header_component_button_border_color', '#212121' );
    $knote_button_border_color_hover  = get_theme_mod( 'knote_header_component_button_border_color_hover', '#757575' );

    $knote_button_sticky_color        = get_theme_mod( 'knote_header_component_button_sticky_text_color', '#FFFFFF' );
    $knote_button_sticky_hover        = get_theme_mod( 'knote_header_component_button_sticky_text_color_hover', '#FFFFFF' );

    $knote_button_sticky_background          = get_theme_mod( 'knote_header_component_button_sticky_background_color', '#212121' );
    $knote_button_sticky_background_hover    = get_theme_mod( 'knote_header_component_button_sticky_background_color_hover', '#757575' );

    $knote_button_sticky_border_color        = get_theme_mod( 'knote_header_component_button_sticky_border_color', '#212121' );
    $knote_button_sticky_border_color_hover  = get_theme_mod( 'knote_header_component_button_sticky_border_color_hover', '#757575' );

    $styles[] = '--button-color:'.esc_attr( $knote_button_color );
    $styles[] = '--button-color-hover:'.esc_attr( $knote_button_color_hover );
    $styles[] = '--button-background:'.esc_attr( $knote_button_background );
    $styles[] = '--button-background-hover:'.esc_attr( $knote_button_background_hover );
    $styles[] = '--button-border-color:'.esc_attr( $knote_button_border_color );
    $styles[] = '--button-border-hover:'.esc_attr( $knote_button_border_color_hover );

    if( get_theme_mod('knote_header_builder_sticky_enable', 0) ){
        $styles[] = '--button-sticky-color:'.esc_attr( $knote_button_sticky_color );
        $styles[] = '--button-sticky-color-hover:'.esc_attr( $knote_button_sticky_hover );
        $styles[] = '--button-sticky-background:'.esc_attr( $knote_button_sticky_background );
        $styles[] = '--button-sticky-background-hover:'.esc_attr( $knote_button_sticky_background_hover );
        $styles[] = '--button-sticky-border-color:'.esc_attr( $knote_button_sticky_border_color );
        $styles[] = '--button-sticky-border-hover:'.esc_attr( $knote_button_sticky_border_color_hover );
    }

    ?>
        <a <?php echo esc_html( $knote_link_target ); ?>
            class="button<?php echo esc_attr( ( $knote_button_class ? ' '. $knote_button_class : '' ) ); ?>"
            href="<?php echo esc_url( $knote_button_url ); ?>"
            style="<?php echo esc_attr( implode(';', $styles ) );?>"
        >
            <?php echo esc_html( $knote_button_text ); ?>
        </a>
</div>
