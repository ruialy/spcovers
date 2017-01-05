<?php
if ( function_exists( 'yoast_breadcrumb' ) ) {
	get_template_part( 'templates/wrapper', 'header' );
	yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );
	get_template_part( 'templates/wrapper', 'footer' );
}
?>
