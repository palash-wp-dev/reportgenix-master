<?php
/*
Plugin Name: Xgenious Toolkit ( Design Helper Plugin )
Plugin URI: https://themeforest.net/user/xgenious/portfolio
Description: Plugin to contain short codes and custom post types of the Xgenious theme.
Author: Sharifur
Author URI:https://themeforest.net/user/xgenious
Version: 2.0.1
Text Domain: xgenious-master
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//plugin dir path
define( 'XGENIOUS_MASTER_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'XGENIOUS_MASTER_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'XGENIOUS_MASTER_SELF_PATH', 'xgenious-master/xgenious-master.php' );
define( 'XGENIOUS_MASTER_VERSION', '2.0.0' );
define( 'XGENIOUS_MASTER_INC', XGENIOUS_MASTER_ROOT_PATH .'/inc');
define( 'XGENIOUS_MASTER_LIB', XGENIOUS_MASTER_ROOT_PATH .'/lib');
define( 'XGENIOUS_MASTER_ELEMENTOR', XGENIOUS_MASTER_ROOT_PATH .'/elementor');
define( 'XGENIOUS_MASTER_DEMO_IMPORT', XGENIOUS_MASTER_ROOT_PATH .'/demo-data-import');
define( 'XGENIOUS_MASTER_ADMIN', XGENIOUS_MASTER_ROOT_PATH .'/admin');
define( 'XGENIOUS_MASTER_ADMIN_ASSETS', XGENIOUS_MASTER_ROOT_URL .'admin/assets');
define( 'XGENIOUS_MASTER_WP_WIDGETS', XGENIOUS_MASTER_ROOT_PATH .'/wp-widgets');
define( 'XGENIOUS_MASTER_ASSETS', XGENIOUS_MASTER_ROOT_URL .'assets/');
define( 'XGENIOUS_MASTER_CSS', XGENIOUS_MASTER_ASSETS .'css');
define( 'XGENIOUS_MASTER_JS', XGENIOUS_MASTER_ASSETS .'js');
define( 'XGENIOUS_MASTER_IMG', XGENIOUS_MASTER_ASSETS .'img');

//load xgenious helpers functions
if (!function_exists('Xgenious')){
	require_once XGENIOUS_MASTER_INC .'/class-xgenious-helper-functions.php';
	if (!function_exists('Xgenious')){
		function Xgenious(){
			return class_exists('Xgenious_Helper_Functions') ? new Xgenious_Helper_Functions() : false;
		}
	}
}
//load codester framework functions
if ( !Xgenious()->is_xgenious_active()) {
	if ( file_exists( XGENIOUS_MASTER_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once XGENIOUS_MASTER_ROOT_PATH . '/inc/csf-functions.php';
	}
}

//plugin init
if ( file_exists( XGENIOUS_MASTER_ROOT_PATH . '/inc/class-xgenious-master-init.php' ) ) {
	require_once XGENIOUS_MASTER_ROOT_PATH . '/inc/class-xgenious-master-init.php';
}
