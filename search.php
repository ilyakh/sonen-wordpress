<?php get_header(); ?>

<div class="hfeed site">

    <?php if ( have_posts() ) : $i = 1; // if has posts ?>

        <div class="row-fluid site-content preview-row">
            <?php while ( have_posts() ) : the_post(); ?>

        <div class="span4 preview">
            <?php get_template_part( 'content', get_post_format() ); ?>
        </div>

        <?php if ( ( $i ) % 3 == 0 ) : ?>

                </div>
                <div class="row-fluid site-content preview-row">


            <?php endif; ?>

        <!-- Increments the post counter -->
        <?php $i++; ?>

        <?php endwhile; ?>



    <?php else : // if no posts ?>
    <article id="post-0" class="post no-results not-found">
        <header class="entry-header">
            <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
        </header>

        <div class="entry-content">
            <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
            <?php get_search_form(); ?>
        </div><!-- .entry-content -->
    </article><!-- #post-0 -->
    <?php endif; ?>

</div>
</div>

<?php get_footer(); ?>