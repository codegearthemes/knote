<?php
/**
 * Builder
 * Widget Component
 *
 * @package Knote
 */

$styles = array();
$margin = Knote_Styles::dimensions_variables( 'knote_footer_component_widget2_margin', 'margin', 'widget2' );
$padding = Knote_Styles::dimensions_variables( 'knote_footer_component_widget2_padding', 'padding', 'widget2' );

if ( is_array( $margin ) ){
    $styles = array_merge( $styles, $margin );
}

if ( is_array( $padding ) ){
    $styles = array_merge( $styles, $padding );
}

?>

<div class="builder-item component-widget component-widget2" style="<?php echo esc_attr( implode(';', $styles ) ); ?>" data-element-id="widget1" data-component>
    <?php
        $this->customizer_edit_button('widget1', 'footer');

        $styles = array();
        $knote_widget_title_color  =   get_theme_mod( 'knote_footer_component_widget2_title_color', '#212121' );
        $knote_widget_text_color  =   get_theme_mod( 'knote_footer_component_widget2_text_color', '#212121' );
        $knote_widget_link_color  =   get_theme_mod( 'knote_footer_component_widget2_links_color', '#212121' );
        $knote_widget_link_hover_color  =   get_theme_mod( 'knote_footer_component_widget2_links_color_hover', '#212121' );

        $styles[] = '--theme--widget2-title-color:'.esc_attr( $knote_widget_title_color );
        $styles[] = '--theme--widget2-text-color:'.esc_attr( $knote_widget_text_color );
        $styles[] = '--theme--widget2-link-color:'.esc_attr( $knote_widget_link_color );
        $styles[] = '--theme--widget2-link-hover-color:'.esc_attr( $knote_widget_link_hover_color );

    ?>
    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
        <div class="footer-widget footer-widget2" style="<?php echo esc_attr( implode(';', $styles ) );?>">
            <div class="widget-column">
                <?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
