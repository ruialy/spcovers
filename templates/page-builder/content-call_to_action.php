<div class="page__builder__container one_column call_to_action">

    <?php get_template_part( 'templates/wrapper', 'header' ); ?>

    <?php if(get_sub_field('call_to_action_text')) : ?>
        
        <div class="call_to_action__inner">
            <h3><?php the_sub_field('call_to_action_text'); ?></h3>
            <a class="button" href="<?php the_sub_field('call_to_action_url');?>">
                <?php the_sub_field('call_to_action_button_text');?>
            </a>
        </div>

    <?php endif; ?>
    
    <?php get_template_part( 'templates/wrapper', 'footer' ); ?>

</div>