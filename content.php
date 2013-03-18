<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage sonen
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

        </header>



        <?php if ( is_search() ) : // Only display Excerpts for Search ?>

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>

        <?php else : ?>

            <div class="entry-content">
                <a href="<?php the_permalink(); ?>"
                    title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                    <?php the_excerpt(); ?>
                </a>
            </div>

        <?php endif; ?>
        </article>

    </div>


    <?php else : /* SINGLE */ ?>
    <div class="single-container">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="row-fluid hidden-phone">
                <div class="span12 entry-title-container">
                    <header class="entry-header">

                        <div class="">
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
                        </div>
                    </header>
                </div>
            </div>

            <div class="row-fluid">



                <div class="span9">
                    <div class="entry-content" style="background-color: white;">

                        <div class="visible-phone">
                            <div>
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                            <h1 class="entry-mobile-title visible-phone"><?php the_title(); ?></h1>
                        </div>

                        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
                    </div>
                </div>
                <div class="span3">
                    <?php get_coauthor_list_sidebar() ?>
                </div>
            </div>
        </article>


    </div>
</div>


<?php post_nav(); ?>

<?php endif; ?>


