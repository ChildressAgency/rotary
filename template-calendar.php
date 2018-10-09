<?php 

/* 
 * Template Name: Calendar Template
 * Post Type: page
 */

get_header(); ?>

    <main id="main">
        <div class="container">
            <div class="calendar__search">
                <form class="searchform">
                    <label class="screen-reader-text sr-only" for="s">Search</label>
                    <input type="text" value="" placeholder="Search" name="s" id="search" onkeypress="return event.keyCode != 13;" />
                    <div class="searchform__submit"><i class="fas fa-search"></i></div>
                </form>
            </div>

            <div class="calendar__dates">
                <form action="">
                    <label>From</label>
                    <input id="start_date" type="date" class="calendar__datepicker"/>
                    <label>To</label>
                    <input id="end_date" type="date" class="calendar__datepicker"/>
                    <input id="post_ID" type="hidden" value="<?php echo get_the_ID(); ?>">
                    <input id="date_search" type="submit" value="Go" class="btn btn-primary">
                </form>
            </div>

            <div id="events-list" class="events-list">
                <?php
                $today = current_time('Ymd');
                $args = array(
                    'post_type'         => 'post',
                    'post_status'       => 'publish',
                    'category__in'      => get_field( 'category' ),
                    'posts_per_page'    => -1,
                    'meta_key'          => 'date',
                    'orderby'           => 'meta_value_num',
                    'order'             => 'ASC',
                    'meta_query'        => array(
                        array(
                            'key'           => 'date',
                            'compare'       => '>=',
                            'value'         => $today
                        ),
                    ),
                );
                $posts = new WP_Query( $args );
                $month = '';
                
                if( $posts->have_posts() ):
                ?>
                    <?php while( $posts->have_posts() ): $posts->the_post(); ?>
                        <?php 
                        $date = get_field( 'date', false, false );
                        $date = new DateTime( $date );
                        $newMonth = $date->format( 'F' );
                
                        if( $month != $newMonth ):
                            ?>
                            <h2 class="calendar__month-heading"><?php echo $newMonth; ?></h2>
                        <?php 
                        else: 
                            echo '<hr />'; 
                        endif; ?>
                
                        <div class="event">
                            <div class="event__summary">
                                <div class="event__big-date">
                                    <p><?php echo $date->format( 'd' ); ?></p>
                                    <p><?php echo $date->format( 'D' ); ?></p>
                                </div>
                                <div class="event__info">
                                    <div class="event__heading">
                                        <div class="event__icon"><i class="far fa-calendar-alt"></i></div>
                                        <div class="event__title-date">
                                            <h3 class="event__title"><?php the_title(); ?></h3>
                                            <p class="event__date"><?php echo $date->format( 'F d' ); ?> at <?php the_field( 'start_time' ); ?> to <?php the_field( 'end_time' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if( get_field( 'speaker' ) || get_field( 'topic' ) || get_field( 'location' ) ): ?>
                                <div class="event__details-wrapper">
                                    <p id="event-details-toggle" class="event__details-toggle"><a>+ View Event Details</a></p>
                                    <div id="event-details" class="event__details">
                                        <?php if( get_field( 'speaker' ) ): ?><p class="event__detail-property"><strong>Speaker: </strong></p><p class="event__detail-value"><?php the_field( 'speaker' ); ?></p><?php endif; ?>
                                        <?php if( get_field( 'topic' ) ): ?><p class="event__detail-property"><strong>Topic: </strong></p><p class="event__detail-value"><?php the_field( 'topic' ); ?></p><?php endif; ?>
                                        <?php if( get_field( 'location' ) ): ?><p class="event__detail-property"><strong>Location: </strong></p><p class="event__detail-value"><?php the_field( 'location' ); ?></p><?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                
                        <?php 
                        if( $month != $newMonth )
                            $month = $newMonth;
                        ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <hr />
                <?php else: ?>
                    <h2 class="text-center my-5"><strong>No Upcoming Committee Meetings</strong></h4>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>