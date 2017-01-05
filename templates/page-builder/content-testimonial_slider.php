<div class="blockquote">

	<?php get_template_part( 'templates/wrapper', 'header' ); ?>

	<div class="blockquote__inner">

		<?php 
			$numberOfPosts = get_sub_field('max_number_of_testimonials_to_show');
			$tax = get_sub_field('choose_which_category_you_would_like_to_display');
			tend_testimonials($numberOfPosts, $tax->slug);
		 ?>

	</div>

	<?php get_template_part( 'templates/wrapper', 'footer' ); ?>                

</div>