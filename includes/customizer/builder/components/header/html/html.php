<?php
/**
 * Header Builder
 * HTML Component
 *
 * @package Knote
 */
?>

<?php

$knote_header_html_content = get_theme_mod( 'knote_header_component_html_content', '' );


if( !$knote_header_html_content ) return '';

$styles = array();
$margin = Knote_Styles::dimensions_variables( 'knote_header_component_html_margin', 'margin', 'html' );
$padding = Knote_Styles::dimensions_variables( 'knote_header_component_html_padding', 'padding', 'html' );

if ( is_array( $margin ) ){
    $styles = array_merge( $styles, $margin );
}

if ( is_array( $padding ) ){
    $styles = array_merge( $styles, $padding );
}

?>
<div class="builder-item component-html" style="<?php echo esc_attr( implode(';', $styles ) ); ?>"  data-element-id="html" data-component>
    <?php $this->customizer_edit_button( 'html' ); ?>

    <?php

        $styles = array();

        $classes                          = 'text-'.get_theme_mod( 'knote_header_component_html_text_align', 'left' );
        $knote_html_color               = get_theme_mod( 'knote_header_component_html_text_color', '#757575' );
        $knote_html_link_color          = get_theme_mod( 'knote_header_component_html_link_color', '#121212' );
        $knote_html_link_hover_color    = get_theme_mod( 'knote_header_component_html_link_color_hover', '#212121' );

        $knote_html_sticky_color              = get_theme_mod( 'knote_header_component_html_sticky_text_color', '#757575' );
        $knote_html_link_sticky_color         = get_theme_mod( 'knote_header_component_html_sticky_link_color', '#121212' );
        $knote_html_link_sticky_hover_color   = get_theme_mod( 'knote_header_component_html_sticky_link_color_hover', '#121212' );

        $styles[] = '--html-color:'.esc_attr( $knote_html_color );
        $styles[] = '--html-link-color:'.esc_attr( $knote_html_link_color );
        $styles[] = '--html-link-hover-color:'.esc_attr( $knote_html_link_hover_color );

        $styles[] = '--html-sticky-color:'.esc_attr( $knote_html_sticky_color );
        $styles[] = '--html-link-sticky-color:'.esc_attr( $knote_html_link_sticky_color );
        $styles[] = '--html-link-sticky-hover-color:'.esc_attr( $knote_html_link_sticky_hover_color );

    ?>
    <div class="header-component__html <?php echo esc_attr( $classes ); ?>"
            style="<?php echo esc_attr( implode(';', $styles ) );?>"
    >
        <?php echo wp_kses_post( $knote_header_html_content ); ?>
    </div>
</div>


