<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php if ( ! is_single() || is_archive() ) : /* PREVIEW */ ?>
        <div class="preview-container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">

                <div class="foundation">
                    <div class="entry-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    </div>
                </div>

                <h1 class="entry-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h1>

            </header><!-- .entry-header -->



            <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
                <a href="<?php the_permalink(); ?>"
                    title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                    <?php the_excerpt(); ?>
                </a>
            </div><!-- .entry-content -->

            <?php endif; ?>
            </article><!-- #post -->

        </div>


        <?php else : /* SINGLE */ ?>
        <div class="single-container">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                <div class="featured-post">
                    <?php _e( 'Featured post', 'twentytwelve' ); ?>
                </div>
                <?php endif; ?>

                <div class="row-fluid">
                    <div class="span12 entry-title-container">
                        <header class="entry-header">
                            <div class="entry-top">
                                <div class="entry-top-right"><?php the_date(); ?></div>
                                <div class="entry-top-left">&nbsp;</div>
                            </div>
                            <div class="foundation">
                                <div class="entry-thumbnail">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                                <div class="title-overlay">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </div>
                        </header><!-- .entry-header -->
                        <h1 class="entry-mobile-title visible-phone"><?php the_title(); ?></h1>
                    </div>
                </div>

                <div class="row-fluid">
                <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                    <div class="span8">
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    </div>
                <?php else : ?>


                <div class="span3 pull-right entry-date"></div>
                <div class="span8 offset1">
                    <div class="entry-content">
                        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
                    </div>
                </div>
                <?php endif; ?>

                </div>
            </article>
        </div>
    </div>
</div>
</div>

<div class="area">
    <div class="site">
        <div class="container-fluid author-field">
            <div class="row-fluid">
                <!--<div class="span2 author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ),
                          apply_filters( 'twentytwelve_author_bio_avatar_size', 90 ) );  ?>
                </div>--><!-- .author-avatar -->


                    <div class="span6"><?php sonen_coauthors() ?></div>



                    <div class="span6"><?php dynamic_sidebar('authors'); ?></div>


            </div>
        </div>
    </div>
</div>


<div class="page">
    <div class="site">


<?php endif; ?>


