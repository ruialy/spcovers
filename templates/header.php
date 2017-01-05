<header class="banner">
    <div class="banner__container">
        <div class="banner__row">

            <div class="banner__logo">
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
            </div>

            <div class="banner__nav-control">
                <a href="#nav-dropdown" class="nav-control">
                    <span class="bars">
                        <svg class="svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 -3 12 20">
                            <path class="svg__bars" d="M12 10.5v1q0 0.203-0.148 0.352t-0.352 0.148h-11q-0.203 0-0.352-0.148t-0.148-0.352v-1q0-0.203 0.148-0.352t0.352-0.148h11q0.203 0 0.352 0.148t0.148 0.352zM12 6.5v1q0 0.203-0.148 0.352t-0.352 0.148h-11q-0.203 0-0.352-0.148t-0.148-0.352v-1q0-0.203 0.148-0.352t0.352-0.148h11q0.203 0 0.352 0.148t0.148 0.352zM12 2.5v1q0 0.203-0.148 0.352t-0.352 0.148h-11q-0.203 0-0.352-0.148t-0.148-0.352v-1q0-0.203 0.148-0.352t0.352-0.148h11q0.203 0 0.352 0.148t0.148 0.352z"></path>
                        </svg>
                    </span>
                    
                    <span class="cross">
                        <svg class="svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 -3 11 20">
                            <path class="svg__cross"   d="M10.141 10.328q0 0.312-0.219 0.531l-1.062 1.062q-0.219 0.219-0.531 0.219t-0.531-0.219l-2.297-2.297-2.297 2.297q-0.219 0.219-0.531 0.219t-0.531-0.219l-1.062-1.062q-0.219-0.219-0.219-0.531t0.219-0.531l2.297-2.297-2.297-2.297q-0.219-0.219-0.219-0.531t0.219-0.531l1.062-1.062q0.219-0.219 0.531-0.219t0.531 0.219l2.297 2.297 2.297-2.297q0.219-0.219 0.531-0.219t0.531 0.219l1.062 1.062q0.219 0.219 0.219 0.531t-0.219 0.531l-2.297 2.297 2.297 2.297q0.219 0.219 0.219 0.531z"></path>
                        </svg>
                    </span>
                    
                </a>
            </div>

        </div>
    </div>
</header>

<div class="navbar--header">
    <nav>
	<?php
	if ( has_nav_menu( 'primary_navigation' ) ) {
		wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'depth' => 4 ) );
	};
	?>
    </nav>
</div>
