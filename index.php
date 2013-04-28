<?php get_header(); ?>
	
<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>

	<?php else : ?>
		No posts
	<?php endif; // end have_posts() check ?>


<?php get_footer(); ?>