<?php

if (!defined('ABSPATH')) {
    die;
}

function knote_admin_sidebar(){

$options = \KnoteFramework::get_instance()->get_settings();

?>
    <div class="panel aside">
        <div class="secondary">
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
                        <span class="version"><?php echo esc_html( KNOTE_VERSION ); ?></span>
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
