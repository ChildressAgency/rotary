<?php

/*
 * Template Name: Stories Template
 * Template Post Type: page
 */

get_header(); ?>

    <main>
        <?php
        $args = array(
            'post_type'         => 'story',
            'orderby'           => 'date',
            'order'             => 'DESC',
        );
        $posts = new WP_Query( $args );
        $month = '';

        if( $posts->have_posts() ): ?>
            <div class="container">
                <div class="section">
                    <div class="stories">
                        <?php while( $posts->have_posts() ): $posts->the_post(); ?>
                            <div class="stories__story">
                                <div class="stories__content">
                                    <img class="stories__img" src="<?php the_field( 'featured_image' ); ?>">
                                    <h3 class="stories__title"><?php the_title(); ?></h3>
                                    <p><?php if( get_field( 'excerpt' ) ) the_field( 'excerpt' ); else echo mb_strimwidth( get_field( 'content' ), 0, 400, '...' ); ?></p>
                                    <a class="stories__readmore" href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <div id="append-stories"></div>
                    </div>
                </div>

                <?php if( $posts->max_num_pages > 1 ): ?>
                    <div class="view-more section">
                        <button id="view-more" class="btn btn-primary">View More</button>
                    </div>
                <?php endif; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <h2 class="text-center my-5"><strong>No Stories</strong></h4>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>