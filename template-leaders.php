<?php 

/* Template Name: Leaders Template 
 * Post Type: page
 */

get_header(); ?>

    <main id="main">
        <?php if( have_rows( 'leaders' ) ): ?>
            <div class="container">
                <div class="section">
                    <div class="leaders">
                        <div class="leaders__row row">
                            <?php $i = 0; while( have_rows( 'leaders' ) ): the_row(); ?>
                                <?php if( $i != 0 && $i % 2 == 0 ): ?>
                                    </div>
                                    <div class="leaders__row row">
                                <?php endif; ?>

                                <div class="col-12 col-sm-6">
                                    <img class="leaders__img" src="<?php the_sub_field( 'image' ); ?>">
                                    <div class="leaders__info">
                                        <h4 class="leaders__name"><?php the_sub_field( 'first_name' ); ?> <?php the_sub_field( 'last_name' ); ?></h4>
                                        <p class="leaders__title"><?php the_sub_field( 'title' ); ?></p>
                                        <a href="mailto:<?php the_sub_field( 'email_address' ); ?>" class="leaders__email"><i class="fas fa-envelope"></i> Email <?php the_sub_field( 'first_name' ); ?></a>
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