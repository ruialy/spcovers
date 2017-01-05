<?php
/*
Template Name: Custom Template
*/
?>

<?php get_template_part( 'templates/wrapper', 'header' ); ?>

	<div class="page__columns">

		<?php while ( have_posts() ) {
				the_post();
				get_template_part( 'templates/page', 'header' );
				get_template_part( 'templates/content', 'page' );
		} ?>

	</div>

<?php get_template_part( 'templates/wrapper', 'footer' ); ?>
