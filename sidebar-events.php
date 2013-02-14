<?php

/*
if ( ! is_active_sidebar( 'events' ) )
    return;
*/

?>

    <h2>Arrangementer</h2>
    <?php if ( is_active_sidebar( 'events' ) ) : ?>
        <ul class="event-widget-container"><?php dynamic_sidebar( 'events' ); ?></ul>
    <?php endif; ?>
