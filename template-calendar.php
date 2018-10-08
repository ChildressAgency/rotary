<?php 

/* 
 * Template Name: Calendar Template
 * Post Type: page
 */

get_header(); ?>

    <main id="main">
        <div class="container">
            <div class="calendar__search">
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url() ); ?>">
                    <label class="screen-reader-text sr-only" for="s">Search</label>
                    <input type="text" value="" placeholder="Search" name="s" id="s" />
                    <button class="searchform__submit" type="submit" id="searchsubmit" value="Search" ><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="calendar__dates">
                <form action="">
                    <label>From</label>
                    <input type="date" class="calendar__datepicker"/>
                    <label>To</label>
                    <input type="date" class="calendar__datepicker"/>
                    <input type="submit" value="Go" class="btn btn-primary">
                </form>
            </div>

            <?php
            $args = array(
                'post_type'         => 'post',
                'post_status'       => 'publish',
                'category__in'      => get_field( 'category' ),
                'posts_per_page'    => -1,
                'meta_key'          => 'date',
                'orderby'           => 'meta_value_num',
                'order'             => 'ASC'
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
                        <div class="event__details-wrapper">
                            <p id="event-details-toggle" class="event__details-toggle"><a>+ View Event Details</a></p>
                            <div id="event-details" class="event__details">
                                <p class="event__detail-property"><strong>Speaker: </strong></p><p class="event__detail-value"><?php the_field( 'speaker' ); ?></p>
                                <p class="event__detail-property"><strong>Topic: </strong></p><p class="event__detail-value"><?php the_field( 'topic' ); ?></p>
                                <p class="event__detail-property"><strong>Location: </strong></p><p class="event__detail-value"><?php the_field( 'location' ); ?></p>
                            </div>
                        </div>
                    </div>

                    <?php 
                    if( $month != $newMonth )
                        $month = $newMonth;

                    if( !get_next_post() )
                        echo '<hr />';
                    ?>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else: ?>
                <h2 class="text-center my-5"><strong>No Upcoming Committee Meetings</strong></h4>
            <?php endif; ?>
        </div>
    </main>

<?php get_footer(); ?>