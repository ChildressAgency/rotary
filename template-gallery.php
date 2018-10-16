<?php 

/* Template Name: Gallery Template
 * Template Post Type: page
 */

get_header(); ?>

    <div class="container">
        <div class="section">
            <div class="galleries">
                <?php if( have_rows( 'gallery' ) ): while( have_rows( 'gallery' ) ): the_row(); ?>
                    <div class="gallery">
                        <h3 class="gallery__title"><?php the_sub_field( 'gallery_title' ); ?></h3>
                        <div class="gallery__grid">
                            <?php if( have_rows( 'gallery_item' ) ): while( have_rows( 'gallery_item' ) ): the_row(); ?>
                                <div class="gallery__item">
                                    <img class="gallery__img" src="<?php the_sub_field( 'image' ); ?>">
                                    <div class="gallery__info">
                                        <div class="gallery__close"><i class="fas fa-times"></i></div>
                                        <?php if( get_sub_field( 'image_title' ) ): ?><h4 class="gallery__img-title"><?php the_sub_field( 'image_title' ); ?></h4><?php endif; ?>
                                        <p class="gallery__date"><?php the_sub_field( 'subtitle' ); ?></p>
                                        <?php the_sub_field( 'text' ); ?>
                                        <div class="gallery__underline"></div>
                                    </div>
                                </div>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>

    <?php get_template_part( 'tp-flexible-content' ); ?>

<?php get_footer(); ?>