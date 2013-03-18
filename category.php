<?php get_header(); ?>

<div class="hfeed site">
    <?php get_sidebar('content-header'); ?>

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
    <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>

</div>
</div>

<?php get_footer(); ?>