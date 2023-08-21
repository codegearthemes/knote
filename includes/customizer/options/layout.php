<?php
/*--------------------------------------------
	Layout Panel
---------------------------------------------*/
$wp_customize->add_panel( 'knote_layout_panel',
    array(
        'title'          => esc_html__( 'Layout', 'knote' ),
        'capability'     => 'edit_theme_options',
        'priority'       => 20,
    )
);

/*--------------------------------------------
	Page Section
---------------------------------------------*/
$wp_customize->add_setting(
	'knote_enable_page_header',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_enable_page_header',
		array(
			'label'         	=> esc_html__( 'Enable page heading', 'knote' ),
			'section'       	=> 'knote_page_section',
			'settings'      	=> 'knote_enable_page_header',
		)
	)
);

$wp_customize->add_setting(
	'knote_enable_page_breadcrumb',
	array(
		'default'           => 0,
		'sanitize_callback' => 'knote_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Knote_Control_Switch(
		$wp_customize,
		'knote_enable_page_breadcrumb',
		array(
			'label'         	=> esc_html__( 'Enable page breadcrumb', 'knote' ),
			'section'       	=> 'knote_page_section',
			'settings'      	=> 'knote_enable_page_breadcrumb',
		)
	)
);




