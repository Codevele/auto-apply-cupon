<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('AACClient')) {
    class AACClient
    {
        public function __construct()
        {
            add_action( 'woocommerce_before_cart', array( $this, 'auto_apply_coupon_to_cart' ) );
        }

        function auto_apply_coupon_to_cart() {
            $auto_apply_coupon = get_option( 'auto_apply_coupon' );

            if ( !empty( $auto_apply_coupon ) && !WC()->cart->has_discount( $auto_apply_coupon ) ) {
                WC()->cart->apply_coupon( $auto_apply_coupon );
            }
        }
    }
}

new AACClient();

