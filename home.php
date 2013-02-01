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
	
	
	<?php $i=1; /* POST counter */ ?>
	
	<!-- Opens the featured article area -->
	<div id="featured" class="row-fluid site-content">
	
	<?php /* while ( have_posts() ) : the_post(); */ ?>
	
	<?php
		/* modified loop allows more  */
		$number_of_posts = 50;
		$quantified_query = new WP_Query( 'posts_per_page=' + $number_of_posts );
		
		while ( $quantified_query->have_posts() ) : $quantified_query->the_post();
	?>

		<!-- Distributes the posts: first the half-page width and then the one-thirds -->
		<?php if ( $i <= 2 ) : ?>
		
			<div class="span6 post-thumbnail featured">
				<?php get_template_part( 'content', get_post_format() ); ?>
			</div>
				
		<?php elseif ( $i > 2 ) : ?>
			
			<?php if ( $i % 3 == 0 ) : ?>
			</div>
			<div id="primary" class="row-fluid site-content">
			<div id="content" role="main">
			<?php endif; ?>

				<div class="span4 post-thumbnail">
					<?php get_template_part( 'content', get_post_format() ); ?>
				</div>

		<?php endif; ?>

		<!-- Increments the post counter -->
		<?php $i++; ?>
	
	<?php endwhile; ?>
	</div>
	
	<?php /* wentytwelve_content_nav( 'nav-below' ); */ ?>


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
	<?php endif; // end current_user_can() check ?>

	</article><!-- #post-0 -->

<?php endif; // end have_posts() check ?>

</div><!-- #content -->
</div><!-- #primary -->


<?php /* get_sidebar(); */ ?>

</div>

<?php get_footer(); ?>
