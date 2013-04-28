<?php



function wp_fathom_clean_setup() {

	// load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );
	
	add_theme_support( 'post-formats',
        array( 'article' )
    );

	add_theme_support( 'post-thumbnails' );
	
	
	
	
	$args = array(
		'default-color'          => 'white',
		'default-image'          => get_template_directory_uri() . '/img/banner.jpg',
	);
	add_theme_support( 'custom-background', $args );
	
	
	$args = array(
		'width'         => 272,
		'height'        => 53,
		'default-image' => get_template_directory_uri() . '/img/logo.png',
		'uploads'       => true,
	);
	add_theme_support( 'custom-header', $args );

    // register_nav_menu( 'first', 'first' );
    
	// set_post_thumbnail_size( 505, 400, true );
	
    // add_image_size( 'square', 160, 160, true );
    

}

add_action( 'after_setup_theme', 'wp_fathom_clean_setup' );




/**
 *
 *	EXCERPT
 *
 */

add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more( $more ) {
	return '';
}





/**
 *
 *	CONTENT
 *
 */

add_filter( 'the_content', 'sonen_content_filter', 20 );
function sonen_content_filter( $content ) {

	/* [!]	already imported by lightbox plus
	uncomment and move to the top if lightbox-plus is uninstalled */
	// require_once "personal/simple_html_dom.php";
	
	
	
	
	if ( is_single() ) {	
		
		$html = str_get_html( "<div class='entry-content'>". $content ."</div>" );
	
		$paragraphs = $html->find( ".entry-content > *" );
		
		$normal_paragraphs = array();
		
		for ( $i = 0; $i < count( $paragraphs ); $i++ ) {
			$p = $paragraphs[$i];
			if ( $i == 0 && $p->tag == "p" ) {
				// ingress
				$p = '<span class="ingress">'. $p .'</span>';
			} else if ( $p->tag == "p" ) {
				// regular paragraph
				$p = '<div class="row-fluid"><div class="span10 paragraph">'. $p->xmltext() .'</div></div>';
			}
			$normal_paragraphs[] = $p;
		}
		
		$content = implode( $normal_paragraphs );
		
	
		/*
		echo '<div style="border: 1px solid red; padding: 5px;">';
		
		foreach ( $paragraphs as $p ) {
			echo $p;
			echo '<hr style="border: 1px solid red;" />';
		}
		
		echo '</div>';
		*/
		
		return $content;
	}
	
	return $content;
}



/**
 *
 *	CO-AUTHORS
 *	(requires plugin)
 *
 */

if ( function_exists( 'coauthors' ) ) {
    function get_coauthor_list_sidebar() {
        echo '<div class="authors">';

        foreach( get_coauthors() as $i ) {
            $output = array(
                '<div class="author">',
                    '<div class="author-avatar">',
                        get_avatar( $i->ID ),
                    '</div>',
                    '<div class="author-name">',
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





/**
 *
 *	GALLERY
 *
 */

add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );

function my_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;
	
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 2,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor( 100/$columns ) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', 
	"
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} img {
                border-radius: 3px;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
        
        <div id='$selector' class=\"gallery galleryid-{$id}\">
		<div class=\"row-fluid\">" 
	);
	
	

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
		
		$link = wp_get_attachment_link($id, $size, true, false);
		if ( isset($attr['link']) && 'file' == $attr['link'] ) {
			wp_get_attachment_link($id, $size, false, false);
		}
		

		
		// first item
        $output .= "<{$itemtag} class=\"span6 gallery-item\">";
		
		$output .= '<!-- here -->';
		
		// icon
        $output .= "
            <{$icontag} class=\"gallery-icon\">
                $link
            </{$icontag}>";
		
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class=\"gallery-caption\">
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
		
		// $output .= $i . ": " . $columns . ": " . ( $i % $columns );
		
        if ( $columns >= 1 && ($i +1) % $columns == 0 ) {
			$output .= '</div><div class="row-fluid">';
		}
		
		$i++;
    }

    $output .= "
        </div>\n";

    return $output;
}


?>