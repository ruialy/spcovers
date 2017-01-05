<div class="page__builder__container three_column <?php the_sub_field('additional_classes');?>" style="background-color: <?php the_sub_field('background_colour');?>; color: <?php the_sub_field('text_colour');?>">
    
    <?php get_template_part( 'templates/wrapper', 'header' ); ?>

    <?php if(get_sub_field('wysiwyg_editor')) : ?>
        <div class="wysiwyg_editor">
            <div class="inner">
                <?php the_sub_field('wysiwyg_editor'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(get_sub_field('wysiwyg_editor_two')) : ?>
        <div class="wysiwyg_editor">
            <div class="inner">
                <?php the_sub_field('wysiwyg_editor_two'); ?>
            </div>
        </div>
    <?php endif; ?>            
    <?php if(get_sub_field('wysiwyg_editor_three')) : ?>
        <div class="wysiwyg_editor">
            <div class="inner">
                <?php the_sub_field('wysiwyg_editor_three'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'templates/wrapper', 'footer' ); ?>

</div>