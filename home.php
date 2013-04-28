<?php require_once "personal/layout.php"; ?>

<?php get_header(); ?>

<!-- -->

<?php

global $more;
$more = 0;

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
            $layout->addRow(2);
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
            $layout->addRow(2);
            $layout->addRow(3);
            $layout->addRow(3);
            $layout->addRow(3);
        break;
    }

    // compiles and prints the layout
    $layout();
	
endif;

?>

<!-- -->

<?php get_footer(); ?>
