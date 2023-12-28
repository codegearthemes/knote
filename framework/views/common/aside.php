<?php

if (!defined('ABSPATH')) {
    die;
}

function knote_admin_sidebar(){

$options = \KnoteFramework::get_instance()->get_settings();

?>
    <div class="panel aside">
        <div class="secondary">
            <div class="panel block premium">
                <div class="premium-head">
                    <h3>
                        <span><?php esc_html_e('Priority Support', 'knote'); ?></span>
                        <label><?php esc_html_e('Premium', 'knote'); ?></label>
                    </h3>
                </div>
                <div class="panel-content">
                    <p class="description"><?php esc_html_e('Want your questions answered faster? Go Pro to be first in the queue!', 'knote'); ?></p>
                    <div class="upgrade">
                        <svg viewBox="0 0 64 64" class="w-16 h-16 shrink-0" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="32" cy="32" r="32" fill="#1238BF" fill-opacity="0.2"></circle>
                            <circle cx="32" cy="32" r="20" fill="#1238BF"></circle>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.4428 36.2766L39.8391 24.5044L41.2445 25.7455L29.5627 38.9734L23.2302 32.9722L24.52 31.6112L29.4428 36.2766Z" fill="#fff"></path>
                        </svg>
                    </div>
                    <?php if( !class_exists( 'KnoteToolkit' )): ?>
                        <a class="button" href="<?php echo esc_url($options['upgrade_premium']); ?>" target="_blank">
                            <?php esc_html_e('Upgrade now', 'knote'); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </a>
                    <?php else: ?>
                        <a class="button" href="mailto:support@codegearthemes.com" target="_blank">
                            <?php esc_html_e('Email now', 'knote'); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="panel block">
                <div class="panel-head">
                    <h3 class="panel-title"><?php esc_html_e('Review', 'knote'); ?></h3>
                </div>
                <div class="panel-content">
                    <div class="stars">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" class="star">
                            <path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" class="star">
                            <path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" class="star">
                            <path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" class="star">
                            <path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" class="star">
                            <path xmlns="http://www.w3.org/2000/svg" d="m23.363 8.584-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.044-7.378 1.127c-.606.093-.848.83-.423 1.265l5.36 5.494-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.436.182-1.173-.423-1.266z" fill="#ffc107" data-original="#ffc107"></path>
                        </svg>
                    </div>
                    <p class="description"><?php esc_html_e('It makes us happy to hear from our users. We would appreciate a review.', 'knote'); ?></p>
                    <div class="action-button">
                        <a href="<?php echo esc_url($options['review_link']); ?>" class="button button-secondary" target="_blank"><?php esc_html_e('Submit a review', 'knote'); ?></a>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="panel block">
                <div class="panel-head">
                    <h3 class="panel-title"><?php esc_html_e('Documentation', 'knote'); ?></h3>
                </div>
                <div class="panel-content">
                    <p class="description"><?php esc_html_e('Browse documentation, reference material, and tutorials.', 'knote'); ?></p>
                    <div class="action-button">
                        <a href="<?php echo esc_url($options['docs_link']); ?>" class="button button-secondary" target="_blank"><?php esc_html_e('View more', 'knote'); ?></a>
                    </div>
                </div>
            </div>
            <div class="panel block">
                <div class="panel-head">
                    <h3 class="panel-title"><?php esc_html_e('Free support', 'knote'); ?></h3>
                </div>
                <div class="panel-content">
                    <p class="description"><?php esc_html_e('Post your question on the WordPress.org forum where a member of the team or community will get back to you.', 'knote'); ?></p>
                    <div class="action-button">
                        <a href="<?php echo esc_url($options['support_link']); ?>" class="button button-secondary" target="_blank"><?php esc_html_e('Submit a ticket', 'knote'); ?></a>
                    </div>
                </div>
            </div>
            <div class="panel block support">
                <div class="panel-head">
                    <h3 class="panel-title">
                        <?php esc_html_e('Changelog', 'knote'); ?>
                        <span class="version"><?php echo esc_html((!$options['premium']) ? KNOTE_VERSION : KNOTE_PREMIUM_VERSION); ?></span>
                    </h3>
                </div>
                <div class="panel-content">
                    <p class="description"><?php esc_html_e('Keep informed with the latest changes about each theme.', 'knote'); ?></p>
                    <div class="action-button">
                        <a href="<?php echo esc_url($options['changelog_link']); ?>" target="_blank"><?php esc_html_e('See the changelog', 'knote'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
add_action('knote_admin_content', 'knote_admin_sidebar', 15);
