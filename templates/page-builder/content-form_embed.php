<div class="page__builder__container one_column form_embed" style="background-color: <?php the_sub_field('background_colour');?>; color: <?php the_sub_field('text_colour');?>">
    
    <?php get_template_part( 'templates/wrapper', 'header' ); ?>

	<h2><?php the_sub_field('form_title'); ?></h2>

    <?php if(get_sub_field('gravity_form_shortcode')) : ?>
        
        <div class="form_embed__inner">
			<?php echo do_shortcode(get_sub_field('gravity_form_shortcode'));?>
        </div>

    <?php endif; ?>

    <?php get_template_part( 'templates/wrapper', 'footer' ); ?>

</div>