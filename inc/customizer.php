<?php # -*- coding: utf-8 -*-

namespace CustomizeLogin\Customizer;

/**
 * Returns the options array.
 *
 * @param null $value
 *
 * @return Array
 */
function get_settings( $value = NULL ) {

	// @todo reduce redundancies, use class and define var
	$prefix   = 'customize_login';
	$settings = $prefix . '_settings';

	$saved    = (array) get_option( $settings );
	$defaults = get_default_settings();
	$settings = wp_parse_args( $saved, $defaults );
	$settings = array_intersect_key( $settings, $defaults );
	$settings = apply_filters( 'customize_login_settings', $settings );

	if ( NULL !== $value ) {
		return $settings[ $value ];
	}

	return $settings;
}

/**
 * Returns the default options.
 * Use the hook 'documentation_default_theme_options' for change via plugin
 *
 * @param null $value
 *
 * @return Array
 */
function get_default_settings( $value = NULL ) {

	$default_settings = array(
		'background_color' => '#9dcc5a',
	);

	if ( NULL !== $value ) {
		return $default_settings[ $value ];
	}

	return apply_filters( 'customize_login_default_settings', $default_settings );
}

\add_action( 'customize_register', 'CustomizeLogin\Customizer\add_customizer_settings' );
/**
 * Add custom areas, fields to the customizer
 *
 * @param $wp_customize
 */
function add_customizer_settings( $wp_customize ) {

	$defaults = get_default_settings();

	// @todo reduce redundancies, use class and define var
	$prefix     = 'customize_login';
	$panel      = $prefix . '_panel';
	$section    = $prefix . '_section';
	$settings   = $prefix . '_settings';
	$capability = 'edit_theme_options';

	/**
	 * Add new panel for login settings
	 */
	$wp_customize->add_panel(
		$panel,
		array(
			'title'       => esc_html__( 'Login Customizer', 'customize-login' ),
			'description' => esc_html__( 'Switch to this panel to customize the login screen', 'customize-login' ),
			'priority'    => 999,
			'capability'  => $capability,
		)
	);

	/**
	 * Login Section
	 */
	$wp_customize->add_section(
		$section . '_login',
		array(
			'title'    => esc_html__( 'Options', 'customize-login' ),
			'priority' => 10,
			'panel'    => $panel,
		)
	);

	/**
	 * Background Color Control
	 */
	// add field for text color in default section for 'colors'
	$wp_customize->add_setting(
		$settings . '[background_color]',
		array(
			'default'    => $defaults[ 'background_color' ],
			'type'       => 'option',
			'capability' => $capability,
		)
	);

	// add color field include color picker for text color
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize, $settings . '_background_color',
			array(
				'label'    => esc_html__( 'Background Color', 'login-customizer' ),
				'section'  => $section . '_login',
				'settings' => $settings . '[background_color]',
				//'active_callback' => 'CustomizeLogin\Customizer\background_color',
			)
		)
	);

}
