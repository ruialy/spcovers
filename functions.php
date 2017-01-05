<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
	'lib/utils.php',                    // Utility functions
	'lib/init.php',                     // Initial theme setup and constants
	'lib/wrapper.php',                  // Theme wrapper class
	'lib/sidebar.php',                  // Sidebar class
	'lib/config.php',                   // Configuration
	'lib/activation.php',               // Theme activation
	'lib/titles.php',                   // Page titles
	'lib/nav.php',                      // Custom nav modifications
	'lib/scripts.php',                  // Scripts and stylesheets
	'lib/admin-functions.php',          // Backend functions
	'lib/front-end-functions.php',      // Front End functions
	'lib/pre-get-posts.php',            // Pre Get Posts
	'lib/authentication.php',           // Custom login functions
	'lib/woocommerce.php',              // WooCommerce
	'lib/shortcake.php',                // Shortcake
	'lib/forms.php',                    // Forms
//    'lib/gallery.php',                  // Custom [gallery] modifications
	'lib/comments.php',                 // Custom comments modifications

/**
 * Custom Post Types and Taxonomies
 * To add a new CPT and/or taxoonomy, uncomment extended_cpts and extended_taxos
 * Declare a new CPT and associated taxonomy in cpt_default.php, changing default to the cpt name
 *
 * Documentation available at :
 *
 * https://github.com/johnbillion/extended-cpts/wiki
 * https://github.com/johnbillion/extended-taxos
 */
//    'lib/extended-cpts.php',            // Extended CPTs
//    'lib/extended-taxos.php',           // Extended taxonomies
//    'lib/cpt-default.php',              // CPT default
);

foreach ( $roots_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'tend' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );
