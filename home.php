<?php

// gets the layout-class
require_once "layout.php";
get_header();

?>

<div class="site">

<?php

if ( have_posts() ) :

    $post_count = $wp_query->post_count;

    $layout = new Layout(
        // how many posts does wordpress yield for this page?
        $post_count
    );

    // configures the layout according to the number of posts
    switch ( $post_count ) {
        case 2:
            $layout->addRow(2);
            $layout->addRow(3);
        break;
        case 3:
            $layout->addRow(3);
            $layout->addRow(3);
        break;
        case 4:
            $layout->addRow(3);
            $layout->addRow(3);
        break;
        case 5:
            $layout->addRow(2);
            $layout->addRow(3);
        break;
        default:
            $layout->addRow(2);
            $layout->addRow(3);
            $layout->addRow(3);
            $layout->addRow(3);
            $layout->addRow(3);
        break;
    }

    // compiles and prints the layout
    $layout();

?>

</div>

<?php else : ?>


<div class="site">
    <article id="post-0" class="post no-results not-found">

    <?php if ( current_user_can( 'edit_posts' ) ) :
        // Show a different message to a logged-in user who can add posts.
    ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
        </header>

        <div class="entry-content">
            <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
        </div>

    <?php else :
        // Show the default message to everyone else.
    ?>
        <header class="entry-header">
            <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
        </header>

        <div class="entry-content">
            <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>

    </article>

</div>
<?php endif; ?>

<?php content_nav( 'nav-below' ); content_n?>



<?php get_sidebar( 'blogroll' ); ?>


<?php get_footer(); ?>