$(document).ready(function(){
    $('#events-list').on( 'click', '.event__details-toggle', function(){
        $(this).siblings().toggleClass( 'show-details' );
    } );
});

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