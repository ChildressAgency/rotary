<?php 

/* Template Name: Members Template
 * Template Post Type: page
 */

get_header(); ?>

    <?php if( have_rows( 'members' ) ): ?>
        <div class="container">
            <div class="section">
                <div class="members">
                    <div class="members__row row">
                        <?php $i = 0; while( have_rows( 'members' ) ): the_row(); ?>
                            <?php if( $i != 0 && $i % 2 == 0 ): ?>
                                </div>
                                <div class="members__row row">
                            <?php endif; ?>

                            <div class="col-12 col-sm-6">
                                <div class="members__info">
                                    <h4 class="members__name"><?php the_sub_field( 'last_name' ); ?>, <?php the_sub_field( 'first_name' ); ?></h4>
                                    <?php if( have_rows( 'subtext' ) ): while( have_rows( 'subtext' ) ): the_row(); ?>
                                        <p class="members__text"><?php the_sub_field( 'subtext' ); ?></p>
                                    <?php endwhile; endif; ?>
                                    <a href="mailto:<?php the_sub_field( 'email' ); ?>" class="members__email"><i class="fas fa-envelope"></i> Email <?php the_sub_field( 'first_name' ); ?></a>
                                </div>
                            </div>
                        <?php $i++; endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'tp-flexible-content' ); ?>

<?php get_footer(); ?>