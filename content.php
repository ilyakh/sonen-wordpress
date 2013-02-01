<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_single() ) : ?>
			
			<?php set_post_thumbnail_size( 640, 480, true ); ?>
			
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="featured-post">
				<?php _e( 'Featured post', 'twentytwelve' ); ?>
			</div>
			<?php endif; ?>
			
			<header class="entry-header">
				
				<div class="foundation">
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
								<i class="icon-white icon-star">&nbsp</i>
							<?php endif; ?>
						</a>
					</div>
					
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
				
			</header><!-- .entry-header -->
			
			
		
			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php else : ?>
			<div class="entry-content">
					
				<a href="<?php the_permalink(); ?>" 
					title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
					<?php the_content(); ?>
				</a>
				

				
			</div><!-- .entry-content -->

			
			<?php endif; ?>	
	
		
		<?php else : ?>
			
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="featured-post">
				<?php _e( 'Featured post', 'twentytwelve' ); ?>
			</div>
			<?php endif; ?>
			<header class="entry-header">
				<div class="foundation">
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
				
					<div class="entry-thumbnail">
						<?php the_post_thumbnail('large'); ?>
					</div>
				</div>
				
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
				
			</header><!-- .entry-header -->

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
			
			<footer class="entry-meta">
				<?php /* twentytwelve_entry_meta(); */ ?>

				<?php /* edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); */ ?>
				<?php /* if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) :
				// If a user has filled out their description and this is a multi-author blog, show a bio on their entries.*/ ?>
					<div class="author-info">
						<div class="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
						</div><!-- .author-avatar -->
						<div class="author-description">
							<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
							<p><?php the_author_meta( 'description' ); ?></p>
							<div class="author-link">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
								</a>
							</div><!-- .author-link	-->
						</div><!-- .author-description -->
					</div><!-- .author-info -->
				<?php /* endif; */ ?>
			</footer><!-- .entry-meta -->
		<?php endif; ?>
	
</article><!-- #post -->

