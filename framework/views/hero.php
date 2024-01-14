<?php
// Cannot access directly.
if ( ! defined( 'ABSPATH' ) ) { die; }

global $pagenow;

$user   = wp_get_current_user(); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$screen = get_current_screen(); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound

$settings = \KnoteFramework::get_instance()->get_settings();
?>
<div class="block-theme__screen theme-panel">
    <div class="section-hero">
        <div class="content">
            <div class="hero-content">
                <div class="hero-content__left">
                    <div class="hero-welcome">
                        <?php esc_html_e('Hello, ', 'knote'); ?>
                        <?php echo esc_html($user->display_name); ?>
                        <?php esc_html_e('👋', 'knote'); ?>
                    </div>
                    <div class="hero-title">
                        <?php echo wp_kses_post($settings['hero_title']); ?>
                        <?php if ( $settings['has_pro'] ) { ?>
                            <span class="badge badge-success"><?php esc_html_e('Pro', 'knote'); ?></span>
                        <?php } else { ?>
                            <span class="badge badge-upgrade"><?php esc_html_e('Free', 'knote'); ?></span>
                        <?php } ?>
                    </div>
                    <div class="hero-description">
                        <?php echo wp_kses_post($settings['hero_details']); ?>
                    </div>
                    <div class="hero-actions">
                        <?php
                            $plugin_status = 'inactive';
                            if ('active' === $this->get_plugin_status( $settings['starter_path'] ) ) {
                                $plugin_status = 'active';
                            }
                        ?>
                        <a id="starter-install" href="<?php echo esc_url( add_query_arg('page', $settings['starter_menu_slug'], admin_url('themes.php'))); ?>" data-status="<?php echo esc_attr( $plugin_status ); ?>" class="button button-primary">
                            <?php esc_html_e('View starter sites', 'knote'); ?>
                        </a>

                        <?php if ( 'themes.php' === $pagenow && 'themes' === $screen->base ) { ?>
                            <a href="<?php echo esc_url(add_query_arg('page', $settings['menu_slug'], admin_url('admin.php'))); ?>" class="button button-secondary">
                                <?php esc_html_e('View theme dashboard', 'knote'); ?>
                            </a>
                        <?php } ?>
                        <?php if ('active' !== $this->get_plugin_status( $settings['starter_path'] ) ) { ?>
                            <p class="hero-info">
                                <?php esc_html_e('Clicking “View starter sites” button will install and activate the  codegear starter plugin.', 'knote'); ?>
                            </p>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
