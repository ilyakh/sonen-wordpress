<?php

/*
if ( ! is_active_sidebar( 'top-right' ) )
    return;
*/

?>

<nav id="site-navigation" class="main-navigation site" role="navigation">
    <div class="row-fluid">

        <div class="span12">
            <!-- header image / logo -->
            <?php $header_image = get_header_image();
            if ( ! empty( $header_image ) ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image logo" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
            <?php endif; ?>

            <!-- service bar -->

            <div class="service-bar">

                <div class="service">
                    <a href="https://www.facebook.com/ifisonen">
                        <img src="/ny/wp-content/themes/sonen/img/facebook-white.png" alt="" />
                    </a>
                </div>

                <div class="service">
                    <a href="http://www.reddit.com/r/sonen/">
                        <img src="/ny/wp-content/themes/sonen/img/reddit-white.png" alt="" />
                    </a>
                </div>

                <div class="service">
                    <a href="https://twitter.com/UniOslo_Sonen">
                        <img src="/ny/wp-content/themes/sonen/img/twitter-white.png" alt="" />
                    </a>
                </div>

                <div class="service">
                    <a href="http://www.uio.no/">
                        <img src="/ny/wp-content/themes/sonen/img/uio_white.png" alt="" />
                    </a>
                </div>

            </div>

        </div>


    </div>
</nav>
