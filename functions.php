<?php

include_once('twitter-widget.php');




function sonen_setup() {

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

add_action( 'after_setup_theme', 'sonen_setup' );



function sonen_remove_scripts() {
    wp_dequeue_script( 'twentytwelve-navigation' );
    wp_deregister_script( 'twentytwelve-navigation' );
    wp_register_script( 'bootstrap', '/wp-content/themes/sonen/js/bootstrap.min.js' );
    // wp_register_script( 'bootstrap', '/wp-content/themes/sonen/js/ios-orientation-fix.js' );
}
add_action( 'wp_enqueue_scripts', 'sonen_remove_scripts', 20 );
sonen_remove_scripts();


function sonen_disable_google_fonts() {
    wp_deregister_style( 'twentytwelve-fonts' );
}
add_action( 'wp_enqueue_scripts', 'sonen_disable_google_fonts', 11 );
sonen_disable_google_fonts();


function content_nav( $html_id ) {
    global $wp_query;

    $html_id = esc_attr( $html_id );

    if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
            <div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
            <div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
        </nav><!-- #<?php echo $html_id; ?> .navigation -->
    <?php endif;
}




// registrer widgeter
if (function_exists('register_sidebar')) {

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

    register_sidebar(array(
        'name'=> 'Twitter-strøm',
        'id' => 'twitter'
    ));

    register_sidebar( array(
        'name'=> 'Arrangementene',
        'id' => 'events'
    ));

    register_sidebar(array(
        'name'=> 'Bloggrull 1 (opptil 4 elementer)',
        'id' => 'blogroll-first',
        'before_widget' => '<div class="span3 blogroll-element">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name'=> 'Bloggrull 2 (opptil 4 elementer)',
        'id' => 'blogroll-second',
        'before_widget' => '<div class="span3 blogroll-element">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name'=> 'Bloggrull 3 (opptil 4 elementer)',
        'id' => 'blogroll-third',
        'before_widget' => '<div class="span3 blogroll-element">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name'=> 'Artikkelslutt',
        'id' => 'article-end'
    ));

    /* */



}

function no_more( $more ) {
    global $post;
    return '';
}

add_filter('excerpt_more', 'no_more');

if ( function_exists( 'coauthors' ) ) {
    function sonen_coauthors( $between = null, $betweenLast = "og ", $before = "Skrevet av ", $after = ".", $echo = true ){
        return coauthors__echo('display_name', 'field', array(
            'between' => $between,
            'betweenLast' => $betweenLast,
            'before' => $before,
            'after' => $after
        ), null, $echo );
    }

    function sonen_coauthors_object( $between = null, $betweenLast = "og ", $before = "Skrevet av ", $after = ".", $echo = false ){
        return coauthors('display_name', 'field', array(
            'between' => $between,
            'betweenLast' => $betweenLast,
            'before' => $before,
            'after' => $after
        ), null, $echo = false );
    }

    function get_coauthor_list_sidebar() {
        echo '<div class="single-authors">';

        foreach( get_coauthors() as $i ) {
            $output = array(
                '<div class="single-author">',
                    '<div class="single-author-avatar">',
                        get_avatar( $i->ID ),
                    '</div>',
                    '<div class="single-author-name">',
                        get_author_name( $i->ID ),
                    '</div>',
                '</div>'
            );

            echo implode( "\n", $output );
        }
        echo '</div>';
    }

} else {
    the_author();
}






// fjerner de ubrukte meny-områdene fra hovedtemaet 'twentytwelve'
function remove_menus() {
    unregister_sidebar( 'sidebar-1' );
    unregister_sidebar( 'sidebar-2' );
    unregister_sidebar( 'sidebar-3' );
}
add_action( 'widgets_init', 'remove_menus', 11 );



?>