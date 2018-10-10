<?php 

/* 
 * Template Name: Newsletters Template
 * Template Post Type: page
 */

get_header(); ?>

    <main id="main">
        <div class="container">
            <div class="calendar__search">
                <form class="searchform">
                    <label class="screen-reader-text sr-only" for="s">Search</label>
                    <input type="text" value="" placeholder="Search" name="s" id="search" onkeypress="return event.keyCode != 13;" />
                    <button class="searchform__submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="calendar__dates">
                <form action="">
                    <label>From</label>
                    <input id="start_date" type="date" class="calendar__datepicker"/>
                    <label>To</label>
                    <input id="end_date" type="date" class="calendar__datepicker"/>
                    <input id="post_ID" type="hidden" value="<?php echo get_the_ID(); ?>">
                    <input id="newsletter_search" type="submit" value="Go" class="btn btn-primary">
                </form>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">
                        <div id="events-list" class="events-list">
                            <?php
                            $month = '';
                            
                            if( have_posts() ):
                            ?>
                                <?php while( have_posts() ): the_post(); ?>
                                    <?php 
                                    $date = get_the_date();
                                    $date = new DateTime( $date );
                                    $newMonth = $date->format( 'F' );
                            
                                    if( $month != $newMonth ):
                                        ?>
                                        <h2 class="newsletters__month-heading"><?php echo $newMonth; ?></h2>
                                    <?php 
                                    else: 
                                        echo '<hr />'; 
                                    endif; ?>
                            
                                    <div class="newsletters">
                                        <div class="newsletters__summary">
                                            <div class="newsletters__big-date">
                                                <p><?php echo $date->format( 'd' ); ?></p>
                                                <p><?php echo $date->format( 'D' ); ?></p>
                                            </div>
                                            <div class="newsletters__info">
                                                <div class="newsletters__heading">
                                                    <div class="newsletters__title-date">
                                                        <h3 class="newsletters__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                        <p class="newsletters__date"><?php echo $date->format( 'F j, Y' ); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="newsletters__excerpt">
                                            <?php if( get_field( 'excerpt' ) ): ?>
                                                <p><?php the_field( 'excerpt' ); ?></p>
                                            <?php else: ?>
                                                <p><?php echo mb_strimwidth( get_field( 'content' ), 0, 400, '...' ); ?></p>
                                            <?php endif; ?>
                                            <a href="<?php the_permalink(); ?>">Read More</a>
                                        </div>
                                    </div>
                            
                                    <?php 
                                    if( $month != $newMonth )
                                        $month = $newMonth;
                                    ?>
                                <?php endwhile; wp_reset_postdata(); ?>
                                <hr />
                            <?php else: ?>
                                <h2 class="text-center my-5"><strong>No Newsletters</strong></h4>
                            <?php endif; ?>
                        </div>
                    </div>
                    <aside class="col-3">
                        <h3 class="sidebar__heading">Newsletter Archive</h3>
                        <ul class="sidebar__list">
                            <?php wp_get_archives( 'post_type=newsletter&type=monthly&limit=15&show_post_count=1' ); ?>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </main>

<?php get_footer(); ?>