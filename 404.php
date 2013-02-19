<?php get_header(); ?>

<div class="hfeed site">
    <?php get_sidebar('content-header'); ?>



    <?php
    $i=0; /* POST counter */
    /* modified loop allows a specific article quantity */
    $number_of_posts = 50;
    $quantified_query = new WP_Query( 'posts_per_page=' . $number_of_posts );
    ?>

        <div class="row-fluid site-content">
            <div class="span6">
                <h2 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentytwelve' ); ?></h2>
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentytwelve' ); ?></p>
            </div>
            <div class="span6">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="row-fluid site-content preview-row">
        <?php while ( $quantified_query->have_posts() ) : $quantified_query->the_post(); ?>

    <?php if ( $i % 3 == 0 ) : ?>
            </div>
            <div class="row-fluid site-content preview-row">
        <?php endif; ?>

        <div class="span4 preview">
            <?php get_template_part( 'content', get_post_format() ); ?>
        </div>



        <?php $i++; ?>

        <?php endwhile; ?>

        </div>

        <hr id="end" />

    <?php twentytwelve_content_nav( 'nav-below' ); ?>



    </div> <!-- /site -->

<?php get_footer(); ?>
