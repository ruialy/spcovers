<div class="page__builder__container one_column <?php the_sub_field('additional_classes');?>" style="background-color: <?php the_sub_field('background_colour');?>; color: <?php the_sub_field('text_colour');?>">

	<?php get_template_part( 'templates/wrapper', 'header' ); ?>

	<?php if(get_sub_field('wysiwyg_editor')) : ?>
	    <div class="inner-container">
	        <div class="wysiwyg_editor">
	        	<?php the_sub_field('wysiwyg_editor'); ?>
        	</div>
	    </div>
	<?php endif; ?>

	<?php get_template_part( 'templates/wrapper', 'footer' ); ?>

</div>