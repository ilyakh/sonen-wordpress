<?php

/*
if ( ! is_active_sidebar( 'events' ) )
    return;
*/

?>
<div class="events" role="complementary">
    <?php if ( is_active_sidebar( 'events' ) ) : ?>
        <ul class="event-widget-container"><?php dynamic_sidebar( 'events' ); ?></ul>
    <?php endif; ?>
</div><!-- #secondary -->