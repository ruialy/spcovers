<?php


/* NOTE: see also shortcake.php for [loginform] shortcode */


// only add the actions if frontend & ACF is enabled

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

	if ( get_field( 'enable_frontend_login', 'options' ) ) {
		add_action( 'admin_init', 'tend_restrict_admin', 1 );                           // redirect non-admin to home if attempting dashboard
		add_action( 'after_setup_theme', 'tend_remove_admin_bar' );                      // remove admin bar if not admin
		add_action( 'template_redirect', 'tend_custom_login' );                         // this checks login info
		add_action( 'template_redirect', 'tend_check_user_permission' );                 // checks if content should be protected or not
		remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );    // remove existing authentication routine
		add_filter( 'authenticate', 'tend_email_login_authenticate', 20, 3 );           // allows email address login

	}

	// redirect non-admin to home if attempting dashboard
	function tend_restrict_admin() {
		if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
			wp_redirect( site_url() );
		}
	}

	// remove admin bar if not admin
	function tend_remove_admin_bar() {
	    if ( ! current_user_can( 'administrator' ) && ! is_admin() ) {
			show_admin_bar( false );
	    }
	}

	// login with email address
	function tend_email_login_authenticate( $user, $username, $password ) {

		if ( is_a( $user, 'WP_User' ) ) {
			return $user;
		}

		if ( ! empty( $username ) ) {
			$username = str_replace( '&', '&amp;', stripslashes( $username ) );
			$user = get_user_by( 'email', $username );

		    if ( isset( $user, $user->user_login, $user->user_status ) && 0 == (int) $user->user_status ) {
				$username = $user->user_login;
			}
		}
		return wp_authenticate_username_password( null, $username, $password );
	}

	// this checks login info
	function tend_custom_login() {

		if ( isset( $_SERVER['HTTP_REFERER'] ) && strstr( $_SERVER['HTTP_REFERER'], get_field( 'select_login_page', 'options' ) ) && isset( $_POST['log'] ) && isset( $_POST['pwd'] ) ) {

		    $creds = array();
		    $creds['user_login'] = $_POST['log'];
		    $creds['user_password'] = stripslashes( $_POST['pwd'] );
		    $creds['remember'] = true;
		    $redirect_to = $_POST['redirect_to'];

		    $user = wp_signon( $creds, false );

		    if ( is_wp_error( $user ) ) {

		        wp_redirect( get_field( 'select_login_page', 'options' ) . '?login=failed' ); // failed login, go back to the login page.

		        die();

		        wp_redirect( $redirect_to );

			}
		}
	}

	function tend_check_user_permission() {

	    if ( is_user_logged_in() ) {// user is logged in
	        if ( strstr( get_field( 'select_login_page', 'options' ), $_SERVER['REQUEST_URI'] ) && ! is_home() && ! is_front_page() ) {// check if they're on the login page.
	            wp_redirect( get_field( 'select_protected_page', 'options' ) );// when trying to access the login page, redirect to the protected page as there's no need to login again
			}
	        // not logged in
	        global $pagename;
	        if ( get_field( 'protect_this_page' ) ) {
	            wp_redirect( get_field( 'select_login_page', 'options' ) . '?redirect=' . get_permalink() );
				exit;
			}
	    }
		if ( isset( $_REQUEST['logout'] ) && ( 'true' == $_REQUEST['logout'] ) ) {
		    // log them out
		    wp_logout();
		    wp_redirect( get_field( 'select_login_page', 'options' ) . '?loggedout=true' );
			exit;
		}
	}
}

?>
