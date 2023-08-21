<?php
/**
 * Builder
 * Widget Component
 *
 * @package Knote
 */

$styles = array();
$margin = Knote_Styles::dimensions_variables( 'knote_footer_component_widget1_margin', 'margin', 'widget1' );
$padding = Knote_Styles::dimensions_variables( 'knote_footer_component_widget1_padding', 'padding', 'widget1' );

if ( is_array( $margin ) ){
    $styles = array_merge( $styles, $margin );
}

if ( is_array( $padding ) ){
    $styles = array_merge( $styles, $padding );
}

?>

<div class="builder-item component-widget component-widget1" style="<?php echo esc_attr( implode(';', $styles ) ); ?>" data-element-id="widget1" data-component>
    <?php
        $this->customizer_edit_button('widget1', 'footer');

        $styles = array();
        $knote_widget_title_color  =   get_theme_mod( 'knote_footer_component_widget1_title_color', '#212121' );
        $knote_widget_text_color  =   get_theme_mod( 'knote_footer_component_widget1_text_color', '#212121' );
        $knote_widget_link_color  =   get_theme_mod( 'knote_footer_component_widget1_links_color', '#212121' );
        $knote_widget_link_hover_color  =   get_theme_mod( 'knote_footer_component_widget1_links_color_hover', '#212121' );

        $styles[] = '--theme--widget1-title-color:'.esc_attr( $knote_widget_title_color );
        $styles[] = '--theme--widget1-text-color:'.esc_attr( $knote_widget_text_color );
        $styles[] = '--theme--widget1-link-color:'.esc_attr( $knote_widget_link_color );
        $styles[] = '--theme--widget1-link-hover-color:'.esc_attr( $knote_widget_link_hover_color );

    ?>
    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        <div class="footer-widget footer-widget1" style="<?php echo esc_attr( implode(';', $styles ) );?>">
            <div class="widget-column">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
