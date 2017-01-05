<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

    <?php get_template_part('templates/head'); ?>

    <body <?php body_class(); ?>>

        <a href="#main-container" class="screen-reader-text"><?php _e('Skip to main content', 'tend'); ?></a>

        <?php
            do_action('get_header');
            get_template_part('templates/header');

        ?>

        <main id="main-container" class="main">

            <?php get_template_part('templates/breadcrumbs'); ?>

            <?php include roots_template_path(); ?>

        </main><!-- /.main -->

        <?php get_template_part('templates/footer'); ?>

    </body>

</html>
