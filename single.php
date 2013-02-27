<?php get_header(); ?>

<div class="site">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', get_post_format() ); ?>

        <nav class="nav-single">
            <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '', 'Previous post link', 'twentytwelve' ) . '<i class="icon-chevron-left"></i></span> %title' ); ?></span>
            <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '', 'Next post link', 'twentytwelve' ) . '<i class="icon-chevron-right"></i></span> ' ); ?></span>
        </nav>
        <!-- .nav-single -->

        <?php comments_template( '', true ); ?>

    <div class="row-fluid preview-row">
        <?php $temp_query = clone $wp_query; ?>
        <?php query_posts(
            array(
                'posts_per_page' => 3,
                'orderby' => 'rand',
                'post__not_in' => array( get_the_ID() )
            )
        ); ?>

        <?php while (have_posts()) : the_post(); ?>
        <div class="span4 preview">
            <?php get_template_part( 'content', get_post_format() ); ?>
        </div>
        <?php endwhile; ?>
        <?php $wp_query = clone $temp_query; ?>
    </div>

    <?php endwhile; // end of the loop. ?>
</div>





<?php get_sidebar(); ?>

<?php get_footer(); ?>