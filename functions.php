<?php

include_once('twitter-widget.php');



if ( ! function_exists( 'twentytwelve_setup' ) ) :

function sonen2_setup() {


	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	add_editor_style();

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-formats',
        array( 'article' )
    );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );

    register_nav_menu( 'first', 'first' );
    register_nav_menu( 'second', 'second' );
    register_nav_menu( 'third', 'third' );
	
	set_post_thumbnail_size( 505, 400, true );


    add_image_size( 'square', 160, 160, true );
    add_image_size( 'small',  320, 240, true );
    add_image_size( 'medium', 640, 480, true );
    add_image_size( 'large', 1024, 768, true );


}

add_action( 'after_setup_theme', 'sonen2_setup' );

endif;

function sonen2_remove_scripts() {
    wp_dequeue_script( 'twentytwelve-navigation' );
    wp_deregister_script( 'twentytwelve-navigation' );
    wp_register_script( 'bootstrap', '/wp-content/themes/sonen2/js/bootstrap.min.js' );
    // wp_register_script( 'bootstrap', '/wp-content/themes/sonen2/js/ios-orientation-fix.js' );
}
add_action( 'wp_enqueue_scripts', 'sonen2_remove_scripts', 20 );
sonen2_remove_scripts();


function sonen2_disable_google_fonts() {
    wp_deregister_style( 'twentytwelve-fonts' );
}
add_action( 'wp_enqueue_scripts', 'sonen2_disable_google_fonts', 11 );
sonen2_disable_google_fonts();





// registrer widgeter
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'=> 'Twitter-strøm',
        'id' => 'twitter'
    ));

    register_sidebar( array(
        'name'=> 'Arrangementene',
        'id' => 'events'
    ));

    register_sidebar(array(
        'name'=> 'Sidetopp',
        'id' => 'top'
    ));

    register_sidebar(array(
        'name'=> 'Innholdstopp (det hvite området)',
        'id' => 'content-header'
    ));

    register_sidebar(array(
        'name'=> 'Bloggroll 1 (opp til 4 elementer)',
        'id' => 'blogroll-first',
        'before_widget' => '<div class="span3 blogroll-element">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name'=> 'Bloggroll 2 (opp til 4 elementer)',
        'id' => 'blogroll-second',
        'before_widget' => '<div class="span3 blogroll-element">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name'=> 'Bloggroll 3 (opp til 4 elementer)',
        'id' => 'blogroll-third',
        'before_widget' => '<div class="span3 blogroll-element">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name'=> 'Bidragsytere',
        'id' => 'authors'
    ));

    /* */

    register_sidebar(array(
        'name'=> 'Høyre marg',
        'id' => 'horizontal-right'
    ));


    register_sidebar(array(
        'name'=> 'Venstre oppe',
        'id' => 'left-top'
    ));

    register_sidebar(array(
        'name'=> 'Venstre i senter',
        'id' => 'left-center'
    ));

    register_sidebar(array(
        'name'=> 'Venstre nede',
        'id' => 'left-bottom'
    ));

}

function no_more( $more ) {
    global $post;
    return '';
}

add_filter('excerpt_more', 'no_more');

if ( function_exists( 'coauthors' ) ) {

    function sonen2_coauthors( $between = null, $betweenLast = "og ", $before = "Skrevet av ", $after = ".", $echo = true ){
        return coauthors__echo('display_name', 'field', array(
            'between' => $between,
            'betweenLast' => $betweenLast,
            'before' => $before,
            'after' => $after
        ), null, $echo );
    }

} else {
    the_author();
}


// fjerner ubrukte meny-områder fra temaet 'twentytwelve'
function remove_menus() {
    unregister_sidebar( 'sidebar-1' );
    unregister_sidebar( 'sidebar-2' );
    unregister_sidebar( 'sidebar-3' );
}
add_action( 'widgets_init', 'remove_menus', 11 );



?>