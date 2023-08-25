<?php
/**
 * Theme dashboard settings
 */

 if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if( ! is_admin() ) {
	return;
}

function knote_settings_variables(){

    $settings = array();

    //General
	$settings['premium']        = false;
    $settings['menu_slug']      = 'starter';
	$settings['starter_slug']   = 'codegear-starter';
	$settings['starter_path']   = 'codegear-starter/codegear-starter.php';
	$settings['website_link']   = 'https://codegearthemes.com.com/';

    //Hero
    $settings['hero_title']    = esc_html__( 'Welcome to knote', 'knote' );
    $settings['hero_details']  = esc_html__( 'Knote is now installed and ready to go. To help you with the next step, we have gathered together on this page all the resources you might need. We hope you enjoy using knote.', 'knote' );


    //Features
    $settings['features'] = array();
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
		'link'      => add_query_arg('autofocus[panel]', 'knote_panel_typography', admin_url('customize.php'))
	);

    //Premium
	$settings['upgrade_premium'] = 'https://codegearthemes.com/upgrade?utm_source=theme_info&utm_medium=link&utm_campaign=Knote';


    // Premium features.
	$settings['features'][] = array(
		'type'          => 'pro',
		'title'         => esc_html__('Custom Fonts', 'knote'),
		'content'       => esc_html__('Upload your own custom fonts.', 'knote'),
		'label'         => esc_html__('Learn more', 'knote'),
		'link'          => add_query_arg('autofocus[section]', 'knote_section_typography_general', admin_url('customize.php')),
		'docs_link'     => 'https://docs.codegearthemes.com/article/pro-custom-fonts/'
	);

    $settings['features'][] = array(
		'type'   	=> 'pro',
		'title'  	=> esc_html__('Table of Contents', 'knote'),
		'content'   	=> esc_html__('Display a table of contents inside your article.', 'knote'),
        'label' => esc_html__('Learn More', 'knote'),
		'link' => 'https://docs.codegearthemes.com/article/pro-single-post-table-of-contents/'
	);

    $settings['features'][] = array(
		'type'       => 'pro',
		'title'      => esc_html__('White Label (Agency)', 'knote'),
		'content'       => esc_html__('Rename and present as your own product.', 'knote'),
		'label' => esc_html__('Learn More', 'knote'),
		'link'  => 'https://docs.codegearthemes.com/article/pro-white-label/',
	);

    // Review
	$settings['review_link']       = 'https://wordpress.org/support/theme/knote/reviews/';
	$settings['suggest_idea_link'] = 'https://codegearthemes.com/pages/feature-request/';

	// Community
	$settings['community_link'] = 'https://www.facebook.com/groups/codegearonline/';

    return $settings;

}
add_filter('knote_dashboard_settings', 'knote_settings_variables');
