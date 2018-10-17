<?php 

/* 
 * Template Name: 20 Reasons Template
 * Template Post Type: page
 */

get_header(); ?>

    <main>
        <div class="container">
            <div class="section">
                <div class="twentyreasons">
                    <?php if( have_rows( 'reasons' ) ): $i = 1; while( have_rows( 'reasons' ) ): the_row(); ?>
                        <div class="twentyreasons__reason">
                            <div class="twentyreasons__number"><?php echo $i; ?></div>
                            <div class="twentyreasons__description">
                                <h3 class="twentyreasons__heading"><?php the_sub_field( 'heading' ); ?></h3>
                                <p class="twentyreasons__text"><?php the_sub_field( 'text' ); ?></p>
                                <hr />
                            </div>
                        </div>
                    <?php $i++; endwhile; endif; ?>
                </div>
            </div>
        </div>

        <?php get_template_part( 'tp-flexible-content' ); ?>
    </main>

<?php get_footer(); ?>