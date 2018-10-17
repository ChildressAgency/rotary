$( document ).ready(function(){
    $( '.documents__title' ).click(function(){
        // whether the documents section is currently expanded
        $isExpanded = $( this ).find( '.fas' ).hasClass( 'fa-times' );

        // toggle the expand/collapse icon
        $( this ).find( '.fas' ).toggleClass( 'fa-minus' ).toggleClass( 'fa-times' );

        $gridWrapper = $( this ).next();
        $grid = $gridWrapper.find( '.documents__grid' );

        // height of the documents grid
        $height = $grid.height();

        // expand if collapsed, vice-versa
        if( $isExpanded ){
            $gridWrapper.css( 'max-height', '0' );
        } else {
            $gridWrapper.css( 'max-height', $height );
        }
    });
});