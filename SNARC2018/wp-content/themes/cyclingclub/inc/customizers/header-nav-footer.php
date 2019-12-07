<?php

/**
 * Cycling Club Theme Customizer
 *
 * @package cyclingclub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cyclingclub_customize_register_header_nav_footer( $wp_customize ) {

	/*
	 * This adds a setting in the customiser to change
	 * the accent colour through out the site.
	 *
	 * add the setting to the /js/customizer.js for live preview
	 * 
	 */
	
	// add a setting to change the accent colour
	$wp_customize->add_setting( 'header_background',
		array(
			'default'    => '#0F1E29',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'cyclingclub_sanitize_hex_color',
			'transport'  => 'postMessage',
		) 
	);      

	// define the colour control for the accent colour
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background',
		array(
			'label'      => __( 'Header, Nav, Footer Background', 'cyclingclub' ),
			'priority'   => 10,
			'section'    => 'colors',
		)
	));
	
	// get the setting and show in the preview
	$wp_customize->get_setting( 'header_background' )->transport = 'postMessage';

}
add_action( 'customize_register', 'cyclingclub_customize_register_header_nav_footer' );
