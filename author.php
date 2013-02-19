<?php get_header(); ?>

<div class="page">
    <div class="hfeed site">
        <?php get_sidebar('content-header'); ?>

<?php if ( have_posts() ) : $i = 1; // if has posts ?>

    <?php if ( get_the_author_meta( 'description' ) ) : ?>

    <div class="row-fluid">&nbsp;</div>

    <div class="row-fluid">
        <div class="span4">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 250 ) ); ?>
        </div><!-- .author-avatar -->
        <div class="span7">
            <h6><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h6>
            <p><?php the_author_meta( 'description' ); ?></p>
        </div><!-- .author-description	-->
    </div><!-- .author-info -->

    <?php endif; ?>

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
</div>

<?php get_footer(); ?>