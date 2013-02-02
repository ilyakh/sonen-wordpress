<?php

if ( ! is_active_sidebar( 'sidebar-2' ) )
    return;

?>
<div id="secondary" role="complementary">
    <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    <?php endif; ?>
</div><!-- #secondary -->