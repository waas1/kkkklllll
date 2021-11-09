<?php
/**
 * @package waas1-display-siteid-admin-bar
 */
/*
Plugin Name: waas1-display-siteid-admin-bar
Plugin URI: https://waas1.com/
Description: Display site id on admin bar
Version: 1.0.0
Author: Erfan
Author URI: https://waas1.com/
License: GPLv2 or later
*/



// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}



// add links/menus to the admin bar
add_action( 'admin_bar_menu', function(){
	
	global $wp_admin_bar;
	
	$wp_admin_bar->add_menu( array(
		'parent' => false, // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'lb-region-name', // link ID, defaults to a sanitized title value
		'href' => '#',
		'title' => 'Node: '.THIS_CONTROLLER_TAG.' - Site ID: '.THIS_SITE_ID,
	));
	
}, 500 );




