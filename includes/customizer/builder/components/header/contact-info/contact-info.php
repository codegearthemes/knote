<?php

/**
 * Header Builder
 * Contact Info Component
 *
 * @package Knote
 */


$styles = array();
$margin = Knote_Styles::dimensions_variables('knote_builder_contact_info_margin', 'margin', 'contact');
$padding = Knote_Styles::dimensions_variables('knote_builder_contact_info_padding', 'padding', 'contact');

if (is_array($margin)) {
    $styles = array_merge($styles, $margin);
}

if (is_array($padding)) {
    $styles = array_merge($styles, $padding);
}

?>
<div class="builder-item component-contact component-contact-info header-contact__info" data-component
    style="<?php echo esc_attr(implode(';', $styles)); ?>" data-element-id="contact-info">
    <?php
    $this->customizer_edit_button('contact-info');

    $knote_email             = get_theme_mod('knote_builder_contact_info_email', esc_html__('office@example.org', 'knote'));
    $knote_phone            = get_theme_mod('knote_builder_contact_info_phone', esc_html__('+1(555) 555-1234', 'knote'));
    $knote_display_inline = get_theme_mod('knote_builder_contact_info_display_inline', 1);


    $styles = array();

    $knote_contact_icon_color               = get_theme_mod( 'knote_builder_contact_info_icon_color', '#212121' );
    $knote_contact_icon_color_hover         = get_theme_mod( 'knote_builder_contact_info_icon_color_hover', '#757575' );

    $knote_contact_text_color               = get_theme_mod( 'knote_builder_contact_info_text_color', '#212121' );
    $knote_contact_text_color_hover         = get_theme_mod( 'knote_builder_contact_info_text_color_hover', '#757575' );

    $knote_contact_icon_sticky_color               = get_theme_mod( 'knote_builder_contact_info_icon_sticky_color', '#212121' );
    $knote_contact_icon_sticky_color_hover         = get_theme_mod( 'knote_builder_contact_info_icon_sticky_color_hover', '#757575' );

    $knote_contact_text_sticky_color               = get_theme_mod( 'knote_builder_contact_info_text_sticky_color', '#212121' );
    $knote_contact_text_sticky_color_hover         = get_theme_mod( 'knote_builder_contact_info_text_sticky_color_hover', '#757575' );

    $styles[] = '--contact-icon-color:'.esc_attr( $knote_contact_icon_color );
    $styles[] = '--contact-icon-color-hover:'.esc_attr( $knote_contact_icon_color_hover );
    $styles[] = '--contact-text-color:'.esc_attr( $knote_contact_text_color );
    $styles[] = '--contact-text-color-hover:'.esc_attr( $knote_contact_text_color_hover );

    if( get_theme_mod('knote_header_builder_sticky_enable', 0) ){
        $styles[] = '--contact-icon-sticky-color:'.esc_attr( $knote_contact_icon_sticky_color );
        $styles[] = '--contact-icon-sticky-color-hover:'.esc_attr( $knote_contact_icon_sticky_color_hover );
        $styles[] = '--contact-text-sticky-color:'.esc_attr( $knote_contact_text_sticky_color );
        $styles[] = '--contact-text-sticky-color-hover:'.esc_attr( $knote_contact_text_sticky_color_hover );
    }


    ?>

    <div class="header-contact<?php echo ($knote_display_inline ? ' inline' : ''); ?>"
         style="<?php echo esc_attr( implode(';', $styles ) );?>"
    >

        <?php if ($knote_email) : ?>
            <a href="mailto:<?php echo esc_attr(antispambot($knote_email)); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-mail">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
                <?php echo esc_html(antispambot($knote_email)); ?>
            </a>
        <?php endif; ?>

        <?php if ($knote_phone) : ?>
            <a href="tel:<?php echo esc_attr($knote_phone); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-phone">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                </svg>
                <?php echo esc_html($knote_phone); ?>
            </a>
        <?php endif; ?>

    </div>

</div>
