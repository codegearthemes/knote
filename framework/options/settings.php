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

	//Features
	$settings['starter'] = array();

	$settings['starter'][] = array(
		'title' 		=> esc_html__('Agency', 'knote'),
		'thumbnail'  	=> 'https://wpcodegear.com/wp/agency/wp-assets/thumb.webp',
	);

	$settings['starter'][] = array(
		'title' 		=> esc_html__('Electrician', 'knote'),
		'thumbnail'  	=> 'https://wpcodegear.com/wp/electrician/wp-assets/thumb.webp',
	);

	$settings['starter'][] = array(
		'title' 		=> esc_html__('Photography', 'knote'),
		'thumbnail'  	=> 'https://wpcodegear.com/wp/photography/wp-assets/thumb.webp',
	);

	$settings['starter'][] = array(
		'title' 		=> esc_html__('Wellness', 'knote'),
		'thumbnail'  	=> 'https://wpcodegear.com/wp/wellness/wp-assets/thumb.webp',
	);

	// Review
	$settings['theme_link']			= 'https://wordpress.org/themes/knote/';
	$settings['support_link']	   	= 'https://wordpress.org/support/theme/knote/';
	$settings['review_link']       	= 'https://wordpress.org/support/theme/knote/reviews/';
	$settings['suggest_idea_link'] 	= 'https://codegearthemes.com/pages/feature-request/';

	// Documentation
	$settings['docs_link'] 		= 'https://github.com/codegearthemes/knote/wiki';
	$settings['changelog_link'] = 'https://wordpress.org/themes/knote/';

	// Community
	$settings['community_link'] = 'https://www.facebook.com/groups/codegearonline/';

	return $settings;
}
add_filter('knote_dashboard_settings', 'knote_settings_variables');
