<?php

if ( ! defined( 'ABSPATH' ) ) { die; }

function knote_admin_header(){ ?>
    <div class="section-header">
        <div class="header">
            <div class="header-left">
                <div class="header-column header-logo">
                    <div class="branding">
                        <a href="<?php echo esc_url('https://codegearthemes.com/'); ?>" target="_blank">
                            <img width="220px" src="<?php echo esc_url(get_template_directory_uri() . '/assets/admin/src/logo.png'); ?>" alt="<?php esc_attr_e('CodeGearThemes', 'knote'); ?>">
                        </a>
                    </div>
                </div>
            </div>

            <div class="header-right">

            </div>
        </div>
    </div>
<?php
}
add_action( 'knote_admin_content_before', 'knote_admin_header', 15 );
