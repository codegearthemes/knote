<?php
/**
 *
 * Header Mobile Layout Builder
 *
 * @author      CodegearThemes
 * @category    WordPress
 * @package     knote
 * @version     0.1.0
 *
 */

?>

<?php

$device     = 'mobile';
$row_data   = $args[ 'row_data' ];

$component_args = array(
	'device'       => $device,
    'builder_type' => 'header'
);

$elements = $row_data->mobile_offcanvas;
$knote_builder = Knote_Builder::get_instance();

$styles = array();

$knote_canvas_layout                      = get_theme_mod( 'knote_mobile_offcanvas_layout', 'fixed');
$knote_canvas_close_offset                = get_theme_mod( 'knote_mobile_offcanvas_close_offset', '8').'px';

$knote_canvas_menu_color                  = get_theme_mod( 'knote_mobile_offcanvas_color', '#212121' );
$knote_canvas_menu_background             = get_theme_mod( 'knote_mobile_offcanvas_background', '#FBFBF9' );

$knote_canvas_close_color                 = get_theme_mod( 'knote_mobile_offcanvas_close_text_color', '#212121' );
$knote_canvas_close_color_hover           = get_theme_mod( 'knote_mobile_offcanvas_close_text_color_hover', '#212121' );
$knote_canvas_close_background            = get_theme_mod( 'knote_mobile_offcanvas_close_background', 'rgba(255,255,255,0)' );


$styles[] = '--theme--canvas-close-offset:'.esc_attr( $knote_canvas_close_offset );

$styles[] = '--theme--canvas-menu-color:'.esc_attr( $knote_canvas_menu_color );
$styles[] = '--theme--canvas-menu-background:'.esc_attr( $knote_canvas_menu_background );

$styles[] = '--theme--canvas-close-color:'.esc_attr( $knote_canvas_close_color );
$styles[] = '--theme--canvas-close-color-hover:'.esc_attr( $knote_canvas_close_color_hover );
$styles[] = '--theme--canvas-close-background:'.esc_attr( $knote_canvas_close_background );

if ( !empty( $elements ) ){ ?>
    <div id="drawer-navigation-menu" class="drawer--navigation-menu drawer drawer--left <?php echo esc_attr( $knote_canvas_layout ); ?>>" data-mobile-navigation
        style="<?php echo esc_attr( implode(';', $styles ) );?>"
        >
        <div class="block-header--drawer">
            <button type="button" class="menu-toggle-close medium-down--show js-drawer-close js-close" aria-controls="drawer-navigation-menu" aria-expanded="false" data-drawer-toggle>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-close"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                <small class="screen-reader-text"><?php esc_html_e( 'Menu close', 'knote' ); ?></small>
            </button>
        </div>
        <div class="navigation-content">
            <?php
                foreach( $elements[0] as $component_callback ) {
                    if( method_exists( $knote_builder, $component_callback  ) ) {
                        call_user_func( array( $knote_builder, $component_callback ), $component_args );
                    }
                }
            ?>
        </div>
    </div>
    <?php
}

