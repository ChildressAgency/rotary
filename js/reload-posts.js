$(document).ready(function(){
    $('#date_search').click(function( e ){
        e.preventDefault();

        $start_date = $('#start_date').val();
        $end_date = $('#end_date').val();
        $post_ID = $('#post_ID').val();
        $search = $('#search').val();

        $.ajax({
            type: 'POST',  
            url: ajaxParams.ajaxurl,
            data: 
            {  
                action: 'get_event_posts',
                security: ajaxParams.nonce,
                start_date: $start_date,
                end_date: $end_date,
                post_ID: $post_ID,
                search: $search
            },
            success: function(data, textStatus, XMLHttpRequest)
            {  
                $('#events-list').html(data);
            },  
            error: function(MLHttpRequest, textStatus, errorThrown)
            {  
                alert(errorThrown);
            }
        });
    });
});

