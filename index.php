<?php get_template_part( 'templates/wrapper', 'header' ); ?>

<div class="page__columns">

	<?php get_template_part( 'templates/page', 'header' ); ?>

	<?php if ( ! have_posts() ) { ?>
			<div class="alert">
				<p><?php _e( 'Sorry, no results were found.', 'tend' ); ?></p>
			</div>
			<?php get_search_form();
	} ?>

	<?php while ( have_posts() ) {
			the_post();
			get_template_part( 'templates/content' );
	} ?>

	<?php if ( $wp_query->max_num_pages > 1 ) { tend_page_navi(); } ?>

</div>

<?php get_template_part( 'templates/wrapper', 'footer' ); ?>
