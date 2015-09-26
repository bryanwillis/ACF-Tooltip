<?php
/*
Plugin Name: ACF Tooltip
Plugin URI: http://www.dreihochzwo.de/advanced-custom-fields-show-instructions-as-tooltip
Description: Displays ACF Field description as tooltips
Version: 1.1.1
Author: Thomas Meyer
Author URI: http://www.dreihochzwo.de
Text Domain: acf_tooltip
Domain Path: /languages/
License: GPLv2 or later.
Copyright: Thomas Meyer
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
 * If not, we give notice and kill the activation of ACF Tooltip.
 * Also works if ACF Pro is deactivated.
 */
function acf_or_die(){
	if (!class_exists('acf') ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );   
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
		add_action( 'admin_notices', 'acf_dependent_plugin_notice' );
	}
}
add_action('admin_init', 'acf_or_die');

function acf_dependent_plugin_notice(){
	?><div class="error"><p><?php _e('ACF Tooltip requires Advanced Custom Fields 5 (Pro) or Advanced Custom Fields Version 4 to be installed &amp; activated.', 'acf-tooltip') ?></p></div>
<?php
}

// Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_tooltip( $version ) {
	include_once('acf-tooltip-v5.php');
}
add_action('acf/include_field_types', 'include_field_types_tooltip');