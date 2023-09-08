<?php

// Cannot access directly.
if ( ! defined( 'ABSPATH' ) ) { die; }

global $pagenow;

$user   = wp_get_current_user(); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$screen = get_current_screen(); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound

?>
<div class="page-width">
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
                        <?php echo wp_kses_post($this->settings['hero_title']); ?>
                        <?php if ( $this->settings['premium'] ) { ?>
                            <span class="badge badge-success"><?php esc_html_e('Pro', 'knote'); ?></span>
                        <?php } else { ?>
                            <span class="badge badge-upgrade"><?php esc_html_e('Free', 'knote'); ?></span>
                        <?php } ?>
                    </div>
                    <div class="hero-description">
                        <?php echo wp_kses_post($this->settings['hero_details']); ?>
                    </div>
                    <div class="hero-actions">
                        <?php
                            $plugin_status = 'inactive';
                            if ('active' === $this->get_plugin_status( $this->settings['starter_path'] ) ) {
                                $plugin_status = 'active';
                            }
                        ?>
                        <a id="starter-install" href="<?php echo esc_url( add_query_arg('page', $this->settings['starter_menu_slug'], admin_url('themes.php'))); ?>" data-status="<?php echo esc_attr( $plugin_status ); ?>" class="button button-primary">
                            <?php esc_html_e('View starter sites', 'knote'); ?>
                        </a>

                        <?php if ( 'themes.php' === $pagenow && 'themes' === $screen->base ) { ?>
                            <a href="<?php echo esc_url(add_query_arg('page', $this->settings['menu_slug'], admin_url('admin.php'))); ?>" class="button button-secondary">
                                <?php esc_html_e('View theme dashboard', 'knote'); ?>
                            </a>
                        <?php } ?>
                        <?php if ('active' !== $this->get_plugin_status( $this->settings['starter_path'] ) ) { ?>
                            <p class="hero-info">
                                <?php esc_html_e('Clicking “View starter sites” button will install and activate the  codegear starter plugin.', 'knote'); ?>
                            </p>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="main-content">

        <div class="panel primary">
            <div class="content-inner">
                <div class="block block-features">
                    <div class="block-features_header panel-tabs panel-items" data-panel-tabs>
                        <div class="panel-item active" data-selector="features">
                            <h3 type="button"><?php esc_html_e('Home', 'knote'); ?></h3>
                        </div>
                        <div class="panel-item" data-selector="starter">
                            <h3 type="button"><?php esc_html_e('Starter sites', 'knote'); ?></h3>
                        </div>
                        <div class="panel-item" data-selector="settings">
                            <h3 type="button"><?php esc_html_e('Settings', 'knote'); ?></h3>
                        </div>
                        <div class="panel-item" data-selector="compare">
                            <h3 type="button"><?php esc_html_e('Free vs Premium', 'knote'); ?></h3>
                        </div>
                        <div class="panel-item" data-selector="hosting">
                            <h3 type="button"><?php esc_html_e('Hosting', 'knote'); ?></h3>
                        </div>
                    </div>
                    <div class="data-panel__content">
                        <div class="block-content" data-panel="features">
                            <div class="lists block-content__inner">
                                <?php foreach ($this->settings[ 'features' ] as $feature) : // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
                                    if( $feature[ 'type' ] !== 'free' )
                                        continue;
                                    ?>
                                    <div class="list-item">
                                        <div class="icon-left">
                                            <svg viewBox="0 0 64 64" width="32" class="w-16 h-16 shrink-0" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="32" cy="32" r="32" fill="#3FB28F" fill-opacity="0.2"></circle>
                                                <circle cx="32" cy="32" r="20" fill="#3FB28F"></circle>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M29.4428 36.2766L39.8391 24.5044L41.2445 25.7455L29.5627 38.9734L23.2302 32.9722L24.52 31.6112L29.4428 36.2766Z" fill="#fff"></path>
                                            </svg>
                                        </div>
                                        <div class="content-right">
                                            <?php if( isset( $feature['title'] ) ): ?>
                                                <h4><?php echo esc_html( $feature['title'] ); ?></h4>
                                            <?php endif; ?>
                                            <?php if( isset( $feature['content'] ) ): ?>
                                                <p><?php echo esc_html( $feature['content'] ); ?></p>
                                            <?php endif; ?>
                                            <?php if( isset( $feature[ 'link' ] ) ) : ?>
                                                <a href="<?php echo esc_url( $feature['link'] ); ?>" class="text-link text-customize-link" target="_blank">
                                                    <?php echo esc_html( $feature['label'] ); ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right">
                                                        <line x1="7" y1="17" x2="17" y2="7"></line>
                                                        <polyline points="7 7 17 7 17 17"></polyline>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="block-content__premium">
                                <div class="premium-header">
                                    <h2><?php echo esc_html__( 'Upgrade to premium', 'knote' ); ?></h2>
                                    <?php if( ! $this->settings[ 'premium' ] ) : ?>
                                        <a href="<?php echo esc_url( $this->settings['upgrade_premium'] ); ?>" class="text-external-link" target="_blank">
                                            <?php echo esc_html__( 'Upgrade now', 'knote' ); ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right">
                                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                                <polyline points="7 7 17 7 17 17"></polyline>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="lists block-content__inner">
                                    <?php foreach ($this->settings[ 'features' ] as $feature) : // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
                                        if( $feature[ 'type' ] !== 'pro' )
                                            continue;
                                        ?>
                                        <div class="list-item">
                                            <div class="icon-left">
                                                <a href="<?php echo esc_url( $this->settings['upgrade_premium'] ); ?>" class="text-external-link" target="_blank">
                                                    <span><?php esc_html_e('Pro', 'knote'); ?></span>
                                                </a>
                                            </div>
                                            <div class="content-right">
                                                <?php if( isset( $feature['title'] ) ): ?>
                                                    <h4><?php echo esc_html( $feature['title'] ); ?></h4>
                                                <?php endif; ?>
                                                <?php if( isset( $feature['content'] ) ): ?>
                                                    <p><?php echo esc_html( $feature['content'] ); ?></p>
                                                <?php endif; ?>
                                                <?php if( isset( $feature[ 'link' ] ) ) : ?>
                                                    <a href="<?php echo esc_url( $feature['link'] ); ?>" class="text-link text-customize-link" target="_blank">
                                                        <?php echo esc_html( $feature['label'] ); ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right">
                                                            <line x1="7" y1="17" x2="17" y2="7"></line>
                                                            <polyline points="7 7 17 7 17 17"></polyline>
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="block-content" data-panel="compare">

                        </div>
                        <div class="block-content" data-panel="hosting">

                        </div>
                    </div>
                </div>

                <div class="block-support">
                    <div class="column-half">
                        <div class="block ">
                            <div class="panel-head">
                                <h3 class="panel-title"><?php esc_html_e('Support', 'knote'); ?></h3>
                            </div>
                            <div class="column-inner">
                                <div class="column-inner-left">
                                    <div class="panel-content">
                                        <h4><?php esc_html_e('Need help? We\'re here for you!', 'knote'); ?></h4>
                                        <p><?php esc_html_e('Have a question? Hit a bug? Get the help you need, when you need it from our friendly support staff.', 'knote'); ?></p>
                                        <a href="<?php echo esc_url( $this->settings['support_link'] ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e('Get Support', 'knote'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column-half">
                        <div class="block column-inner-right">
                            <div class="panel-head">
                                <h3 class="panel-title"><?php esc_html_e('Community', 'knote'); ?></h3>
                            </div>
                            <div class="panel-content">
                                <h4><?php esc_html_e('Join our community', 'knote'); ?></h4>
                                <p><?php esc_html_e('Discuss products and ask for community support or help the community.', 'knote'); ?></p>
                                <a href="<?php echo esc_url( $this->settings['community_link'] ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e('Join Now', 'knote'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php do_action( 'knote_admin_content' ); ?>
    </div>
</div>
