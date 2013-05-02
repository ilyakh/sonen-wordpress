<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
	$url = $thumb['0'];
?>

<div class="preview" style="background-image: url('<?php echo $url; ?>'); background-repeat: no-repeat;">
	<div class="row-fluid">
		<div class="span6 offset6 description">
			<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php 
					$content = strip_tags( get_the_content('') );
					
					if ( strlen( $content ) > 140 ) {
						the_excerpt();
					} else {
						the_content('');
					}
				?>
			</a>
		</div>
	</div>
</div>