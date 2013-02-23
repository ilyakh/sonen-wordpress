<div id="header" class="area">
    <div class="row-fluid site">
        <div class="header-row">
            <div class="span6 header-left">
                <!-- header image / logo -->
                <?php $header_image = get_header_image();
                if ( ! empty( $header_image ) ) : ?>
                <div class="project-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="header-image" src="<?php echo esc_url( $header_image ); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <div class="span6 header-right hidden-phone">
                <div class="parent-logo">
                    <a href="http://www.ifi.uio.no/">
                        <img class="" src="/wp-content/themes/sonen/img/uio_ifi_250_segl.png" alt=""  />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="area" style="overflow: hidden;">
    <div class="row-fluid site" style="overflow: hidden; height: 10px; background-image: url( '/wp-content/themes/sonen/img/alspectra-large.png' );">
        &nbsp;
    </div>
</div>