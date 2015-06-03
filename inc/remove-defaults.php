<?php # -*- coding: utf-8 -*-

namespace CustomizeLogin\RemoveDefaults;

/**
 * Simple with default method for each section
 */
\add_action( 'customize_register', 'CustomizeLogin\RemoveDefaults\remove_sections', 99 );
/**
 * Remove sections
 */
function remove_sections() {
	global $wp_customize;

	// remove the Header Image from theme
	$wp_customize->remove_section( 'header_image' );
	// remove color from theme
	$wp_customize->remove_section( 'colors' );
}

/**
 * Alternative way about the controls
 */
\add_filter( 'customize_control_active', 'CustomizeLogin\RemoveDefaults\remove_defaults', 10, 2 );
/**
 * Filter response of WP_Customize_Control::active().
 *
 * @param $active  bool  Whether the Customizer control is active.
 * @param $control
 *
 * @return bool
 */
function remove_defaults( $active, $control ) {

	return TRUE;
}
