<?php
/*
Plugin Name: ACF Tooltip
Plugin URI: http://www.dreihochzwo.de/advanced-custom-fields-show-instructions-as-tooltip
Description: Displays ACF Field description as tooltips
Version: 1.0.0
Author: Thomas Meyer
Author URI: http://www.dreihochzwo.de
Text Domain: acf_tooltip
Domain Path: /languages/
License: GPLv2 or later.
Copyright: Kyle Phillips
*/

/*  Copyright 2014 Thomas Meyer  (email : support@dreihochzwo.de)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

load_plugin_textdomain( 'acf-tooltip', false, dirname( plugin_basename(__FILE__) ) . '/language/' );

/**
 * Let's make sure ACF Pro is installed & activated
 * If not, we give notice and kill the activation of ACF Media Credit.
 * Also works if ACF Pro is deactivated.
 * @donaldG
 */
add_action('admin_init', 'acf_pro_or_die');
function acf_pro_or_die(){
	if (! function_exists('acf_register_repeater_field') && ! class_exists('acf') ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );   
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
		add_action( 'admin_notices', 'acf_dependent_plugin_notice' );
	}
}

function acf_dependent_plugin_notice(){
	?><div class="error"><p><?php _e('ACF Tooltip requires Advanced Custom Fields Pro or the free version of ACF (Version 4) to be installed &amp; activated.', 'acf-tooltip') ?></p></div>
<?php
}

if (!function_exists('get_plugins')) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$plugins = get_plugins();
	// echo "<pre>";
	// print_r($plugins);
	// echo "</pre>";

	if ( isset($plugins['advanced-custom-fields-pro/acf.php']) ) {

		wp_enqueue_script( 'jquery-qtip', plugin_dir_url( __FILE__ ) . '/js/jquery.qtip.min.js' );
		wp_enqueue_style( 'jquery-qtip.js', plugin_dir_url( __FILE__ ) . '/css/jquery.qtip.min.css' );

		if ( $plugins['advanced-custom-fields-pro/acf.php']['Version'] >= 5 && is_plugin_active('advanced-custom-fields-pro/acf.php') ) {
			include_once('acf-tooltip-v5.php');
		} elseif ( $plugins['advanced-custom-fields/acf.php']['Version'] >= 4 && is_plugin_active('advanced-custom-fields/acf.php') ) {
			include_once('acf-tooltip-v4.php');
		}

	}
