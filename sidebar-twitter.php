<?php

if ( ! is_active_sidebar( 'twitter' ) )
    return;

?>
<div id="secondary" role="complementary">
    <?php if ( is_active_sidebar( 'twitter' ) ) : ?>
    <?php dynamic_sidebar( 'twitter' ); ?>
    <?php endif; ?>
</div><!-- #secondary -->