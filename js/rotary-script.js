var detailsToggles = document.getElementsByClassName( 'event__details-toggle' );

for( i = 0; i < detailsToggles.length; i++ ){
    detailsToggles[i].addEventListener( 'click', function(){
        var panel = this.nextElementSibling;

        panel.classList.toggle( 'show-details' );
    } );
}