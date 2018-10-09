$(document).ready(function(){
    $('#events-list').on( 'click', '.event__details-toggle', function(){
        $(this).siblings().toggleClass( 'show-details' );
    } );
});