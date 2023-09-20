<?php
/**
 * Header Builder
 * Hamburger Component
 *
 * @package Knote
 */


$styles = array();
$margin = Knote_Styles::dimensions_variables('knote_header_component_hamburger_margin', 'margin', 'hamburger');
$padding = Knote_Styles::dimensions_variables('knote_header_component_hamburger_padding', 'padding', 'hamburger');

if (is_array($margin)) {
    $styles = array_merge($styles, $margin);
}

if (is_array($padding)) {
    $styles = array_merge($styles, $padding);
}

?>
<div class="builder-item component-hamburger" style="<?php echo esc_attr(implode(';', $styles)); ?>" data-element-id="hamburger" data-component>
    <?php $this->customizer_edit_button( 'hamburger' ); ?>

    <?php

        $styles = array();

        $knote_hamburger_icon_color               = get_theme_mod( 'knote_header_component_hamburger_icon_color', '#212121' );

        $styles[] = '--theme--hamburger-icon-color:'.esc_attr( $knote_hamburger_icon_color );


    ?>
    <div class=""
            style="<?php echo esc_attr( implode(';', $styles ) );?>"
    >
        <button type="button" class="mobile--menu-toggle js-drawer-open-left" aria-controls="drawer-navigation-menu" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-menu"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            <small class="screen-reader-text"><?php esc_html_e( 'Menu', 'knote' ); ?></small>
        </button>
    </div>
</div>


