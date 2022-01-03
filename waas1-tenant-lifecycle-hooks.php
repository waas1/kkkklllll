<?php
/**
 * @package waas1-tenant-lifecycle-hooks
 */
/*
Plugin Name: waas1-tenant-lifecycle-hooks.php
Plugin URI: https://waas1.com/
Description: Lifecycle hooks
Version: 1.0.0
Author: Erfan
Author URI: https://waas1.com/
License: GPLv2 or later
*/


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



function waas1_tenant_lifecycle_created( $args ) {
	do_action( 'waas1_tenant_created' );
};





function waas1_tenant_lifecycle_pre_delete( $args ) {
	do_action( 'waas1_tenant_pre_delete' );
};


if ( class_exists( 'WP_CLI' ) ) {
	WP_CLI::add_command( 'waas1-tenant created', 'waas1_tenant_lifecycle_created' );
	WP_CLI::add_command( 'waas1-tenant pre-delete', 'waas1_tenant_lifecycle_pre_delete' );
}


?>