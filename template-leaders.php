<?php 

/* Template Name: Leaders Template 
 * Post Type: page
 */

get_header(); ?>

    <main id="main">
        <?php if( have_rows( 'people' ) ): ?>
            <div class="container">
                <div class="section">
                    <div class="people">
                        <div class="people__row row">
                            <?php $i = 0; while( have_rows( 'people' ) ): the_row(); ?>
                                <?php if( $i != 0 && $i % 2 == 0 ): ?>
                                    </div>
                                    <div class="people__row row">
                                <?php endif; ?>

                                <div class="col-12 col-sm-6">
                                    <img class="people__img" src="<?php the_sub_field( 'image' ); ?>">
                                    <div class="people__info">
                                        <h4 class="people__name"><?php the_sub_field( 'first_name' ); ?> <?php the_sub_field( 'last_name' ); ?></h4>
                                        <p class="people__title"><?php the_sub_field( 'title' ); ?></p>
                                        <a href="mailto:<?php the_sub_field( 'email_address' ); ?>" class="people__email"><i class="fas fa-envelope"></i> Email <?php the_sub_field( 'first_name' ); ?></a>
                                    </div>
                                </div>
                            <?php $i++; endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php get_template_part( 'tp-flexible-content' ); ?>
    </main>

<?php get_footer(); ?>