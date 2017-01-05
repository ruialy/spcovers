<div class="text_with_image_slider">

    <?php get_template_part( 'templates/wrapper', 'header' ); ?>

    <?php if(get_sub_field('text')) : ?>
        <div class="text_with_image_slider__text">
            <div class="inner">
                <?php the_sub_field('text'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(get_sub_field('images')) : ?>
        <div class="text_with_image_slider__text__slider">
            <div class="page-slideshow">
                
                <?php 
                    $images = get_sub_field('images');

                    if( $images ): ?>
                        <div class="page-slideshow__slick">
                            <?php foreach( $images as $image ): ?>
                                <div class="page-slideshow__item" style="background-image: url('<?php echo $image['sizes']['large']; ?>');">
                                    <?php if($image['caption']) { echo '<p>'.$image['caption'].'</p>'; } ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                <?php endif; ?>

            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'templates/wrapper', 'footer' ); ?>

</div>