<?php
/**
 * Builder
 * Branding Component
 *
 * @package Knote
 */

$styles = array();
$margin     = Knote_Styles::dimensions_variables('knote_header_component_logo_margin', 'margin', 'logo');
$padding    = Knote_Styles::dimensions_variables('knote_header_component_logo_padding', 'padding', 'logo');

if (is_array($margin)) {
    $styles = array_merge($styles, $margin);
}

if (is_array($padding)) {
    $styles = array_merge($styles, $padding);
}

$header_title = get_theme_mod( 'knote_enable_site_title', 1);
$header_tagline = get_theme_mod( 'knote_enable_site_tagline', 0);

$alignment  = get_theme_mod( 'knote_header_component_logo_text_alignment', 'center' );

?>
<div class="builder-item component-logo text-<?php echo esc_attr( $alignment ); ?>" style="<?php echo esc_attr( implode(';', $styles ) ); ?>" data-element-id="logo" data-component>
    <?php $this->customizer_edit_button('logo'); ?>
    <div class="site-branding">
        <?php the_custom_logo(); ?>
        <?php if ($header_title) : ?>
            <div class="site-title h1"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></div>
        <?php endif; ?>
        <?php
        if ($header_tagline) :
            $knote_description = get_bloginfo('description', 'display');
            if ($knote_description || is_customize_preview()) : ?>
                <p class="site-description">
                    <?php
                        echo $knote_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    ?>
                </p>
            <?php endif; ?>
        <?php endif; ?>
    </div><!-- .site-branding -->
</div>
