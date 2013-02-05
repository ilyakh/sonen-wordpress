<?php
/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
if ( ! function_exists( 'twentytwelve_setup' ) ) :

function sonen_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'article','aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	// add_theme_support( 'post-thumbnails' );
	
	set_post_thumbnail_size( 503, 9999, true ); // Unlimited height, soft crop

    add_image_size( 'half', 503, 9999, true ); 	// half-page
	add_image_size( 'third', 326, 9999, true ); 	// a third of a page

}

add_action( 'after_setup_theme', 'sonen_setup' );

endif;

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'=> 'twitter',
        'id' => 'twitter',
        /*
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="offscreen">',
        'after_title' => '</h2>'
        */
    ));

    register_sidebar( array(
        'name'=> 'events',
        'id' => 'events',
        /*
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="offscreen">',
        'after_title' => '</h2>'
        */
    ));

    register_sidebar(array(
        'name'=> 'about',
        'id' => 'about',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="offscreen">',
        'after_title' => '</h2>',
    ));

}


function no_more( $more ) {
    global $post;
    return '';
}
add_filter('excerpt_more', 'no_more');


?>

