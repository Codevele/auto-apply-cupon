<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('AutoApplyCuponAdmin')) {
    class AutoApplyCuponAdmin
    {
        public function __construct()
        {

            add_action( 'admin_menu', array($this, 'auto_apply_coupon_menu' ));
            $this->APIinit();
            add_action('admin_enqueue_scripts', array($this, 'aac_admin_enqueue'));
        }

        function auto_apply_coupon_menu() {
            add_submenu_page( 'woocommerce', 'Auto Apply Coupons', 'Auto Apply Coupons', 'manage_options', 'auto-apply-coupons', array($this,'auto_apply_coupons_page') );
        }

        function APIinit(){
            add_action('wp_ajax_remove_auto_apply_coupon', array($this, 'remove_auto_apply_coupon'));
        }

        function aac_admin_enqueue() {
            wp_enqueue_style('aac-admin-main', AAC_CSS_DIR.'admin_main.css', array(), AAC_VERSION);
            wp_enqueue_script( 'aac-admin-main', AAC_JS_DIR.'admin_main.js', array('jquery'), AAC_VERSION );
        }

        function remove_auto_apply_coupon() {

            try {
                $coupon = $_POST['coupon'];
                update_option('auto_apply_coupon', '');
                wp_die();
            } catch (Exception $e) {
                error_log($e->getMessage());
            }
        }


        function auto_apply_coupons_page() {
            if ( ! current_user_can( 'manage_options' ) ) {
                wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
            }

            if ( isset( $_POST['auto_apply_coupon'] ) ) {
                update_option( 'auto_apply_coupon', $_POST['auto_apply_coupon'] );
            }

            $auto_apply_coupon = get_option( 'auto_apply_coupon', '' );
            $coupons = get_posts( array(
                'post_type'      => 'shop_coupon',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ) );

            include_once ("views/table.php");
        }
    }
}

if(is_admin()){
    new AutoApplyCuponAdmin();
}


