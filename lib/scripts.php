<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr.min.js
 * 3. /theme/assets/js/scripts.js (in footer)
 *
 */
function tend_scripts() {

	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css' );

	/**
	* jQuery is loaded using the same method from HTML5 Boilerplate:
	* Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
	* It's kept in the header instead of footer to avoid conflicts with plugins.
	*/
	if ( ! is_admin() && current_theme_supports( 'jquery-cdn' ) ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/plugins/jquery.min.js', array(), null, false );
		add_filter( 'script_loader_src', 'tend_jquery_local_fallback', 10, 2 );
	}

	if ( ! is_admin() ) {
	    // Modernizer just in case we need feature detection
	    wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/plugins/modernizr.min.js', array(), '', false );
	    // The following output in the footer, after jQuery
	    wp_register_script( 'slick', get_template_directory_uri() . '/assets/js/plugins/slick.min.js', array(), '', true );
	    wp_register_script( 'flexslider', get_template_directory_uri() . '/assets/js/plugins/jquery.flexslider.min.js', array(), '', true );
	//    wp_register_script( 'google-map-init', get_template_directory_uri() . '/assets/js/plugins/google-map-init.min.js', array(), '', true );
	    wp_register_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/plugins/jquery.magnific-popup.min.js', array(), '', true );
	    wp_register_script( 'matchHeight', get_template_directory_uri() . '/assets/js/plugins/jquery.matchHeight.min.js', array(), '', true );
	    wp_register_script( 'mobile-menu', get_template_directory_uri() . '/assets/js/plugins/mobile-menu.min.js', array(), '', true );
	    wp_register_script( 'accordion-js', get_template_directory_uri() . '/assets/js/plugins/jquery.accordion.min.js', array(), '', true );
	    wp_register_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/custom_scripts.min.js', array(), '', true );

	    if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'slick' );
	wp_enqueue_script( 'flexslider' );
	//    wp_enqueue_script( 'google-map-init');
	wp_enqueue_script( 'magnific-popup' );
	wp_enqueue_script( 'accordion-js' );
	wp_enqueue_script( 'matchHeight' );
	wp_enqueue_script( 'mobile-menu' );

	// Google Maps API instructions
	// 1. Make sure you're logged in as support@10degrees.uk
	// 2. Go to https://developers.google.com/maps/documentation/javascript/
	// 3. Click "Get a key"
	// 4. Create a key
	// 5. Name the project as per the domain, using spaces, .e.g. domain-co-uk
	// 6. Ensure you add these domains as authorised: *.domain.dev, *.domain.co.uk, domain.wpengine.com, domain.staging.wpengine.com
	// 7. Replace YOUR_API_KEY in wp_enqueue_script call below

	// Also needs a filter for backend API Access. requries ACF PRO 5.4+
	// https://support.advancedcustomfields.com/forums/topic/google-maps-field-needs-setting-to-add-api-key/#post-40161
	// We should stick this in a define or an options setting
	// This should go into admin-functions.php probably
	// add_filter('acf/settings/google_api_key', function () {
	//     return 'your-api-key';
	// });

	//    Enqueue for a specific CPT
	//    if ( is_singular( 'your_cpt' )) {
	//        wp_enqueue_script( 'google-maps', '//maps.googleapis.com/maps/api/js?key=YOUR_API_KEY', array(), '3', true );
	//        wp_enqueue_script( 'google-map-init' );
	//    }

	wp_enqueue_script( 'custom-scripts' );
}
add_action( 'wp_enqueue_scripts', 'tend_scripts', 100 );

/*** Remove version numbers from query string of scripts & css files ***/
add_filter( 'style_loader_src', 'tend_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'tend_remove_wp_ver_css_js', 9999 );

function tend_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
		return $src;
	}
}

/*** TypeKit Fonts ***/
function tend_typekit() {
	if ( ! is_admin() ) {
	    wp_enqueue_script( 'tend_typekit', '//use.typekit.net/xsw4fvw.js' );
	}
}
// uncomment if Typekit is needed
//add_action( 'wp_enqueue_scripts', 'tend_typekit' );

function tend_typekit_inline() {
	if ( wp_script_is( 'tend_typekit', 'done' ) ) { ?>
  		<script type="text/javascript">try{Typekit.load({ async: true });}catch(e){}</script>
<?php } }
// add_action( 'wp_head', 'tend_typekit_inline' );

/*** Google Fonts ***/

function tend_google_fonts() {
	if ( ! is_admin() ) {
		wp_enqueue_style( 'tend-google-fonts', 'http://fonts.googleapis.com/css?family=Noticia+Text', false );
	}
}
// uncomment if Google Fonts are needed
add_action( 'wp_enqueue_scripts', 'tend_google_fonts', 99 );

// http://wordpress.stackexchange.com/a/12450
function tend_jquery_local_fallback( $src, $handle = null ) {
	static $add_jquery_fallback = false;

	if ( $add_jquery_fallback ) {
		echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/plugins/jquery-1.11.1.min.js"><\/script>\')</script>' . "\n";
		$add_jquery_fallback = false;
	}

	if ( 'jquery' === $handle ) {
		$add_jquery_fallback = true;
	}

	return $src;
}
add_action( 'wp_head', 'tend_jquery_local_fallback' );
