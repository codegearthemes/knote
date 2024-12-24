<?php

/**
 * Builder
 * Copyright Component
 *
 * @package Knote
 */




$styles = array();
$margin     = Knote_Styles::dimensions_variables('knote_footer_component_credits_margin', 'margin', 'credits');
$padding    = Knote_Styles::dimensions_variables('knote_footer_component_credits_padding', 'padding', 'credits');

if (is_array($margin)) {
    $styles = array_merge($styles, $margin);
}

if (is_array($padding)) {
    $styles = array_merge($styles, $padding);
}

?>
<div class="builder-item component-credits" style="<?php echo esc_attr( implode(';', $styles ) ); ?>" data-element-id="credits" data-component>
    <?php
        $this->customizer_edit_button(  'credits', 'footer' );

        $styles = array();
        $knote_credits_color              = get_theme_mod( 'knote_footer_component_credits_color', '#333333' );
        $knote_credits_link_color         = get_theme_mod( 'knote_footer_component_credits_link_color', '#212121' );
        $knote_credits_link_color_hover   = get_theme_mod( 'knote_footer_component_credits_link_color_hover', '#000000' );

        $knote_footer_class               = get_theme_mod( 'knote_footer_component_credits_alignment', 'center' );

        $styles[] = '--theme--credits-color:'.esc_attr( $knote_credits_color );
        $styles[] = '--theme--credits-link-color:'.esc_attr( $knote_credits_link_color );
        $styles[] = '--theme--credits-link-color-hover:'.esc_attr( $knote_credits_link_color_hover );
    ?>
    <div class="copyright text-<?php echo esc_attr( $knote_footer_class ); ?>" style="<?php echo esc_attr( implode(';', $styles ) );?>">
        <div class="copyright-content">
        <?php
            /* translators: %1$1s, %2$2s theme copyright tags*/
            $credits 	= get_theme_mod( 'knote_footer_component_credits_text', sprintf( __( '%1$1s. Proudly powered by %2$2s', 'knote' ), '{copyright} {year} {site_title}', '{theme_author}' ) );

            $tags 		= array( '{theme_author}', '{site_title}', '{copyright}', '{year}' );
            $replace 	= array( '<a rel="nofollow" target="_blank" href="https://CodegearThemes.com/products/knote/">' . esc_html__( 'Knote', 'knote' ) . '</a>', get_bloginfo( 'name' ), '&copy;', date('Y') );

            $credits 	= str_replace( $tags, $replace, $credits );

            echo wp_kses_post( $credits );
        ?>
        </div>
    </div>
</div>
