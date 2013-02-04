





<?php if ( ! is_single() ) : ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
    <div class="featured-post">
        <?php _e( 'Featured post', 'twentytwelve' ); ?>
    </div>
    <?php endif; ?>

    <header class="entry-header">

        <div class="foundation">

            <div class="entry-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
        </div>

        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h1>

    </header>



    <?php if ( is_search() ) : ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
        <a href="<?php the_permalink(); ?>"
            title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
        </a>
    </div><!-- .entry-content -->

    <?php endif; ?>
    </article><!-- #post -->

		
<?php else : ?>
<div class="section">
    <div class="single">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
            <div class="featured-post">
                <?php _e( 'Featured post', 'twentytwelve' ); ?>
            </div>
            <?php endif; ?>

            <div class="row-fluid">
                <div class="span6">
                    <header class="entry-header">
                        <div class="foundation">
                            <!--
                            <div class="entry-category">
                                <a class="category-name" href="<?php the_permalink(); ?>">
                                    <?php if ( in_category( 'prosjekt' ) ) : ?>
                                        Prosjekt
                                    <?php elseif ( in_category( 'arrangement' ) ) : ?>
                                        Arrangement
                                    <?php elseif ( in_category( 'artikkel' ) ) : ?>
                                        Artikkel
                                    <?php else: ?>

                                    <?php endif; ?>

                                    <?php if ( in_category( 'anbefalt' ) ) : ?>
                                        <i class="icon-white icon-star">&nbsp;</i>
                                    <?php endif; ?>
                                </a>
                            </div>
                            -->

                            <div class="entry-thumbnail">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>


                        </div>
                    </header><!-- .entry-header -->
                </div>
                <div class="span6 entry-title-container">
                    <h1 class="entry-title">
                        <div class="floater">
                            <a class="content" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </div>
                    </h1>
                </div>
            </div>

            <?php if ( is_search() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
                <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
            </div>
            <!-- .entry-content -->
            <?php endif; ?>

            <!-- Display ABOUT AUTHOR footer -->

        </article>
        <!-- ARTICLE: END -->
    </div>
    <!-- SINGLE: END -->
</div>
<!-- SECTION: END -->


<!-- AREA -->
<div class="area">
    <!-- SECTION -->
    <div class="section">
        <div class="author-info">
            <div class="author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 90 ) ); ?>
            </div>
        </div>

        <div class="author-description">
            <h4><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h4>
            <div><?php the_author_meta( 'description' ); ?></div>

            <div>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"></a>
            </div>
        </div>
    </div>
    <!-- SECTION: END -->
</div>
<!-- AREA: END -->

<!-- SECTION -->
<div class="section">

    <!-- ARTICLE (meta) -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <footer class="entry-meta">
            <?php /* twentytwelve_entry_meta(); */ ?>
        </footer><!-- .entry-meta -->
    </article>
    <!-- ARTICLE: END -->


<?php endif; ?>


