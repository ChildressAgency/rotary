<?php
function story_view_more(){

    $paged = $_POST['page'] + 1; // next page to be loaded

    $args = array(
        'post_type'         => 'story',
        'orderby'           => 'date',
        'order'             => 'DESC',
        'paged'             => $paged,
    );

    $posts = new WP_Query( $args );
 
    if( $posts->have_posts() ) :
        $return = '';

        while( $posts->have_posts() ): $posts->the_post();
            $return .= '<div class="stories__story">
                <div class="stories__content">
                    <img class="stories__img" src="' . get_field( 'featured_image' ) . '">
                    <h3 class="stories__title">' . get_the_title() . '</h3>
                    <p>';
            if( get_field( 'excerpt' ) )
                $return .= get_field( 'excerpt' );
            else
                $return .= mb_strimwidth( get_field( 'content' ), 0, 400, '...' );
            $return .= '</p>
                    <a class="stories__readmore" href="' . get_the_permalink() . '">Read More</a>
                </div>
            </div>';
        endwhile;
    endif;

    echo $return;

    exit;
}
add_action('wp_ajax_story_view_more', 'story_view_more');
add_action('wp_ajax_nopriv_story_view_more', 'story_view_more');