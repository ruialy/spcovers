<footer class="content-info">
  <div class="footer__container">

        <div class="footer__row">
            <div class="footer__copyright">
                <p><?php echo '&copy;&nbsp' . date( 'Y' ) . '&nbsp;' . get_bloginfo( 'name' ); ?>.</p>
            </div>
        </div>

        <div class="footer__row">
			<nav class="footer__nav">
			<?php
			if ( has_nav_menu( 'footer_navigation' ) ) {
			 	wp_nav_menu( array( 'theme_location' => 'footer_navigation', 'depth' => 1 ) );
			}
			?>
			</nav>
        </div>

  </div>
</footer>

<?php wp_footer(); ?>
