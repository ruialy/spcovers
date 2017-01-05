<?php get_template_part( 'templates/wrapper', 'header' ); ?>

<div class="page__columns">

	<?php get_template_part( 'templates/page', 'header' ); ?>

	<div class="error-text">
		<?php
		if ( get_field( '404_error_page_text', 'options' ) ) {
			the_field( '404_error_page_text', 'options' );
		} else {
			_e( 'Sorry, but the page you were trying to view does not exist.', 'tend' );
		} //endif
		?>
	</div>

	<?php get_search_form(); ?>

</div>

<?php get_template_part( 'templates/wrapper', 'footer' ); ?>
