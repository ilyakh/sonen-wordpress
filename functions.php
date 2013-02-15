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

    add_image_size( 'large', 1024, 768, true );

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
        'id' => 'events'
    ));

    register_sidebar(array(
        'name'=> 'about',
        'id' => 'about'
    ));

    register_sidebar(array(
        'name'=> 'top-right',
        'id' => 'top-right'
    ));

    register_sidebar(array(
        'name'=> 'content-header',
        'id' => 'content-header'
    ));

    register_sidebar(array(
        'name'=> 'separator-menu',
        'id' => 'separator-menu'
    ));

}


function no_more( $more ) {
    global $post;
    return '';
}
add_filter('excerpt_more', 'no_more');


?>


<?php
/**
 * Plugin Name: Goodlayers Twitter Widget
 * Description: Show last tweets from Twitter.
 * Version: 1.0
 * Author: Sittipol Sunthornpiyakul
 * Author URI: http://www.saintdo.me
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'twitter_widget' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function twitter_widget() {
    register_widget( 'Twitter' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Twitter extends WP_Widget {

    /**
     * Widget setup.
     */
    function Twitter() {
        /* Widget settings. */
        $widget_ops = array( 'classname' => 'twitter-widget', 'description' => __('A widget that show Twitter feeds.', 'gdl_back_office') );

        /* Widget control settings. */
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'twitter-widget' );

        /* Create the widget. */
        $this->WP_Widget( 'twitter-widget', __('Twitter (Goodlayers)', 'gdl_back_office'), $widget_ops, $control_ops );
    }

    /**
     * How to display the widget on the screen.
     */
    function widget( $args, $instance ) {
        extract( $args );

        /* Our variables from the widget settings. */
        $title = apply_filters('Twitter', $instance['title'] );
        $twitter_username = $instance['twitter_username'];
        $show_num = $instance['show_num'];

        /* Before widget (defined by themes). */
        echo $before_widget;
        if($title)
            echo $before_title . "<span class=\"twitter-icon\"></span>" . $title . $after_title;
        /* Display the widget title if one was input (before and after defined by themes). */
        ?>
    <div class="twitter-whole">
        <ul id="twitter_update_list"><li>Twitter feed loading</li></ul>
    </div>
    <?php
        /* After widget (defined by themes). */
        echo $after_widget;
        ?>
    <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
    <script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/<?php echo $twitter_username;?>.json?callback=twitterCallback2&amp;count=<?php echo $show_num;?>"></script>
    <?php
    }

    /**
     * Update the widget settings.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['twitter_username'] = strip_tags( $new_instance['twitter_username'] );
        $instance['show_num'] = strip_tags( $new_instance['show_num'] );

        return $instance;
    }

    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */
    function form( $instance ) {

        /* Set up some default widget settings. */
        $defaults = array( 'title' => __('Twitter Widget', 'gdl_back_office'), 'twitter_username' => '', 'show_num' => '5');
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <!-- Widget Title: Text Input -->
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'gdl_back_office'); ?></label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="width100" />
    </p>

    <!-- Your Name: Text Input -->
    <p>
        <label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>"><?php _e('Twitter username', 'gdl_back_office'); ?></label>
        <input id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" value="<?php echo $instance['twitter_username']; ?>"  class="width100" />
    </p>


    <p>
        <label for="<?php echo $this->get_field_id( 'show_num' ); ?>"><?php _e('Show Count', 'gdl_back_office'); ?></label>
        <input id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>" value="<?php echo $instance['show_num']; ?>"  class="width100" />
    </p>

    <?php
    }
}

?>