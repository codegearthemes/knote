<?php
/**
 * Builder
 * Button Component
 *
 * @package Knote
 */




$styles = array();
$margin = Knote_Styles::dimensions_variables( 'knote_footer_component_button_margin', 'margin', 'footer-button' );
$padding = Knote_Styles::dimensions_variables( 'knote_footer_component_button_padding', 'padding', 'footer-button' );

if ( is_array( $margin ) ){
    $styles = array_merge( $styles, $margin );
}

if ( is_array( $padding ) ){
    $styles = array_merge( $styles, $padding );
}

?>

<div class="builder-item component-button footer-component-button" style="<?php echo esc_attr( implode(';', $styles ) ); ?>" data-element-id="button" data-component>
    <?php $this->customizer_edit_button(  'button', 'footer' );

    $knote_button_text 	= get_theme_mod( 'knote_footer_component_button_text', esc_html__( 'Click me', 'knote' ) );
    $knote_button_url	    = get_theme_mod( 'knote_footer_component_button_link', '#' );
    $knote_button_class   = get_theme_mod( 'knote_footer_component_button_class', '' );
    $knote_button_target  = get_theme_mod( 'knote_footer_component_button_target', 0 );

    $knote_link_target	= '';
    if ( $knote_button_target ) {
        $knote_link_target = 'target="_blank"';
    }

    $styles = array();

    $knote_button_color               = get_theme_mod( 'knote_footer_component_button_color', '#FFFFFF' );
    $knote_button_color_hover         = get_theme_mod( 'knote_footer_component_button_color_hover', '#FFFFFF' );

    $knote_button_background          = get_theme_mod( 'knote_footer_component_button_background_color', '#212121' );
    $knote_button_background_hover    = get_theme_mod( 'knote_footer_component_button_background_color_hover', '#757575' );

    $knote_button_border_color        = get_theme_mod( 'knote_footer_component_button_border_color', '#212121' );
    $knote_button_border_color_hover  = get_theme_mod( 'knote_footer_component_button_border_color_hover', '#757575' );

    $styles[] = '--footer-button-color:'.esc_attr( $knote_button_color );
    $styles[] = '--footer-button-color-hover:'.esc_attr( $knote_button_color_hover );
    $styles[] = '--footer-button-background:'.esc_attr( $knote_button_background );
    $styles[] = '--footer-button-background-hover:'.esc_attr( $knote_button_background_hover );
    $styles[] = '--footer-button-border-color:'.esc_attr( $knote_button_border_color );
    $styles[] = '--footer-button-border-color-hover:'.esc_attr( $knote_button_border_color_hover );

    ?>
        <a <?php echo esc_html( $knote_link_target ); ?>
            class="button<?php echo esc_attr( ( $knote_button_class ? ' '. $knote_button_class : '' ) ); ?>"
            href="<?php echo esc_url( $knote_button_url ); ?>"
            style="<?php echo esc_attr( implode(';', $styles ) );?>"
        >
            <?php echo esc_html( $knote_button_text ); ?>
        </a>
</div>
