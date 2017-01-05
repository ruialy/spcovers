<?php
// only add the page builder if ACF is enabled

include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 

if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

?>

    <?php if(have_rows('page_builder')) : ?>
        
        <div class="page__builder">

            <?php while ( have_rows('page_builder') ) : the_row();

                get_template_part( 'templates/page-builder/content', get_row_layout() );
                
            endwhile; // end of if page_content ?>
        
        </div>

    <?php endif; // end of if content_row ?>

<?php } // end "is ACF enabled?" ?>