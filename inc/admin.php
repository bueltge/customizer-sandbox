<?php # -*- coding: utf-8 -*-

namespace CustomizeLogin\Admin;

\add_action( 'admin_menu', '\CustomizeLogin\Admin\add_menu' );
function add_menu() {

	if ( ! current_user_can( 'customize' ) ) {
		return NULL;
	}

	add_theme_page(
		esc_html__( 'Customize the Login screen', 'customize-login' ),
		esc_html__( 'Login Screen', 'customize-login' ),
		'manage_options',
		'customize-login',
		'__return_null'
	);
}

\add_action( 'admin_menu', '\CustomizeLogin\Admin\change_menu_url', 99 );
function change_menu_url() {

	global $submenu;

	$parent = 'themes.php';
	$page   = 'customize-login';

	$login_url = wp_login_url();
	$url       = add_query_arg(
		array(
			// Load specific url
			'url'    => urlencode( $login_url ),
			// Add a return url
			'return' => urlencode( admin_url( 'themes.php' ) ),
		),
		admin_url( 'customize.php' )
	);

	// If is Not Design Menu, return
	if ( ! isset( $submenu[ $parent ] ) ) {
		return NULL;
	}

	foreach ( $submenu[ $parent ] as $key => $value ) {
		// Set new URL for menu item
		if ( $page === $value[ 2 ] ) {
			$submenu[ $parent ][ $key ][ 2 ] = $url; //admin_url( 'customize.php' ) . '?url=' . wp_login_url();
			break;
		}
	}
}
