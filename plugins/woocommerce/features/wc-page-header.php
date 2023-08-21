<?php
function knote_woocommerce_page_header(){

    if ( !is_shop() && !is_product_category() && !is_product_tag() && !is_product_taxonomy() ) {
		return;
	}

    // Catalog Options
    $page_title         = get_theme_mod( 'knote_woocommerce_catalog_title', 1);
    $breadcrumb_enable  = get_theme_mod( 'knote_woocommerce_catalog_breadcrumbs', 1 );

    //Remove elements
    add_filter('woocommerce_show_page_title', '__return_false');
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description');
    remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description');

    if( !$page_title ) return;
    $knote_shop_page = get_option('woocommerce_shop_page_id'); ?>
    <header class="woocommerce-products-header woocommerce-page-header page-header entry-header <?php if (has_post_thumbnail($knote_shop_page)) : ?> has-thumbnail <?php endif; ?>">
        <div class="<?php echo esc_attr( apply_filters( 'knote_container_class', 'container' ) ); ?>">
            <div class="block--header-main">
                <?php if (has_post_thumbnail($knote_shop_page)) : ?>
                    <?php echo get_the_post_thumbnail($knote_shop_page, array(1920, 300)); ?>
                <?php endif; ?>

                <div class="block--header-inner">
                    <?php
                        if (is_shop() || is_product_category() || is_product_tag()) : ?>
                            <h1 class="woocommerce-products-header__title page-title entry-title"><?php woocommerce_page_title(); ?></h1>
                        <?php endif; ?>
                        <?php
                            if( $breadcrumb_enable ){

                                $separator = get_theme_mod( 'knote_breadcrumb_separator' );

                            }
                        ?>
                        <?php
                        if (is_shop() || is_product_category() || is_product_tag()) {
                            woocommerce_taxonomy_archive_description();
                            woocommerce_product_archive_description();
                        }
                    ?>
                </div>

            </div>
        </div>
    </header>
<?php
}
add_action('knote_page_header', 'knote_woocommerce_page_header');
