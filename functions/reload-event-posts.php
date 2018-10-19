<?php
/*
 * Reload event posts using given date parameters
 */
function get_event_posts(){
    check_ajax_referer( 'rotary-nonce', 'security' );
    global $post;

    // get the parameters
    $start_date = urldecode( $_POST['start_date'] );
    if( $start_date ){
        $start_date = new DateTime( $start_date );
        $start_date = $start_date->format('Ymd');
    }
    $end_date = urldecode( $_POST['end_date'] );
    if( $end_date ){
        $end_date = new DateTime( $end_date );
        $end_date = $end_date->format('Ymd');
    }
    $post_ID = urldecode( $_POST['post_ID'] );
    $search = urldecode( $_POST['search'] );

    // if no start date is provided, use today
    if( !$start_date )
        $start_date = current_time('Ymd');

    $meta_query = array();

    if( $start_date ){
        array_push( $meta_query,  array(
                'key'           => 'date',
                'compare'       => '>=',
                'value'         => $start_date
            )
        );
    }

    if( $end_date ){
        array_push( $meta_query, array(
                'key'           => 'date',
                'compare'       => '<=',
                'value'         => $end_date
            )
        );
    }

    // the value to be returned
    $return = '';

    // construct the query
    $args = array(
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'category__in'      => get_field( 'category', $post_ID ),
        'posts_per_page'    => -1,
        'meta_key'          => 'date',
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC',
        's'                 => $search,
        'meta_query'        => $meta_query
    );
    $posts = new WP_Query( $args );
    $month = '';
    
    if( $posts->have_posts() ){
        while( $posts->have_posts() ){
            $posts->the_post();

            $date = get_field( 'date', false, false );
            $date = new DateTime( $date );
            $newMonth = $date->format( 'F' );
    
            if( $month != $newMonth ){
                $return .= '<h2 class="calendar__month-heading">' . $newMonth . '</h2>';
            }
            else{
                $return .= '<hr />'; 
            }
    
            $return .= '<div class="event">
                <div class="event__summary">
                    <div class="event__big-date">
                        <p>' . $date->format( 'd' ) . '</p>
                        <p>' . $date->format( 'D' ) . '</p>
                    </div>
                    <div class="event__info">
                        <div class="event__heading">
                            <div class="event__icon"><i class="far fa-calendar-alt"></i></div>
                            <div class="event__title-date">
                                <h3 class="event__title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                                <p class="event__date">' . $date->format( 'F d' ) . ' at ' . get_field( 'start_time' ) . ' to ' . get_field( 'end_time' ) . '</p>
                            </div>
                        </div>
                    </div>
                </div>';

                if( get_field( 'speaker' ) || get_field( 'topic' ) || get_field( 'location' ) ){
                    $return .= '<div class="event__details-wrapper">
                        <p id="event-details-toggle" class="event__details-toggle"><a>+ View Event Details</a></p>
                        <div id="event-details" class="event__details">';
                            if( get_field( 'speaker' ) ){ 
                                $return .= '<p class="event__detail-property"><strong>Speaker: </strong></p><p class="event__detail-value">' . get_field( 'speaker' ) . '</p>'; 
                            }
                            if( get_field( 'topic' ) ){ 
                                $return .= '<p class="event__detail-property"><strong>Topic: </strong></p><p class="event__detail-value">' . get_field( 'topic' ) . '</p>'; 
                            }
                            if( get_field( 'location' ) ){ 
                                $return .= '<p class="event__detail-property"><strong>Location: </strong></p><p class="event__detail-value">' . get_field( 'location' ) . '</p>'; 
                            }
                    $return .= '</div>
                    </div>';
                }
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
add_action( 'wp_ajax_get_event_posts', 'get_event_posts' );
add_action( 'wp_ajax_nopriv_get_event_posts', 'get_event_posts' );