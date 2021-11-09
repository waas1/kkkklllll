<?php
/**
 * @package waas1-clear-cache-after-plugin-update
 */
/*
Plugin Name: waas1-clear-cache-after-plugin-update
Plugin URI: https://waas1.com/
Description: Clear cache after plugin is activated.
Version: 1.0.0
Author: Erfan
Author URI: https://waas1.com/
License: GPLv2 or later
*/



// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



//only needs to run in the admin area
if( !is_admin() ){
	return;
}



//as soon as admin init
add_action( 'activate_plugin', function(){
	
	if (function_exists('w3tc_flush_all')){
		w3tc_flush_all();
	}
	
},10, 1 );
