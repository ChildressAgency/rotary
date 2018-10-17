function resizeGridItem(item){
    grid = document.getElementsByClassName("stories")[0];
    rowHeight = parseInt(window.getComputedStyle( grid ).getPropertyValue('grid-auto-rows'));
    rowGap = parseInt(window.getComputedStyle( grid ).getPropertyValue('grid-row-gap'));
    rowSpan = Math.ceil((item.querySelector('.stories__content').getBoundingClientRect().height+rowGap)/(rowHeight+rowGap));
    item.style.gridRowEnd = "span "+rowSpan;
}

function resizeAllGridItems(){
   allItems = document.getElementsByClassName("stories__story");
   for( x = 0; x < allItems.length; x++ ){
      resizeGridItem( allItems[x] );
   }
}

window.onload = resizeAllGridItems();
window.addEventListener("resize", resizeAllGridItems);



jQuery(function($){
    $('#view-more').click(function(){
 
        var button = $(this),
            data = {
            'action': 'story_view_more',
            'query': storyParams.posts,
            'page' : storyParams.current_page
        };
 
        $.ajax({
            url : ajaxParams.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success : function( data ){
                if( data ) { 
                    button.text( 'View More' ); // insert new posts
                    $('#append-stories').before(data);
                    storyParams.current_page++;
 
                    if ( storyParams.current_page >= storyParams.max_page )
                        button.remove(); // if last page, remove the button

                    resizeAllGridItems();
                    setTimeout( function(){
                        resizeAllGridItems();
                    }, 500 );
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            },
            error: function(MLHttpRequest, textStatus, errorThrown)
            {  
                alert(errorThrown);
            }
        });
    });
});