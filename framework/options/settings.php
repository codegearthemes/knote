<?php

/**
 * Theme dashboard settings
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!is_admin()) {
	return;
}

function knote_settings_variables(){

	$settings = array();

	//General
	$settings['has_pro']        = false;
	$settings['menu_slug']      = 'knote';
	$settings['starter_slug']   = 'codegear-starter';
	$settings['starter_menu_slug']   = 'starter';
	$settings['starter_path']   = 'codegear-starter/codegear-starter.php';
	$settings['website_link']   = 'https://codegearthemes.com.com/';

	//Hero
	$settings['hero_title']    = esc_html__('Welcome to Knote', 'knote');
	$settings['hero_details']  = esc_html__('Knote is now installed and ready to go. To help you with the next step, we have gathered together on this page all the resources you might need. We hope you enjoy using knote.', 'knote');


	//Features
	$settings['features'] = array();

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Layout', 'knote'),
		'content'    => esc_html__('Set the default site layout', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[section]', 'knote_layout_section', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'      => 'free',
		'title'     => esc_html__('Site Identity', 'knote'),
		'content'   => esc_html__('Set the title and upload logo.', 'knote'),
		'label'     => esc_html__('Customize', 'knote'),
		'link'      => add_query_arg('autofocus[control]', 'blogname', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'      => 'free',
		'title'     => esc_html__('Global Colors', 'knote'),
		'content'   => esc_html__('Create your own palette and set the global colors.', 'knote'),
		'label'     => esc_html__('Customize', 'knote'),
		'link'      => add_query_arg('autofocus[section]', 'colors', admin_url('customize.php'))
	);

	$settings['features'][] = array(
		'type'      => 'free',
		'title'     => esc_html__('Typography', 'knote'),
		'content'   => esc_html__('Set the global font size, style and library.', 'knote'),
		'label'     => esc_html__('Customize', 'knote'),
		'link'      => add_query_arg('autofocus[panel]', 'knote_typography_panel', admin_url('customize.php'))
	);

	$settings['features'][] = array(
		'type'      => 'free',
		'title'     => esc_html__('Header builder', 'knote'),
		'content'   => esc_html__('Drag and drop header builder.', 'knote'),
		'label' 	=> esc_html__('Customize', 'knote'),
		'link'   	=> add_query_arg('autofocus[section]', 'knote_section_header_wrapper', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Footer builder', 'knote'),
		'content'    => esc_html__('Drag and drop footer builder.', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[section]', 'knote_section_footer_wrapper', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Buttons', 'knote'),
		'content'    => esc_html__('Create your own button, set typography and styles.', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[section]', 'knote_button_section', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Archive layout', 'knote'),
		'content'    => esc_html__('Set the blog layout, columns, pagination and styles.', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[section]', 'knote_archive_section', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Single Post', 'knote'),
		'content'    => esc_html__('Set the single post layout, meta elements and styles.', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[section]', 'knote_single_section', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Product Catalog', 'knote'),
		'content'    => esc_html__('Set the shop layout, product card and more.', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[section]', 'woocommerce_product_catalog', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Single Product', 'knote'),
		'content'    => esc_html__('Set the product layout, tabs and more.', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[section]', 'knote_single_product_layout_section', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Cart', 'knote'),
		'content'    => esc_html__('Set the cart layout, mini cart and more.', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[panel]', 'woocommerce', admin_url('customize.php')),
	);

	$settings['features'][] = array(
		'type'       => 'free',
		'title'      => esc_html__('Checkout', 'knote'),
		'content'    => esc_html__('Set the checkout layout, coupon and more.', 'knote'),
		'label' 	 => esc_html__('Customize', 'knote'),
		'link'   	 => add_query_arg('autofocus[section]', 'woocommerce_checkout', admin_url('customize.php')),
	);

	//Premium
	$settings['upgrade_premium'] = 'https://codegearthemes.com/upgrade';


	// Premium features.
	$settings['features'][] = array(
		'type'          => 'pro',
		'title'         => esc_html__('Custom Fonts', 'knote'),
		'content'       => esc_html__('Upload your own custom fonts.', 'knote'),
		'label'         => esc_html__('Learn more', 'knote'),
		'link'          => add_query_arg('autofocus[section]', 'knote_section_typography_general', admin_url('customize.php')),
		'docs_link'     => 'https://docs.codegearthemes.com/article/custom-fonts/'
	);

	$settings['features'][] = array(
		'type'   	=> 'pro',
		'title'  	=> esc_html__('Table of Contents', 'knote'),
		'content'   => esc_html__('Display a table of contents inside your article.', 'knote'),
		'label' 	=> esc_html__('Learn More', 'knote'),
		'link' 		=> 'https://docs.codegearthemes.com/article/single-post-table-of-contents/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Drawer cart', 'knote'),
		'content'    => esc_html__('Enable drawer cart for conversion.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/drawer-cart/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Drawer cart upsell', 'knote'),
		'content'    => esc_html__('Enable upsell on empty drawer cart.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/drawer-cart-upsell/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Checkout upsell', 'knote'),
		'content'    => esc_html__('Enable upsell on checkout.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/checkout-upsell/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Post purchase upsell', 'knote'),
		'content'    => esc_html__('Enable upsell after purchase.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/post-checkout-upsell/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Product color swatch', 'knote'),
		'content'    => esc_html__('Enable this options to show product swatches.', 'knote'),
		'label'      => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/product-swatch/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Product image hover', 'knote'),
		'content'    => esc_html__('Swap the product image on mouse over.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/product-image-hover/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Product trust badge', 'knote'),
		'content'    => esc_html__('Increase conversion with product trust badge.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/product-trust-badge/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Related product slider', 'knote'),
		'content'    => esc_html__('Showcase more products with related product slider.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/related-product-slider/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Upsell product slider', 'knote'),
		'content'    => esc_html__('Showcase more products with upsell product slider.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/upsell-product-slider/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Product builder', 'knote'),
		'content'    => esc_html__('Create a landing page for a product', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/product-landing-page/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Advanced review', 'knote'),
		'content'    => esc_html__('Showcase customer review in different layout.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/advanced-product-review/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Product tab style', 'knote'),
		'content'    => esc_html__('Set the tab layout, position, alignment and more.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/advanced-product-review/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Buy now', 'knote'),
		'content'    => esc_html__('Enable buy now button for product.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/product-buy-now/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Mega menu', 'knote'),
		'content'    => esc_html__('Create megamenu to add more links.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/mega-menu/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Weekly sale', 'knote'),
		'content'    => esc_html__('Enable countdown for weekly sale.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/weekly-sale/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Daily sale', 'knote'),
		'content'    => esc_html__('Enable daily sale for urgency.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/daily-sale/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Free shipping progress bar', 'knote'),
		'content'    => esc_html__('Enable shipping progress bar for conversion.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/free-shipping-bar/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Payment icons', 'knote'),
		'content'    => esc_html__('Add payment icons for information.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/payment-icons/'
	);

	$settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('Reading progress bar', 'knote'),
		'content'    => esc_html__('Enable reading progress bar.', 'knote'),
		'label' 	 => esc_html__('Learn more', 'knote'),
		'link'  	 => 'https://docs.codegearthemes.com/article/reading-progress-bar/'
	);

	//Features
	$settings['starter'] = array();

	$settings['starter'][] = array(
		'title' 		=> esc_html__('Agency', 'knote'),
		'thumbnail'  	=> 'https://demo.codegearthemes.com/knote/agency/wp-assets/thumb.webp',
	);

	$settings['starter'][] = array(
		'title' 		=> esc_html__('Electrician', 'knote'),
		'thumbnail'  	=> 'https://demo.codegearthemes.com/knote/electrician/wp-assets/thumb.webp',
	);

	$settings['starter'][] = array(
		'title' 		=> esc_html__('Photography', 'knote'),
		'thumbnail'  	=> 'https://demo.codegearthemes.com/knote/photography/wp-assets/thumb.webp',
	);

	$settings['starter'][] = array(
		'title' 		=> esc_html__('Wellness', 'knote'),
		'thumbnail'  	=> 'https://demo.codegearthemes.com/knote/wellness-yoga/wp-assets/thumb.webp',
	);

	// Review
	$settings['theme_link']			= 'https://wordpress.org/themes/knote/';
	$settings['support_link']	   	= 'https://wordpress.org/support/theme/knote/';
	$settings['review_link']       	= 'https://wordpress.org/support/theme/knote/reviews/';
	$settings['suggest_idea_link'] 	= 'https://codegearthemes.com/pages/feature-request/';

	// Documentation
	$settings['docs_link'] 		= 'https://github.com/CodegearThemes/knote/wiki';
	$settings['changelog_link'] = 'https://codegearthemes.com/pages/changelog-knote/';

	// Community
	$settings['community_link'] = 'https://www.facebook.com/groups/codegearonline/';

	return $settings;
}
add_filter('knote_dashboard_settings', 'knote_settings_variables');
