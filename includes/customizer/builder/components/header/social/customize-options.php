<?php
/**
 * Builder
 * Social
 *
 * @package Knote
 */

$wp_customize->add_section(
    'knote_header_component_social',
    array(
        'title'      => esc_html__( 'Social Icons', 'knote' ),
        'panel'      => 'knote_header_panel'
    )
);

$wp_customize->add_setting(
    'knote_header_component_social_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Tabs (
        $wp_customize,
        'knote_header_component_social_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'knote_header_component_social',
            'controls_general'		=> json_encode(
                array(
                    '#customize-control-knote_header_component_social_facebook_url',
                    '#customize-control-knote_header_component_social_twitter_url',
                    '#customize-control-knote_header_component_social_linkedin_url',
                    '#customize-control-knote_header_component_social_instagram_url',
                    '#customize-control-knote_header_component_social_youtube_url'
                )
            ),
            'controls_design'		=> json_encode(
                array(
                    '#customize-control-knote_header_component_social_color',
                    '#customize-control-knote_header_component_social_color_divider',
                    '#customize-control-knote_header_component_social_sticky_title',
                    '#customize-control-knote_header_component_social_sticky_color',
                    '#customize-control-knote_header_component_social_sticky_color_divider',
                    '#customize-control-knote_header_component_social_margin',
                    '#customize-control-knote_header_component_social_padding'
                )
            ),
            'priority' 				=> 20
        )
    )
);

$knote_social_icons = array('facebook', 'twitter', 'linkedin', 'instagram', 'youtube');
foreach ($knote_social_icons as $icon) {

    $label = ucfirst($icon);
    $wp_customize->add_setting('knote_header_component_social_' . $icon . '_url', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('knote_header_component_social_' . $icon . '_url', array(
        'label'         => esc_html($label),
        'type'          => 'url',
        'section'       => 'knote_header_component_social',
        'priority' 				=> 25
    ));
}


// Icons Color.
$wp_customize->add_setting(
	'knote_header_component_social_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_social_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_social_color',
        array(
            'label'    => esc_html__( 'Icons color', 'knote' ),
            'section'  => 'knote_header_component_social',
            'settings' => array(
                'normal' => 'knote_header_component_social_color',
                'hover'  => 'knote_header_component_social_color_hover',
            ),
            'priority' => 25
        )
    )
);

$wp_customize->add_setting( 'knote_header_component_social_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_header_component_social_color_divider',
		array(
			'section' 		=> 'knote_header_component_social',
			'priority' 			=> 25
		)
	)
);

// Sticky Header - Title
$wp_customize->add_setting(
    'knote_header_component_social_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Knote_Control_Text(
        $wp_customize,
        'knote_header_component_social_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Header - Active State', 'knote' ),
            'description'     => esc_html__( 'Control the colors when the sticky header state is active.', 'knote' ),
            'section' 		  => 'knote_header_component_social',
            'active_callback' => 'knote_sticky_header_enabled',
            'priority'	 	  => 32
        )
    )
);

// Sticky Header - Icons Color.
$wp_customize->add_setting(
	'knote_header_component_social_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_setting(
	'knote_header_component_social_sticky_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'knote_sanitize_hex_rgba'
	)
);
$wp_customize->add_control(
    new Knote_Control_ColorGroup(
        $wp_customize,
        'knote_header_component_social_sticky_color',
        array(
            'label'    => esc_html__( 'Icons Color', 'knote' ),
            'section'  => 'knote_header_component_social',
            'settings' => array(
                'normal' => 'knote_header_component_social_sticky_color',
                'hover'  => 'knote_header_component_social_sticky_color_hover',
            ),
            'active_callback' => 'knote_sticky_header_enabled',
            'priority' => 33
        )
    )
);

$wp_customize->add_setting( 'knote_header_component_social_sticky_color_divider',
	array(
		'sanitize_callback' => 'knote_sanitize_text'
	)
);

$wp_customize->add_control(
	new Knote_Control_Divider(
		$wp_customize,
		'knote_header_component_social_sticky_color_divider',
		array(
			'section' 		=> 'knote_header_component_social',
            'active_callback' => 'knote_sticky_header_enabled',
			'priority' 			=> 33
		)
	)
);

// Margin
$wp_customize->add_setting(
    'knote_header_component_social_margin_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_social_margin_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_social_margin_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_social_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'knote' ),
            'section'         	=> 'knote_header_component_social',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem'),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_social_margin_desktop',
                'tablet'  => 'knote_header_component_social_margin_tablet',
                'mobile'  => 'knote_header_component_social_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Padding
$wp_customize->add_setting(
    'knote_header_component_social_padding_desktop',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_social_padding_tablet',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_setting(
    'knote_header_component_social_padding_mobile',
    array(
        'default'           => '{ "unit": "px","top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'knote_sanitize_text'
    )
);
$wp_customize->add_control(
    new Knote_Control_Dimensions(
        $wp_customize,
        'knote_header_component_social_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'knote' ),
            'section'         	=> 'knote_header_component_social',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'             => array( 'px', 'em', 'rem'),
            'responsive'   	    => true,
            'settings'        	=> array(
                'desktop' => 'knote_header_component_social_padding_desktop',
                'tablet'  => 'knote_header_component_social_padding_tablet',
                'mobile'  => 'knote_header_component_social_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);
