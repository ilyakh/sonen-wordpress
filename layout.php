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

    function __construct( $postCount, $gridSize=12, $elementsPerLayout=11 ) {
        // row container
        $this->rows = array();
        // dimensions, limits and sizes
        $this->gridSize = $gridSize;
        $this->elementsPerLayout = $elementsPerLayout; // expected maximum
        $this->postCount = $postCount; // real number of posts
    }

    function addRow( $n=1 ) {
        // allows chaining
        if ( is_numeric( $n ) ) {
            // limits the number of elements per row to a range
            // from 1 to the value of 'gridSize'
            if ( $n > $this->gridSize ) {
                $n = $this->gridSize;
            } elseif ( $n <= 1 ) {
                $n = 1;
            }

            $row = new Row( $this->gridSize / $n );
            $this->rows[] = $row;

            return $row;
        } else if ( is_subclass_of( $n, "Row" ) ) {
            $this->rows[] = $n;
            return $n;
        } else {
            return null;
        }
    }

    function addElement( $element ) {
        if ( $this->getCurrentRow() != null ) {
            if ( ! $this->getCurrentRow()->isFull() ) {

                $this->getCurrentRow()->addElement( $element );
            } else {
                ++ $this->currentRow;
                $this->addElement( $element );
            }
        }
    }

    private function distribute() {
        for ( $i = 0; $i < $this->postCount; $i++ ) {
            $this->addElement( new Element() );
        }
    }

    function getCurrentRow() {
        return $this->rows[$this->currentRow];
    }

    function countFullRows() {
        $counter = 0;
        foreach ( $this->rows as $row ) {
            if ( $row->isFull() ) {
               ++$counter;
            }
        }

        return $counter;
    }

    function __invoke() {
        $this->distribute(); // distributes the elements throughout the grid

        $rowCounter = 1;

        foreach( $this->rows as $row ) {

            // forces the dark area to appear on all pages despite the number of posts
            if ( $this->countFullRows() > 2 ) {
                if ( $rowCounter == 3 ) {
                    get_sidebar( 'information' );
                }
            } else {
                if ( $rowCounter == 2 ) {
                    get_sidebar( 'information' );
                }
            }

            printf( '<div class="row-fluid preview-row preview-row-%s">', $this->currentRow );
            $row();
            print( '</div>' );

            $rowCounter++;
        }
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
            $this->elementSize = 12;
        } elseif ( $elementSize > 12 ) {
            $this->elementSize = 12;
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

    function __invoke() {
        foreach ( $this->elements as $element ) {
            printf( '<div class="span%s preview">', $this->elementSize );
            $element();
            print( '</div>' );
        }
    }
}


class Element {

    protected $size;

    function __construct() {
        $this->size = 4;
    }

    function __invoke() {
        the_post(); // fetches the next Wordpress-post and adopts its scope
        get_template_part( 'content', get_post_format() );
    }

    function setSize( $size ) {
        $this->size = $size;
    }
}


// ?>