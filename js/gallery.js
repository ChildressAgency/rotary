$( document ).ready(function(){
    $( '.gallery__item' ).click( function(){
        $( '.gallery__item' ).not(this).removeClass( 'gallery__active' );
        $( this ).toggleClass( 'gallery__active' );
    } );
});