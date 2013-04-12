<?php


function wp_fathom_clean_setup() {

	// load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );
	
	add_theme_support( 'post-formats',
        array( 'article' )
    );

	add_theme_support( 'post-thumbnails' );

    // register_nav_menu( 'first', 'first' );
    
	// set_post_thumbnail_size( 505, 400, true );
	
    // add_image_size( 'square', 160, 160, true );
    

}

add_action( 'after_setup_theme', 'wp_fathom_clean_setup' );



?>