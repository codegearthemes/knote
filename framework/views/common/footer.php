<?php

if ( ! defined( 'ABSPATH' ) ) { die; }

function knote_admin_footer(){ ?>
    <div class="section-footer">
        <div class="page-width">
            <div class="footer primary">
                <div class="footer-center">
                    <div class="content">
                        <div class="content-left">
                            <h4><?php esc_html_e('Have an idea or feedback? ', 'knote'); ?></h4>
                            <p><?php esc_html_e('Got an idea for how to improve Knote? Let us know.', 'knote'); ?></p>
                        </div>
                        <div class="content-left">
                            <a href="<?php echo esc_url('https://codegearthemes.com/contact'); ?>" target="_blank" class="text-link text-customize-link" target="_blank">
                                <?php esc_html_e('Suggest an idea', 'knote'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right">
                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
add_action( 'knote_admin_content_after', 'knote_admin_footer', 100 );
