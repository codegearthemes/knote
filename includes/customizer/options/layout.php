<?php
/*--------------------------------------------
## Layout Panel
---------------------------------------------*/
$wp_customize->add_section( 'knote_layout_section',
    array(
        'title'          => esc_html__( 'Layout', 'knote' ),
        'capability'     => 'edit_theme_options',
        'priority'       => 16,
    )
);

$wp_customize->add_setting( 'knote_site_layout',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control(
	new Knote_Control_RadioImage(
		$wp_customize,
		'knote_site_layout',
		array(
			'label'    => esc_html__( 'Site layout', 'knote' ),
			'section'  => 'knote_layout_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'default' => array(
					'label' => esc_html__( 'Default', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/default.svg'
                ),
				'boxed' => array(
					'pro' => true,
					'label' => esc_html__( 'Boxed', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/boxed.svg'
				),
				'fixed' => array(
					'pro' => true,
					'label' => esc_html__( 'Fixed', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/padded.svg'
				),
				'fluid' => array(
					'pro' => true,
					'label' => esc_html__( 'Fluid', 'knote' ),
					'url'   => '%s/assets/admin/src/layout/fluid.svg'
				)
			),
			'priority'  => 10
		)
	)
);





