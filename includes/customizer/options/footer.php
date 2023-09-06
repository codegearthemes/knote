<?php
/**
 * Footer Customizer options
 *
 * @package Knote
 */

/*--------------------------------------------
	Footer Panel
---------------------------------------------*/
$wp_customize->add_panel( 'knote_footer_panel',
	array(
		'title'         => esc_html__( 'Footer', 'knote'),
		'priority'      => 26,
	)
);
