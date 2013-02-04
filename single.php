<?php get_header(); ?>

<div id="primary" class="site-content">
    <div id="content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', get_post_format() ); ?>

            <nav class="nav-single">
                <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '', 'Previous post link', 'twentytwelve' ) . '<i class="icon-chevron-left"></i></span> %title' ); ?></span>
                <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '', 'Next post link', 'twentytwelve' ) . '<i class="icon-chevron-right"></i></span> ' ); ?></span>
            </nav>

            <?php comments_template( '', true ); ?>

        <?php endwhile; ?>

    </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>