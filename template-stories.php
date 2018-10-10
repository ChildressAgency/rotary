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
            'posts_per_page'    => -1,
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
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>