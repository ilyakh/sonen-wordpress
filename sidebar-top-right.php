<?php

/*
if ( ! is_active_sidebar( 'top-right' ) )
    return;
*/

?>

<nav id="site-navigation" class="main-navigation site" role="navigation">

    <!-- header image -->
    <?php $header_image = get_header_image();
    if ( ! empty( $header_image ) ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image logo" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
        <?php endif; ?>

    <!-- the service menu -->
    <div class="service-bar">
        <div class="service">
            <a href="<?php bloginfo('rss2_url'); ?>">
                <img src="/ny/wp-content/themes/sonen/img/rss-white.png" alt="" />
            </a>
        </div>
        <div class="service">
            <a href="http://www.flickr.com/groups/sonen/">
                <img src="/ny/wp-content/themes/sonen/img/flickr-white.png" alt="" />
            </a>
        </div>
        <div class="service">
            <a href="https://www.facebook.com/ifisonen">
                <img src="/ny/wp-content/themes/sonen/img/facebook-white.png" alt="" />
            </a>
        </div>
        <div class="service">
            <a href="http://www.youtube.com/user/ifisonen">
                <img src="/ny/wp-content/themes/sonen/img/youtube-white.png" alt="" />
            </a>
        </div>
        <div class="service">
            <a href="http://www.reddit.com/r/sonen/">
                <img src="/ny/wp-content/themes/sonen/img/reddit-white.png" alt="" />
            </a>
        </div>
        <div class="service selected">
            <a href="https://twitter.com/UniOslo_Sonen">
                <img src="/ny/wp-content/themes/sonen/img/twitter-white.png" alt="" />
            </a>
        </div>
    </div>
</nav>
