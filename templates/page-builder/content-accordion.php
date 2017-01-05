<div class="accordion__wrapper">

    <?php get_template_part( 'templates/wrapper', 'header' ); ?>

    <div class="inner-container">
        
        <?php if( get_sub_field('accordion_section_title') ) { ?>
            <h2><?php the_sub_field('accordion_section_title'); ?></h2>
        <?php } ?>

        <div class="accordion__inner">
            <?php if( have_rows('accordion_item') ): ?>
                <div class='js-accordion' data-accordion-prefix-classes='accordion'>
                    <?php while( have_rows('accordion_item') ): the_row(); ?>
                        <h3 class='js-accordion__header'><?php the_sub_field('title'); ?></h3>
                        <div class='js-accordion__panel'><?php the_sub_field('content'); ?></div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        
    </div>    
 
    <?php get_template_part( 'templates/wrapper', 'footer' ); ?>                

</div>   