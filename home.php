<?php get_header(); ?>

<div class="site">

<?php if ( have_posts() ) : /* Starts the LOOP */ ?>

	<?php $i=1; /* POST counter */ ?>
    <div class="row-fluid preview-row">

        <?php /* while ( $quantified_query->have_posts() ) : $quantified_query->the_post(); */
            while ( have_posts() ) : the_post(); ?>

            <?php if ( $i == 1 || $i == 2 ) : ?>
                <div class="span6 preview recent">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>

            <?php elseif ( $i == 3 || $i == 4 ) : ?>

                <?php if ( $i == 3 ) : ?>
                </div>

                <!-- <div class="row-fluid separator-row">
                    <div class="span12">
                    <?php wp_nav_menu(
                        array( 'theme_location' => 'first',
                               'menu' => 'first'
                        ) );
                    ?>
                    </div>
                </div>-->

                <div class="row-fluid preview-row">
                    <?php if ( $wp_query->post_count < 3 ) : ?>
                    </div>
                    </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12 information">
                            <div class="row-fluid">
                                <div class="span8" id="events">
                                    <?php get_sidebar('events'); ?>
                                </div>
                                <div class="span4" id="twitter">
                                    <?php get_sidebar( 'twitter' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="site">
                        <div class="row-fluid">
                            <div class="span12 previews">

                    <?php endif; ?>
                <?php endif; ?>

                <div class="span4 preview">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>


            <?php elseif ( $i >= 4 ) : ?>

                <?php if ( ( $i ) % 3 == 0 ) : ?>

                </div>

                <?php if ( $i == 9 ) : ?>

                </div>
                </div>
                </div>

                <div class="row-fluid">
                    <div class="span12 information">
                        <div class="row-fluid">
                            <div class="span8" id="events">
                                <?php get_sidebar('events'); ?>
                            </div>
                            <div class="span4" id="twitter">
                                <?php get_sidebar( 'twitter' ); ?>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="site">
                <div class="row-fluid">
                    <div class="span12 previews">

                <?php elseif ( $i == 15 ) : ?>
                    <!--
                    <div class="row-fluid separator-row">
                        <div class="span12"><?php wp_nav_menu( array( 'theme_location' => 'second', 'menu' => 'second' ) ); ?></div>
                    </div>
                    -->
                <?php elseif ( $i == 21 ) : ?>
                    <!--
                    <div class="row-fluid separator-row">
                        <div class="span12"><?php wp_nav_menu( array( 'theme_location' => 'third', 'menu' => 'third' ) ); ?></div>
                    </div>
                    -->
                <?php endif; ?>

                <div class="row-fluid preview-row">

                <?php endif; ?>

                <div class="span4 preview">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>
            <?php endif; ?>

            <!-- Increments the post counter -->
            <?php $i++; ?>

        <?php endwhile; ?>

        </div>








    <?php else : /* NO POSTS */ ?>

        <article id="post-0" class="post no-results not-found">

        <?php if ( current_user_can( 'edit_posts' ) ) :
            // Show a different message to a logged-in user who can add posts.
        ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
            </div><!-- .entry-content -->

        <?php else :
            // Show the default message to everyone else.
        ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        <?php endif; ?>

        </article><!-- #post-0 -->

    <?php endif; ?>


<?php twentytwelve_content_nav( 'nav-below' ); ?>

</div>

<?php get_sidebar( 'blogroll' ); ?>


<?php get_footer(); ?>