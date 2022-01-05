<?php
/**
 * @package waas1-site-restrictions
 */
/*
Plugin Name: waas1-site-restrictions
Plugin URI: https://waas1.com/
Description: Plugin to apply restrictions for non "superduper" user
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

//no restrictions for the "superduper user"
$user = wp_get_current_user();
if( $user->user_login == 'superduper' ){
	return;
}



//as soon as admin init
add_action( 'admin_init', function(){
	
	
	//if we are here it means user is logged in as a different user
	
	
	if( !defined('WAAS1_RESTRICTION_ALLOW_PLUGINS_INSTALL') ){
		define( 'WAAS1_RESTRICTION_ALLOW_PLUGINS_INSTALL',	false ); //default not to allow plugins install
	}
	
	if( !defined('WAAS1_RESTRICTION_ALLOW_PLUGINS_ACTIVATE') ){
		define( 'WAAS1_RESTRICTION_ALLOW_PLUGINS_ACTIVATE',	false ); //default not to allow plugins activation/deactivation
	}
	
	
	if( !defined('WAAS1_RESTRICTION_ALLOW_THEMES_INSTALL') ){
		define( 'WAAS1_RESTRICTION_ALLOW_THEMES_INSTALL',	false ); //default not to allow themes install
	}
	
	if( !defined('WAAS1_RESTRICTION_ALLOW_THEMES_SWITCH') ){
		define( 'WAAS1_RESTRICTION_ALLOW_THEMES_SWITCH',	false ); //default not to allow themes switch
	}
	
	
	
	//filter capabilities
	add_filter( 'map_meta_cap', function($caps, $cap){
		
		if ( $cap === 'install_plugins' && !WAAS1_RESTRICTION_ALLOW_PLUGINS_INSTALL ) {
			$caps[] = 'do_not_allow'; //setting it up as do_not_allow is important
		}
		
		if ( $cap === 'activate_plugins' && !WAAS1_RESTRICTION_ALLOW_PLUGINS_ACTIVATE ) {
			$caps[] = 'do_not_allow'; //setting it up as do_not_allow is important
		}
		
		if ( $cap === 'install_themes' && !WAAS1_RESTRICTION_ALLOW_THEMES_INSTALL ) {
			$caps[] = 'do_not_allow'; //setting it up as do_not_allow is important
		}
		
		if ( $cap === 'switch_themes' && !WAAS1_RESTRICTION_ALLOW_THEMES_SWITCH ) {
			$caps[] = 'do_not_allow'; //setting it up as do_not_allow is important
		}
	
		return $caps;
	}, 10, 2 );
		
	

});



?>