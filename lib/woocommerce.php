<?php

// declare WooCommerce theme support

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

// remove all default woocomm styles. We'll re-add our own from the SASS files in assets/scss/woocommerce*
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// uncomment this if you need woocomm styles
/*add_action('wp_enqueue_scripts', 'tend_woocommerce_styles');

function tend_woocommerce_styles() {
    wp_register_style('woocommerce', get_template_directory_uri()."/assets/css/woocommerce.css", null, "1.0", true);
    wp_register_style('woocommerce-layout', get_template_directory_uri()."/assets/css/woocommerce-layout.css", null, "1.0", true);
    wp_register_style('woocommerce-smallscreen', get_template_directory_uri()."/assets/css/woocommerce-smallscreen.css", null, "1.0", true);
    wp_enqueue_style('woocommerce');
    wp_enqueue_style('woocommerce-layout');
    wp_enqueue_style('woocommerce-smallscreen');
}*/
