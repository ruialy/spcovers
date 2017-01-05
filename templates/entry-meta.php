<time class="published" datetime="<?php echo get_post_time( 'c', true ); ?>"><?php echo get_the_date(); ?></time>
<p><?php echo __( 'By', 'tend' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
<p><?php the_tags(); ?></p>
