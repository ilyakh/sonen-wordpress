<div id="top">
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