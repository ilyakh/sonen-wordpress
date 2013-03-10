<?php get_header(); ?>

<?php //


/*
    Layout(columns=12)
    ------------------
        Row(n=4): 12 columns / 4 elements per row
        -----------------------------------------
            Element.span3     Element.span3     Element.span3     Element.span3

        Row(n=2): 12 columns / 2 elements per row
        -----------------------------------------
                    Element.span6                       Element.span6

        Row(n=3): 12 columns / 3 elements per row
        -----------------------------------------
                Element.span4           Element.span4           Element.span4

*/

class Layout {
    protected $rows;
    protected $size;
    protected $currentRow = 0;

    function __construct( $gridSize=12, $elementsPerLayout=11 ) {
        // row container
        $this->rows = array();
        // dimensions, limits and sizes
        $this->gridSize = $gridSize;
        $this->elementsPerLayout = $elementsPerLayout;
    }

    function addRow( $n=1 ) {
        // limits the number of elements per row to a range from 1 to the value of 'gridSize'
        if ( $n > $this->gridSize ) {
            $n = $this->gridSize;
        } elseif ( $n <= 1 ) {
            $n = 1;
        }

        $row = new Row( $this->gridSize / $n );
        $this->rows[] = $row;

        return $row;
    }

    function addElement( $element="" ) {

        if ( $this->getCurrentRow() != null ) {

            // selects a new row if the previous is full
            if ( $this->getCurrentRow()->isFull() ) {
                ++ $this->currentRow;
            }

            if ( $this->getCurrentRow() != null ) {
                $this->getCurrentRow()->addElement( $element );
            }
        }
    }

    function getCurrentRow() {
        return $this->rows[$this->currentRow];
    }


    function toArray() {
        $rows = array('<div class="site">');

        foreach ( $this->rows as $row ) {
            $rows = array_merge( $rows, $row->toArray() );
        }

        $rows[] = "</div>";

        return $rows;

    }

    // -----------------------------------------------------------------------------------------------------------------
    function __toString() {

        $rows = array();
        $template = '<div class="row-fluid">%s</div>';

        foreach ( $this->rows as $row ) {
            $rows[] = sprintf( $template, $row );
        }

        return implode( "\n", $rows );
    }
}

class Row {
    protected $elements;

    // falls back to default element size=4, yields three elements per row
    function __construct( $elementSize=4, $gridSize=12 ) {
        $this->elements = array();
        $this->gridSize = $gridSize;
        $this->elementSize = $elementSize;

        // keeps the elementSize above zero
        if ( $elementSize <= 0 ) {
            $elementSize = 12;
        } elseif ( $elementSize > 12 ) {
            $elementSize = 12;
        }
    }

    function addElement( $element ) {
        if ( $this->isFull() ) {
            return false;
        } else {
            $element->setSize( $this->elementSize );
            $this->elements[] = $element;
            return true;
        }
    }

    function isFull() {
        return ( count( $this->elements ) >= ( $this->gridSize / $this->elementSize ) );
    }

    function isEmpty() {
        return ( count( $this->elements ) == 0 );
    }

    function populate() {
        for ( $i = 0; $i < ( $this->gridSize / $this->elementSize ); $i++ ) {
            $element = new Element();
            $element->setSize( $this->elementSize );
            $this->elements[] = $element;
        }
    }

    function toArray() {

        $elements = array('<div class="row-fluid preview-row">');

        foreach ( $this->elements as $element ) {
            $elements = array_merge( $elements, $element->toArray() );
        }

        $elements[] = '</div>';

        return $elements;
    }

    // -----------------------------------------------------------------------------------------------------------------
    function __toString() {
        $elements = array();
        $template = '<div class="span%s">%s</div>';

        foreach ( $this->elements as $element ) {
            $elements[] = sprintf( $template, $this->elementSize, $element );
        }

        return '<h1>'. count( $this->elements ).'</h1>' . implode( "\n", $elements );
    }
}

class Element {

    protected $content;
    protected $size;

    function __construct( $content="" ) {
        $this->content = $content;
        $this->size = 4;
    }

    function toArray() {

        return array(
            sprintf( '<div class="span%s preview">', $this->size ),
            'content',
            '</div>'
        );
    }

    function setSize( $size ) {
        $this->size = $size;
    }

    // -----------------------------------------------------------------------------------------------------------------
    function __toString() {
        return sprintf( "Element" );
    }

}


if ( have_posts() )  {

    $layout = new Layout();

    $post_count = $wp_query->post_count;

    $layout->addRow(3)->populate();


    $recipe = $layout->toArray();

    foreach ( $recipe as $element ) {
        if ( $element == "content" ) {
            the_post();
            get_template_part( 'content', get_post_format() );
        } else {
            echo $element;
        }
    }


}





// ?>





<div class="site">



<?php if ( have_posts() ) : /* Starts the LOOP */ ?>

	<?php $i=1; /* POST counter */ ?>
    <div class="row-fluid preview-row">

        <?php /* while ( $quantified_query->have_posts() ) : $quantified_query->the_post(); */
            while ( have_posts() ) : the_post(); ?>

            <?php if ( $i == 1 || $i == 2 ) : ?>
                <div class="span6 preview recent">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>

                <?php if ( ( $i == 2 ) && ( $wp_query->post_count < 3 ) ) : ?>
                </div>
                </div>
                </div>

                <div class="row-fluid">
                    <div class="span12 information">
                        <div class="row-fluid">
                            <div class="span8" id="events">
                                <?php get_sidebar('events'); ?>
                            </div>
                            <div class="span4" id="twitter">
                                <?php get_sidebar( 'twitter' ); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="site">
                    <div class="row-fluid">
                        <div class="span12 previews">

                <?php endif; ?>

            <?php elseif ( $i == 3 || $i == 4 ) : ?>

                <?php if ( $i == 3 ) : ?>
                </div>

                <!-- <div class="row-fluid separator-row">
                    <div class="span12">
                    <?php wp_nav_menu(
                        array( 'theme_location' => 'first',
                               'menu' => 'first'
                        ) );
                    ?>
                    </div>
                </div>-->

                <div class="row-fluid preview-row">

                <?php endif; ?>

                <div class="span4 preview">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>


            <?php elseif ( $i >= 4 ) : ?>

                <?php if ( ( $i ) % 3 == 0 ) : ?>

                </div>

                <?php if ( $i == 9 ) : ?>

                </div>
                </div>
                </div>

                <div class="row-fluid">
                    <div class="span12 information">
                        <div class="row-fluid">
                            <div class="span8" id="events">
                                <?php get_sidebar('events'); ?>
                            </div>
                            <div class="span4" id="twitter">
                                <?php get_sidebar( 'twitter' ); ?>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="site">
                <div class="row-fluid">
                    <div class="span12 previews">

                <?php elseif ( $i == 15 ) : ?>
                    <!--
                    <div class="row-fluid separator-row">
                        <div class="span12"><?php wp_nav_menu( array( 'theme_location' => 'second', 'menu' => 'second' ) ); ?></div>
                    </div>
                    -->
                <?php elseif ( $i == 21 ) : ?>
                    <!--
                    <div class="row-fluid separator-row">
                        <div class="span12"><?php wp_nav_menu( array( 'theme_location' => 'third', 'menu' => 'third' ) ); ?></div>
                    </div>
                    -->
                <?php endif; ?>

                <div class="row-fluid preview-row">

                <?php endif; ?>

                <div class="span4 preview">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>
            <?php endif; ?>

            <!-- Increments the post counter -->
            <?php $i++; ?>

        <?php endwhile; ?>

        </div>








    <?php else : /* NO POSTS */ ?>

        <article id="post-0" class="post no-results not-found">

        <?php if ( current_user_can( 'edit_posts' ) ) :
            // Show a different message to a logged-in user who can add posts.
        ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
            </div><!-- .entry-content -->

        <?php else :
            // Show the default message to everyone else.
        ?>
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        <?php endif; ?>

        </article><!-- #post-0 -->

    <?php endif; ?>

</div>

<?php twentytwelve_content_nav( 'nav-below' ); ?>




</div>
<?php get_sidebar( 'blogroll' ); ?>


<?php get_footer(); ?>