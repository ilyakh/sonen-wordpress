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
<!-- SECTION -->
<div class="section">


<?php if ( have_posts() ) : /* Starts the LOOP */ ?>

<?php
// the counter
$i = 0;

$posts_per_page = 50;
$query = new WP_Query( 'posts_per_page=' . $posts_per_page );

?>

<div class="row-fluid">
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
<?php $i++ // increments the counter ?>


    <?php if ( $i == 1 || $i == 2  ) : // the first and the second posts are wider ?>
        <div class="span6 preview">
        <?php get_template_part( 'content', get_post_format() ); ?>
        </div>

        <?php if ( $i == 2 ) : ?>
        </div><hr class="debug" /><div class="row-fluid">
        <?php endif; ?>


    <?php else : ?>
        <div class="span4 preview">
        <?php get_template_part( 'content', get_post_format() ); ?>
        </div>
    <?php endif; ?>

    <?php if ( $i % 3 == 0 ) : // separates rows ?>
    </div><hr class="debug" /><div class="row-fluid">
    <?php endif; ?>


<?php endwhile; ?>
</div>

<?php  twentytwelve_content_nav( 'nav-below' );  ?>


<?php endif; // end have_posts() check ?>


</div> <!-- SECTION: END -->
<?php get_footer(); ?>
