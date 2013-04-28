<?php require_once "personal/layout.php"; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row-fluid" style="padding-top: 0; margin-top: 0;">
		<div class="span8">
			<header>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail('large'); ?>
				</div>
				<div class="entry-title">
					<h1><?php the_title(); ?></h1>
				</div>                    
			</header>
			
		</div>
		<div class="span4">
			<?php get_coauthor_list_sidebar() ?>
			
			<ul class="tags">			
				<?php
					$tags = get_the_tags();
					if ( $tags ) {
					  foreach( $tags as $T ) {
						echo '<li class="tag"><a href="/tag/'. get_tag_link($T->id) . $T->slug .'">'. $T->name .'</a><span class="divider"> </span></li>';
					  }
					}
				?>
			</ul>
			
			
			<div class="post-thumbnail-caption">
			<?php 
				if ( has_post_thumbnail() ) :
				
					echo get_post( get_post_thumbnail_id() )->post_excerpt;
				
				endif; 
			?>
			</div>
		</div>
	</div>
	

	<div class="entry-content">
			<?php the_content(''); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
	</div>
	
	<div class="row-fluid">
		<div class="span12">
		
			<ul class="breadcrumb">
				<li><?php the_date(); ?> <span class="divider">/</span></li>
				
				<?php
					$tags = get_the_tags();
					if ( $tags ) {
					  foreach( $tags as $T ) {
						echo '<li><a href="/tag/'. get_tag_link($T->id) . $T->slug .'">'. $T->name .'</a><span class="divider"> </span></li>';
					  }
					}
				?>
			</ul>
		
		
			<?php

				$temp_query = clone $wp_query;
					
				query_posts(
					array(
						'posts_per_page' => 6,
						'orderby' => 'rand',
						'post__not_in' => array( get_the_ID() )
					)
				);
		
			
				if ( have_posts() ) :
					
					$post_count = $wp_query->post_count;

					$layout = new Layout(
						// how many posts does wordpress yield for this page?
						$post_count
					);
						
					while ( have_posts()) :					

						// configures the layout according to the number of posts
						switch ( $post_count ) {
							case 0:
								print( 'no posts' );
							break;
							default:
								$layout->addRow(3);
								$layout->addRow(3);
							break;
						}								
						$layout();
						
						
					
					endwhile;
					
					$wp_query = $temp_query;
					
				endif;
				
			?>
			
					<!-- tags -->
		<?php /* 
		term_id: the tag id
		name: the tag name 
		slug: a slug generated from the tag name
		term_group: the group of the tag, if any
		taxonomy: should always be 'post_tag' for this case
		description: the tag description
		count: number of uses of this tag, total
		*/ ?>
		
		</div>
	</div>
</article>


