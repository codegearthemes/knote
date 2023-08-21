<?php
/**
 * Header Builder
 * Menu Component
 *
 * @package Knote
 */


$styles = array();
$margin = Knote_Styles::dimensions_variables('knote_header_component_offcanvas_menu_padding', 'margin', 'menu');
$padding = Knote_Styles::dimensions_variables('knote_header_component_offcanvas_menu_padding', 'padding', 'menu');

if (is_array($margin)) {
    $styles = array_merge($styles, $margin);
}

if (is_array($padding)) {
    $styles = array_merge($styles, $padding);
}

?>
<div class="builder-item component-menu navigation header-navigation__main" style="<?php echo esc_attr(implode(';', $styles)); ?>" data-element-id="menu" data-component>
    <?php $this->customizer_edit_button( 'menu' ); ?>

    <?php

        $styles = array();

        $knote_menu_color               = get_theme_mod( 'knote_header_component_menu_color', '#212121' );
        $knote_menu_color_hover         = get_theme_mod( 'knote_header_component_menu_color_hover', '#757575' );

        $knote_submenu_color            = get_theme_mod( 'knote_header_component_submenu_color', '#212121' );
        $knote_submenu_color_hover      = get_theme_mod( 'knote_header_component_submenu_color_hover', '#757575' );
        $knote_submenu_background       = get_theme_mod( 'knote_header_component_submenu_background', '#FFFFFF' );


        $styles[] = '--theme--menu-color:'.esc_attr( $knote_menu_color );
        $styles[] = '--theme--menu-color-hover:'.esc_attr( $knote_menu_color_hover );
        $styles[] = '--theme--submenu-color:'.esc_attr( $knote_submenu_color );
        $styles[] = '--theme--submenu-color-hover:'.esc_attr( $knote_submenu_color_hover );
        $styles[] = '--theme--submenu-background:'.esc_attr( $knote_submenu_background );


    ?>
    <div id="header-navigation" class="header--desktop-navigation header-navigation"
            style="<?php echo esc_attr( implode(';', $styles ) );?>"
    >
        <?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary') ) : ?>
                <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
        <?php else: ?>
            <nav id="site-navigation" class="main-navigation">
                <div class="navigation">
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'mobile-menu',
                            'walker'         => apply_filters( 'knote_primary_wp_nav_menu_walker', '' )
                        ) );
                    ?>
                </div>
            </nav><!-- #site-navigation -->
        <?php endif; ?>
    </div>
</div>


