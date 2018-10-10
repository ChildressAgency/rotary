<?php

/*
 * Template Name: Speaker Template
 * Template Post Type: post
 */

get_header(); ?>

    <main>
        <div class="container">
            <h2 class="speaker-title"><?php the_title(); ?></h2>
        </div>
        <?php get_template_part( 'tp-flexible-content' ); ?>
    </main>

<?php get_footer(); ?>