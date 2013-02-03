<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

?>

<?php get_header(); ?>


<?php if ( have_posts() ) : /* Starts the LOOP */ ?>

	<?php
        $i=1; /* POST counter */
        /* modified loop allows a specific article quantity */
        $number_of_posts = 50;
        $quantified_query = new WP_Query( 'posts_per_page=' . $number_of_posts );
    ?>

        <div class="row-fluid site-content">
        <?php while ( $quantified_query->have_posts() ) : $quantified_query->the_post(); ?>

            <?php if ( $i == 1 || $i == 2 ) : ?>
                <div class="span6 preview">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>

            <?php elseif ( $i == 3 || $i == 4 ) : ?>

                <?php if ( $i == 3 ) : ?>
                </div>
                <div class="row-fluid">
                <?php endif; ?>

                <div class="span4 preview">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>


                <?php if ( $i == 4 ) : ++$i ?>

                <div class="span4 events">
                    <h5><a href="/">Kommende Arrangementer</a></h5>
                    <?php
                        get_sidebar('events');
                    ?>
                </div>

                </div>
                </div>
                </div>

                <div class="menu-banner">
                    <nav id="site-navigation" class="main-navigation row-fluid" role="navigation">
                        <h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
                        <?php wp_nav_menu( array( 'container' => '' ) ); ?>
                    </nav>
                </div>

                <div id="page" class="hfeed site">
                    <div id="main" class="wrapper">

                <?php endif; ?>

            <?php elseif ( $i > 4 ) : ?>
                <?php if ( ( $i ) % 3 == 0 ) : ?>

                <div class="row-fluid site-content">
                <?php endif; ?>

                <div class="span4 preview">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>
            <?php endif; ?>

            <!-- Increments the post counter -->
            <?php $i++; ?>

        <?php endwhile; ?>

        <?php if ( ($i % 3) != 0 ) : ?>
        </div>
        </div>
        <?php endif; ?>

        </div>
        <?php /* twentytwelve_content_nav( 'nav-below' ); */ ?>
    </div></div>

    <?php else : /* NO POSTS */ ?>
    <div id="content" role="main">
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
        <?php endif; // end current_user_can() check ?>

        </article><!-- #post-0 -->

    <?php endif; // end have_posts() check ?>

<?php get_footer(); ?>
