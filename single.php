<?php get_header(); ?>

<div class="site">

    <?php while ( have_posts() ) : the_post(); ?>

    <?php /* post content */
        get_template_part( 'content', get_post_format() ); ?>
    <?php /* comments */
        comments_template( '', true ); ?>


    <?php
    $temp_query = clone $wp_query;

    query_posts(
        array(
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'post__not_in' => array( get_the_ID() )
        )
    );

    ?>

    <div class="row-fluid preview-row">
        <?php while ( have_posts()) : the_post(); ?>
        <div class="span4 preview">
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
                </article>
            </div>
        </div>


    <?php endwhile; ?>
    <?php $wp_query = clone $temp_query; ?>

    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>