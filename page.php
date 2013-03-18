<?php get_header(); ?>

<div id="page">

<div class="row-fluid page-row">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="span8">
        <?php get_template_part( 'content', 'page' ); ?>
    </div>
</div>
<div class="row-fluid page-row">
    <div class="span8">
        <?php comments_template( '', true ); ?>
    </div>
    <?php endwhile; ?>
</div>

</div>

<div class="row-fluid preview-row">

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
</div>

<?php get_footer(); ?>