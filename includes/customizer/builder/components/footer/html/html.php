<?php
/**
 * Header Builder
 * HTML Component
 *
 * @package Knote
 */
?>

<?php

$knote_footer_html_content = get_theme_mod( 'knote_footer_component_html_content', '' );
if( !$knote_footer_html_content ) return '';

$styles = array();
$margin = Knote_Styles::dimensions_variables( 'knote_footer_component_html_margin', 'margin', 'footer-html' );
$padding = Knote_Styles::dimensions_variables( 'knote_footer_component_html_padding', 'padding', 'footer-html' );

if ( is_array( $margin ) ){
    $styles = array_merge( $styles, $margin );
}

if ( is_array( $padding ) ){
    $styles = array_merge( $styles, $padding );
}

?>
<div class="builder-item component-html footer-component-html" style="<?php echo esc_attr( implode(';', $styles ) ); ?>"  data-element-id="html" data-component>
    <?php $this->customizer_edit_button( 'html', 'footer' ); ?>

    <?php

        $styles = $knote_html_class = array();

        $knote_html_title_color         =   get_theme_mod( 'knote_footer_component_widget1_title_color', '#212121' );
        $knote_html_color               = get_theme_mod( 'knote_footer_component_html_text_color', '#757575' );
        $knote_html_link_color          = get_theme_mod( 'knote_footer_component_html_link_color', '#121212' );
        $knote_html_link_hover_color    = get_theme_mod( 'knote_footer_component_html_link_color_hover', '#212121' );

        $knote_html_class[]               = 'text-'.get_theme_mod( 'knote_footer_component_html_text_align', 'left' );

        $styles[] = '--footer-html-title-color:'.esc_attr( $knote_html_title_color );
        $styles[] = '--footer-html-color:'.esc_attr( $knote_html_color );
        $styles[] = '--footer-html-link-color:'.esc_attr( $knote_html_link_color );
        $styles[] = '--footer-html-link-hover-color:'.esc_attr( $knote_html_link_hover_color );

    ?>
    <div class="footer-component__html html <?php echo esc_attr( implode(' ', $knote_html_class ) ); ?>"
            style="<?php echo esc_attr( implode(';', $styles ) ); ?>"
    >
        <?php echo do_shortcode( wp_kses_post( $knote_footer_html_content ) ); ?>
    </div>
</div>


