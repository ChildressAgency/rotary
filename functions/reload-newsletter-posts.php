<?php
/*
 * Reload newsletter posts using given date parameters
 */
function get_newsletter_posts(){
    check_ajax_referer( 'rotary-nonce', 'security' );
    global $post;

    // get the parameters
    $start_date = urldecode( $_POST['start_date'] );
    if( $start_date )
        $start_date = new DateTime( $start_date );
    
    $end_date = urldecode( $_POST['end_date'] );
    if( $end_date )
        $end_date = new DateTime( $end_date );
    
    $post_ID = urldecode( $_POST['post_ID'] );
    $search = urldecode( $_POST['search'] );

    $date_query = array();

    if( $start_date ){
        array_push( $date_query, array(
                'year'      => $start_date->format('Y'),
                'month'     => $start_date->format('m'),
                'day'       => $start_date->format('d'),
                'compare'   => '>='
            )
        );
    }

    if( $end_date ){
        array_push( $date_query, array(
                'year'      => $end_date->format('Y'),
                'month'     => $end_date->format('m'),
                'day'       => $end_date->format('d'),
                'compare'   => '<='
            )
        );
    }

    // the value to be returned
    $return = '';

    // construct the query
    $args = array(
        'post_type'         => 'newsletter',
        'post_status'       => 'publish',
        'posts_per_page'    => 5,
        'orderby'           => 'date',
        'order'             => 'DESC',
        's'                 => $search,
        'date_query'        => $date_query
    );
    $posts = new WP_Query( $args );
    $month = '';
    
    if( $posts->have_posts() ){
        while( $posts->have_posts() ){
            $posts->the_post();

            $date = get_the_date();
            $date = new DateTime( $date );
            $newMonth = $date->format( 'F' );
    
            if( $month != $newMonth ){
                $return .= '<h2 class="newsletters__month-heading">' . $newMonth . '</h2>';
            }
            else{
                $return .= '<hr />'; 
            }
    
            $return .= '<div class="newsletters">
                <div class="newsletters__summary">
                    <div class="newsletters__big-date">
                        <p>' . $date->format( 'd' ) . '</p>
                        <p>' . $date->format( 'D' ) . '</p>
                    </div>
                    <div class="newsletters__info">
                        <div class="newsletters__heading">
                            <div class="newsletters__title-date">
                                <h3 class="newsletters__title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                <p class="newsletters__date">' . $date->format( 'F j, Y' ) . '</p>
                            </div>
                        </div>
                    </div>
                </div>';

                $return .= '<div class="newsletters__excerpt">';
                    if( get_field( 'excerpt' ) ){
                        $return .= '<p>' . get_field( 'excerpt' ) . '</p>';
                    }
                    else{
                        $return .= '<p>' . mb_strimwidth( get_field( 'content' ), 0, 400, '...' ) . '</p>';
                    }
                    $return .= '<a href="' . get_the_permalink() . '">Read More</a>';
                $return .= '</div>';
            $return .= '</div>';

            if( $month != $newMonth )
                $month = $newMonth;

        }

        wp_reset_postdata();
        $return .= '<hr />';
    } else{
        $return .= '<h2 class="text-center my-5"><strong>No Results</strong></h4>';
    }

    echo $return;

    exit;
}
add_action( 'wp_ajax_get_newsletter_posts', 'get_newsletter_posts' );
add_action( 'wp_ajax_nopriv_get_newsletter_posts', 'get_newsletter_posts' );