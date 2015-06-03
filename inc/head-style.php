<?php # -*- coding: utf-8 -*-

namespace CustomizeLogin\HeadStyle;

\add_action( 'login_head', 'CustomizeLogin\HeadStyle\get_custom_style' );
/**
 * Styles from theme options
 * Write in head of login front end
 *
 * @return   void
 */
function get_custom_style() {

	$settings = \CustomizeLogin\Customizer\get_settings();

	?>
	<style type="text/css">
		body {
			background: <?php echo esc_attr( $settings[ 'background_color' ] ); ?>;
		}
	</style>
	<?php
}
