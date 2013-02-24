<div id="top" class="area">
    <div class="row-fluid site">
        <div class="top-row">
            <div class="span6 top-left">
            <?php
            $header_image = get_header_image();
            if ( ! empty( $header_image ) ) : ?>
                <div class="project-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="top-image" src="<?php echo esc_url( $header_image ); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
                    </a>
                </div>
            <?php endif; ?>
            </div>
            <div class="span6 top-right hidden-phone">
                <div class="parent-logo">
                    <a href="http://www.ifi.uio.no/">
                        <img class="" src="/wp-content/themes/sonen/img/uio_ifi_250_segl.png" alt=""  />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="area top-separator">
    <div class="row-fluid site top-separator-fill">
        &nbsp;
    </div>
</div>