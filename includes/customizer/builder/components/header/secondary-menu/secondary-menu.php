<?php
/**
 * Header Builder
 * Secondary Menu Component
 *
 * @package Knote
 */

$styles = array();
$margin = Knote_Styles::dimensions_variables('knote_header_component_secondary_menu_margin', 'margin', 'secondary-menu');
$padding = Knote_Styles::dimensions_variables('knote_header_component_secondary_menu_padding', 'padding', 'secondary-menu');

if (is_array($margin)) {
    $styles = array_merge($styles, $margin);
}

if (is_array($padding)) {
    $styles = array_merge($styles, $padding);
}
?>
<div class="builder-item component-secondary-menu navigation header-navigation__secondary" style="<?php echo esc_attr(implode(';', $styles)); ?>" data-element-id="secondary-menu" data-component>
    <?php $this->customizer_edit_button( 'secondary-menu' ); ?>
    <?php

        $styles = array();

        $knote_menu_color               = get_theme_mod( 'knote_header_component_secondary_menu_color', '#212121' );
        $knote_menu_color_hover         = get_theme_mod( 'knote_header_component_secondary_menu_color_hover', '#757575' );


        $styles[] = '--theme--secondary-menu-color:'.esc_attr( $knote_menu_color );
        $styles[] = '--theme--secondary-menu-color-hover:'.esc_attr( $knote_menu_color_hover );


    ?>
    <div class="navigation-secondary__inner"
            style="<?php echo esc_attr( implode(';', $styles ) );?>">
        <?php if ( function_exists('max_mega_menu_is_enabled') ) : ?>
            <?php wp_nav_menu( array( 'theme_location' => 'secondary') ); ?>
        <?php else: ?>
            <nav class="secondary-navigation" aria-label="<?php echo esc_attr__( 'Secondary navigation menu', 'knote' ); ?>">
                <?php
                    wp_nav_menu( array(
                        'menu_id'       => 'secondary',
                        'theme_location'=> 'secondary',
                        'fallback_cb'	=> false,
                        'depth'			=> 1,
                        'walker'        => apply_filters( 'knote_secondary_wp_nav_menu_walker', '' )
                    ) );
                ?>
            </nav>
        <?php endif; ?>
    </div>
</div>


