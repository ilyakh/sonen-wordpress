<?php get_header(); ?>
<div class="site">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>

        <?php if( comments_open() ) : ?>
        </div>


        <div class="area">
        <div class="site">&nbsp;</div>
        </div>

        <div class="hfeed site">
        <hr />
        <?php endif; ?>


        <?php comments_template( '', true ); ?>
    <?php endwhile; ?>
</div>



<?php get_footer(); ?>