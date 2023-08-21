<?php
/**
 * General
 */
$wp_customize->add_section(
    new Knote_Section_Title(
        $wp_customize,
        'knote_section_general',
        array(
            'title'    => esc_html__( 'General', 'knote' ),
            'priority' => 10,
        )
    )
);

/**
 * Header
 */
$wp_customize->add_section(
    new Knote_Section_Title(
        $wp_customize,
        'knote_section_header',
        array(
            'title'    => esc_html__( 'Header', 'knote' ),
            'priority' => 10,
        )
    )
);
