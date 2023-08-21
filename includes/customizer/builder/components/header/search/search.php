<?php
/**
 * Header Builder
 * Search Component
 *
 * @package Knote
 */


$styles = array();
$margin = Knote_Styles::dimensions_variables( 'knote_header_component_search_margin', 'margin', 'search' );
$padding = Knote_Styles::dimensions_variables( 'knote_header_component_search_padding', 'padding', 'search' );

if ( is_array( $margin ) ){
    $styles = array_merge( $styles, $margin );
}

if ( is_array( $padding ) ){
    $styles = array_merge( $styles, $padding );
}

?>
<div class="builder-item component-search header-search" style="<?php echo esc_attr( implode(';', $styles ) ); ?>"  data-element-id="search" data-component>
    <?php $this->customizer_edit_button('search'); ?>
    <?php

        $styles = array();

        $knote_search_layout              = get_theme_mod( 'knote_header_component_search_layout', 'icon' );

        $knote_search_color               = get_theme_mod( 'knote_header_component_search_color', '#FFFFFF' );
        $knote_search_icon_color          = get_theme_mod( 'knote_header_component_search_icon_color', '#212121' );
        $knote_search_icon_color_hover    = get_theme_mod( 'knote_header_component_search_icon_color_hover', '#757575' );

        $knote_search_background_color    = get_theme_mod( 'knote_header_component_search_background_color', '#212121' );
        $knote_search_border_color        = get_theme_mod( 'knote_header_component_search_border_color', '#212121' );

        $knote_search_sticky_color        = get_theme_mod( 'knote_header_component_search_sticky_color', '#212121' );
        $knote_search_sticky_color_hover  = get_theme_mod( 'knote_header_component_search_sticky_color_hover', '#757575' );

        $styles[] = '--search-text-color:'.esc_attr( $knote_search_color );
        $styles[] = '--search-icon-color:'.esc_attr( $knote_search_icon_color );
        $styles[] = '--search-icon-color-hover:'.esc_attr( $knote_search_icon_color_hover );
        $styles[] = '--search-background-color:'.esc_attr( $knote_search_background_color );
        $styles[] = '--search-border-color:'.esc_attr( $knote_search_border_color );

        if( get_theme_mod('knote_header_builder_sticky_enable', 0) ){
            $styles[] = '--search-sticky-color:'.esc_attr( $knote_search_sticky_color );
            $styles[] = '--search-sticky-color-hover:'.esc_attr( $knote_search_sticky_color_hover );
        }

    ?>
    <div class="block-search layout-<?php echo esc_attr( $knote_search_layout  ); ?>"
            style="<?php echo esc_attr( implode(';', $styles ) );?>"
    >
        <?php if( $knote_search_layout == 'icon' ): ?>
            <button class="search-toggle" data-search-toggle aria-label="<?php esc_attr__( 'View Search', 'knote' ); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-search">
                    <circle cx="10" cy="10" r="7.5"/>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <span class="fallback-text"><?php esc_html_e( 'Search', 'knote' ); ?></span>
            </button>
        <?php endif; ?>
        <div class="search-form-wrapper" data-search-form>
            <?php if( $knote_search_layout == 'icon' ): ?>
                <div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
                    <div class="search-inner">
                        <?php get_search_form(); ?>
                        <?php if( $knote_search_layout == 'icon' ): ?>
                            <button class="search-toggle" data-search-toggle aria-label="<?php esc_attr__( 'Close search form', 'knote' ); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                <span class="fallback-text"><?php esc_html_e( 'Search close', 'knote' ); ?></span>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>


