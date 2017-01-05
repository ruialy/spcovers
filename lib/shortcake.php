<?php

/**
 * Register the two shortcodes independently of their UI.
 * Shortcodes should always be registered, but shortcode UI should only
 * be registered when Shortcake is active.
 */
function shortcode_ui_dev_register_shortcodes() {
	// This is a simple example for a pullquote with a citation.
	add_shortcode( 'blockquote', 'shortcake_blockquote_shortcode' );
	add_shortcode( 'accordion', 'shortcake_accordion_shortcode' );
	add_shortcode( 'button', 'shortcake_button_shortcode' );
	add_shortcode( 'loginform', 'shortcake_loginform_shortcode' );
	add_shortcode( 'username', 'tend_username_shortcode' );
	add_shortcode( 'logout', 'tend_logout_shortcode' );
}
add_action( 'init', 'shortcode_ui_dev_register_shortcodes' );


function shortcake_blockquote_ui() {
	/**
	 * Register UI for your shortcode
	 *
	 * @param string $shortcode_tag
	 * @param array $ui_args
	 */
	shortcode_ui_register_for_shortcode( 'blockquote',
		array(
			/*
			 * How the shortcode should be labeled in the UI. Required argument.
			 */
			'label' => esc_html__( 'Blockquote', 'shortcode-ui' ),
			/*
			 * Include an icon with your shortcode. Optional.
			 * Use a dashicon, or full URL to image.
			 */
			'listItemImage' => 'dashicons-editor-quote',
			/*
			 * Limit this shortcode UI to specific posts. Optional.
			 */
			// 'post_type' => array( 'post' ),
			/*
			 * Register UI for the "inner content" of the shortcode. Optional.
			 * If no UI is registered for the inner content, then any inner content
			 * data present will be backed up during editing.
			 */
			'inner_content' => array(
				'label'        => esc_html__( 'Quote', 'shortcode-ui' ),
				'description'  => esc_html__( 'Include a statement from someone.', 'shortcode-ui' ),
			),
			/*
			 * Register UI for attributes of the shortcode. Optional.
			 *
			 * If no UI is registered for an attribute, then the attribute will
			 * not be editable through Shortcake's UI. However, the value of any
			 * unregistered attributes will be preserved when editing.
			 *
			 * Each array must include 'attr', 'type', and 'label'.
			 * 'attr' should be the name of the attribute.
			 * 'type' options include: text, checkbox, textarea, radio, select, email,
			 *     url, number, and date, post_select, attachment, color.
			 * Use 'meta' to add arbitrary attributes to the HTML of the field.
			 * Use 'encode' to encode attribute data. Requires customization to callback to decode.
			 * Depending on 'type', additional arguments may be available.
			 */
			'attrs' => array(
				array(
					'label'       => esc_html__( 'Attachment', 'shortcode-ui' ),
					'attr'        => 'attachment',
					'type'        => 'attachment',
					/*
					 * These arguments are passed to the instantiation of the media library:
					 * 'libraryType' - Type of media to make available.
					 * 'addButton' - Text for the button to open media library.
					 * 'frameTitle' - Title for the modal UI once the library is open.
					 */
					'libraryType' => array( 'image' ),
					'addButton'   => esc_html__( 'Select Image', 'shortcode-ui' ),
					'frameTitle'  => esc_html__( 'Select Image (Optional)', 'shortcode-ui ' ),
				),
				array(
					'label'  => esc_html__( 'Citation Source', 'shortcode-ui' ),
					'attr'   => 'source',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				/*array(
					'label' => esc_html__( 'Select Page', 'shortcode-ui' ),
					'attr' => 'page',
					'type' => 'post_select',
					'query' => array( 'post_type' => 'page' ),
					'multiple' => true,
				),*/
			),
		)
	);
}
add_action( 'register_shortcode_ui', 'shortcake_blockquote_ui' );
/**
 * Render the shortcode based on supplied attributes
 */
function shortcake_blockquote_shortcode( $attr, $content = '', $shortcode_tag ) {
	$attr = shortcode_atts( array(
		'source'     => '',
		'attachment' => 0,
		'source'     => null,
	), $attr, $shortcode_tag );

    ob_start();
	?>
    <div class="blockquote">
        <div class="blockquote__inner">
            <blockquote class="pullquote">

                <?php echo wp_kses_post( wp_get_attachment_image( $attr[ 'attachment' ], array( 50, 50 ), 0, array('class'=>'alignleft') ) ); ?>
                <p> <?php echo wpautop( wp_kses_post( $content ) ); ?></p>

                <cite><?php echo wp_kses_post( $attr[ 'source' ] ); ?></cite>
            </blockquote>
        </div>
    </div>

	<?php
	return ob_get_clean();
}

/**
 * An example shortcode with many editable attributes (and more complex UI)
 */
function shortcake_accordion_ui() {
	/**
	 * Register UI for your shortcode
	 *
	 * @param string $shortcode_tag
	 * @param array $ui_args
	 */
	shortcode_ui_register_for_shortcode( 'accordion',
		array(
			/*
			 * How the shortcode should be labeled in the UI. Required argument.
			 */
			'label' => esc_html__( 'Accordion', 'shortcode-ui' ),
			/*
			 * Include an icon with your shortcode. Optional.
			 * Use a dashicon, or full URL to image.
			 */
			'listItemImage' => 'dashicons-menu',
			/*
			 * Limit this shortcode UI to specific posts. Optional.
			 */
			// 'post_type' => array( 'post' ),
			/*
			 * Register UI for the "inner content" of the shortcode. Optional.
			 * If no UI is registered for the inner content, then any inner content
			 * data present will be backed up during editing.
			 */
			/*'inner_content' => array(
				'label'        => esc_html__( 'Content', 'shortcode-ui' ),
				'description'  => esc_html__( 'The contents shown within the accordion.', 'shortcode-ui' ),
			),*/
			/*
			 * Register UI for attributes of the shortcode. Optional.
			 *
			 * If no UI is registered for an attribute, then the attribute will
			 * not be editable through Shortcake's UI. However, the value of any
			 * unregistered attributes will be preserved when editing.
			 *
			 * Each array must include 'attr', 'type', and 'label'.
			 * 'attr' should be the name of the attribute.
			 * 'type' options include: text, checkbox, textarea, radio, select, email,
			 *     url, number, and date, post_select, attachment, color.
			 * Use 'meta' to add arbitrary attributes to the HTML of the field.
			 * Use 'encode' to encode attribute data. Requires customization to callback to decode.
			 * Depending on 'type', additional arguments may be available.
			 */
			'attrs' => array(

				array(
					'label'  => esc_html__( 'Accordion Heading 1', 'shortcode-ui' ),
					'attr'   => 'heading_1',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 1', 'shortcode-ui' ),
					'attr'   => 'accordion_1',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 2', 'shortcode-ui' ),
					'attr'   => 'heading_2',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 2', 'shortcode-ui' ),
					'attr'   => 'accordion_2',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 3', 'shortcode-ui' ),
					'attr'   => 'heading_3',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 3', 'shortcode-ui' ),
					'attr'   => 'accordion_3',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 4', 'shortcode-ui' ),
					'attr'   => 'heading_4',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 4', 'shortcode-ui' ),
					'attr'   => 'accordion_4',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 5', 'shortcode-ui' ),
					'attr'   => 'heading_5',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 5', 'shortcode-ui' ),
					'attr'   => 'accordion_5',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 6', 'shortcode-ui' ),
					'attr'   => 'heading_6',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 6', 'shortcode-ui' ),
					'attr'   => 'accordion_6',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 7', 'shortcode-ui' ),
					'attr'   => 'heading_7',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 7', 'shortcode-ui' ),
					'attr'   => 'accordion_7',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 8', 'shortcode-ui' ),
					'attr'   => 'heading_8',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 8', 'shortcode-ui' ),
					'attr'   => 'accordion_8',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 9', 'shortcode-ui' ),
					'attr'   => 'heading_9',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 9', 'shortcode-ui' ),
					'attr'   => 'accordion_9',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
                array(
					'label'  => esc_html__( 'Accordion Heading 10', 'shortcode-ui' ),
					'attr'   => 'heading_10',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Accordion Content 10', 'shortcode-ui' ),
					'attr'   => 'accordion_10',
					'type'   => 'textarea',
					'encode' => false,
					'meta'   => array(
						//'placeholder' => esc_html__( 'Mr J Doe', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),

			),
		)
	);
}
add_action( 'register_shortcode_ui', 'shortcake_accordion_ui' );
/**
 * Render the shortcode based on supplied attributes
 */
function shortcake_accordion_shortcode( $attr, $content = '', $shortcode_tag ) {
	$attr = shortcode_atts( array(
		'heading_1'     => '',
        'accordion_1'   => '',
        'heading_2'     => '',
        'accordion_2'   => '',
        'heading_3'     => '',
        'accordion_3'   => '',
        'heading_4'     => '',
        'accordion_4'   => '',
        'heading_5'     => '',
        'accordion_5'   => '',
        'heading_6'     => '',
        'accordion_6'   => '',
        'heading_7'     => '',
        'accordion_7'   => '',
        'heading_8'     => '',
        'accordion_8'   => '',
        'heading_9'     => '',
        'accordion_9'   => '',
        'heading_10'     => '',
        'accordion_10'   => '',

	), $attr, $shortcode_tag );

    ob_start();
	?>
    <div class="accordion__inner">
        <div class='js-accordion' data-accordion-prefix-classes='accordion'>
            <?php for($i=1;$i<10;$i++): ?>
                <?php if($attr['heading_'.$i]!="") { ?>
                    <h3 class='js-accordion__header'><?php echo wp_kses_post($attr['heading_'.$i]); ?></h3>
                    <div class='js-accordion__panel'><?php echo wpautop(wp_kses_post($attr['accordion_'.$i])); ?></div>
                <?php } ?>
            <?php endfor; ?>
        </div>
    </div>

	<?php
	return ob_get_clean();
}


/**
 * An example shortcode with many editable attributes (and more complex UI)
 */
function shortcake_button_ui() {
	/**
	 * Register UI for your shortcode
	 *
	 * @param string $shortcode_tag
	 * @param array $ui_args
	 */
	shortcode_ui_register_for_shortcode( 'button',
		array(
			/*
			 * How the shortcode should be labeled in the UI. Required argument.
			 */
			'label' => esc_html__( 'Button', 'shortcode-ui' ),
            'description' => esc_html__('Nothing to configure here - please ensure you select the login form page in Settings -> User Login'),
			/*
			 * Include an icon with your shortcode. Optional.
			 * Use a dashicon, or full URL to image.
			 */
			'listItemImage' => 'dashicons-marker',
			/*
			 * Limit this shortcode UI to specific posts. Optional.
			 */
			// 'post_type' => array( 'post' ),
			/*
			 * Register UI for the "inner content" of the shortcode. Optional.
			 * If no UI is registered for the inner content, then any inner content
			 * data present will be backed up during editing.
			 */
			/*'inner_content' => array(
				'label'        => esc_html__( 'Content', 'shortcode-ui' ),
				'description'  => esc_html__( 'The contents shown within the accordion.', 'shortcode-ui' ),
			),*/
			/*
			 * Register UI for attributes of the shortcode. Optional.
			 *
			 * If no UI is registered for an attribute, then the attribute will
			 * not be editable through Shortcake's UI. However, the value of any
			 * unregistered attributes will be preserved when editing.
			 *
			 * Each array must include 'attr', 'type', and 'label'.
			 * 'attr' should be the name of the attribute.
			 * 'type' options include: text, checkbox, textarea, radio, select, email,
			 *     url, number, and date, post_select, attachment, color.
			 * Use 'meta' to add arbitrary attributes to the HTML of the field.
			 * Use 'encode' to encode attribute data. Requires customization to callback to decode.
			 * Depending on 'type', additional arguments may be available.
			 */
			'attrs' => array(

				array(
					'label'  => esc_html__( 'Button Text', 'shortcode-ui' ),
					'attr'   => 'button_text',
					'type'   => 'text',
					'encode' => false,
					'meta'   => array(
						'placeholder' => esc_html__( 'Click Here', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),
				array(
					'label'  => esc_html__( 'Button Link (URL)', 'shortcode-ui' ),
					'attr'   => 'button_link',
					'type'   => 'url',
					'encode' => false,
					'meta'   => array(
						'placeholder' => esc_html__( 'http://www.google.com', 'shortcode-ui' ),
						'data-test'   => 1,
					),
				),


			),
		)
	);
}
add_action( 'register_shortcode_ui', 'shortcake_button_ui' );
/**
 * Render the shortcode based on supplied attributes
 */
function shortcake_button_shortcode( $attr, $content = '', $shortcode_tag ) {
	$attr = shortcode_atts( array(
		'button_text'     => '',
        'button_link'   => '',

	), $attr, $shortcode_tag );

    ob_start();
	?>

    <a class="button" href="<?php echo wp_kses_post($attr['button_link']);?>"><?php echo wp_kses_post($attr['button_text']);?></a>

	<?php
	return ob_get_clean();
}


function shortcake_loginform_ui() {
	shortcode_ui_register_for_shortcode( 'loginform', array(
	    'label' => 'Login Form',
        'listItemImage' => 'dashicons-admin-network'
	) );
}

add_action( 'register_shortcode_ui', 'shortcake_loginform_ui' );

function shortcake_loginform_shortcode($attr, $content = '', $shortcode_tag) {

    ob_start();

    if(isset($_GET['login']) && $_GET['login'] == 'failed') {

?>

        <div id="login-error">

            <p><?php _e('Login failed: You have entered an incorrect email address or password, please try again. <a href="'.wp_login_url().'?action=lostpassword">Lost your password?</a>', 'tend');?></p>

        </div>

<?php

    } // end if

    if(isset($_GET['loggedout']) && $_GET['loggedout'] == 'true') {

?>

        <div id="login-error">

            <p><?php _e('You are now logged out.', 'tend');?></p>

        </div>

<?php

    } // end if

    if(isset($_GET['redirect'])) {

?>

        <div id="login-error">

            <p><?php _e('You must login to view this content.', 'tend');?></p>

        </div>

<?php

    } // end if
?>

        <form name="loginform" id="loginform" method="post">

            <p class="login-username">

                <input type="text" name="log" id="user_login" class="input" value="" size="20" placeholder="<?php _e('Email Address');?>">

            </p>

            <p class="login-password">

                <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" placeholder="<?php _e('Password');?>">

            </p>

            <p class="login-submit">

                <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-blue" value="<?php _e('Sign In');?>">

                <input type="hidden" name="redirect_to" value="<?php echo (isset($_REQUEST["redirect"]) ? $_REQUEST["redirect"] : the_field('select_protected_page', 'options'));?>">

            </p>

        </form>

	<?php

	return ob_get_clean();

}

function tend_username_shortcode($attr, $content = '', $shortcode_tag) {

    if(is_user_logged_in()) {

        global $current_user;

        get_currentuserinfo();

        return $current_user->user_firstname;

    }

}

function tend_logout_shortcode($attr, $content = '', $shortcode_tag) {

    if(is_user_logged_in()) {

        return "<a href='".get_field('select_login_page', 'options')."?logout=true'>".$content."</a>";

    }else{

        return "<a href='".get_field('select_login_page', 'options')."'>login</a>";


    }

}
