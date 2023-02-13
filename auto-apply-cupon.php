<?php
/*
Plugin Name: Auto Apply Coupon
Plugin URI:
Description: Shows a admin menu to display all Woocommerce coupon codes and allows marking a coupon as auto apply coupon.
Version: 1.0
Author: Md. Israfil Mahmud Raju
Author URI: https://imraju.com/
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'AAC_VERSION', '1.0.0' );
defined( 'AAC_PATH' ) or define( 'AAC_PATH', plugin_dir_path( __FILE__ ) );
defined( 'AAC_IMG_DIR' ) or define( 'AAC_IMG_DIR', plugin_dir_url( __FILE__ ) . 'assets/img/' );
defined( 'AAC_CSS_DIR' ) or define( 'AAC_CSS_DIR', plugin_dir_url( __FILE__ ) . 'assets/css/' );
defined( 'AAC_JS_DIR' ) or define( 'AAC_JS_DIR', plugin_dir_url( __FILE__ ) . 'assets/js/' );


require_once AAC_PATH . 'admin/class-aac-admin.php';
require_once AAC_PATH . 'client/class-aac-client.php';














