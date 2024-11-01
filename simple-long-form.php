<?php
/*
Plugin Name: Simple Long Form
Plugin URI: https://journodev.tech
Description: Réaliser des longs formats sous Wordpress, le plugin facile pour des histoires qui scrollent.
Version: 2.2.2
Author: Laurence/OhMyBox.info
Author URI: https://journodev.tech
Text domain: simplelongform
Domain Path: /languages/
License: GPL2

Simple Long Form is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
Simple Long Form  is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/

if ( ! defined( 'ABSPATH' ) ) exit; 

function simplelongform_init() {
 load_plugin_textdomain( 'simplelongform', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

add_action('init', 'simplelongform_init');

	$plugin_dir_path = plugin_dir_path( __FILE__ );

	include( $plugin_dir_path . 'inc/slf-admin-styles.php');
	include( $plugin_dir_path . 'inc/slf-meta-box.php');
	include( $plugin_dir_path . 'inc/slf-front.php');
	include( $plugin_dir_path . 'inc/slf-widget.php');
	include( $plugin_dir_path . 'inc/slf-duplicate.php');
	include( $plugin_dir_path . 'inc/slf-options.php');

?>