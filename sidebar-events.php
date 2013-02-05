<?php

if ( ! is_active_sidebar( 'events' ) )
    return;

?>
<div class="events" id="secondary" role="complementary">
    <?php if ( is_active_sidebar( 'events' ) ) : ?>
        <ul><?php dynamic_sidebar( 'events' ); ?></ul>
    <?php endif; ?>
</div><!-- #secondary -->