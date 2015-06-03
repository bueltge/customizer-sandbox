<?php # -*- coding: utf-8 -*-
/**
 * Plugin Name: Customize Login
 * Plugin URI:  https://github.com/bueltge/customizer-sandbox
 * Description: Customize the Login with the help of the Customizer
 * Author:      Frank Bültge
 * Version:     2015-05-03
 * Author URI:  http://bueltge.de/
 * Text Domain: customize-login
 * Domain Path: /languages
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace CustomizeLogin;

\add_action( 'init', __NAMESPACE__ . '\init' );
/**
 * Include in WP stack
 */
function init() {

	require_once( plugin_dir_path( __FILE__ ) . 'inc/admin.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'inc/customizer.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'inc/head-style.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'inc/remove-defaults.php' );
}
