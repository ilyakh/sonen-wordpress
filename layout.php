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
    }

    function addSidebarRow( $row ) {
        $this->rows[] = $row;
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

    function __invoke() {
        $this->distribute();

        foreach( $this->rows as $row ) {
            print( '<div class="row-fluid preview-row">' );
            $row();
            print( '</div>' );
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