<?php get_header(); ?>

    <?php if( have_rows( 'learn_more' ) ): ?>
        <div class="section container-fluid">
            <div class="learn-more-wrapper">
                <?php while( have_rows( 'learn_more' ) ): the_row(); ?>
                    <div class="learn-more">
                        <h3 class="learn-more__heading"><?php the_sub_field( 'title' ); ?></h3>
                        <img class="learn-more__icon" src="<?php the_sub_field( 'icon' ); ?>" />
                        <p class="learn-more__text"><?php the_sub_field( 'text' ); ?></p>
                        <a class="btn btn-primary learn-more__btn" href="<?php the_sub_field( 'btn_link' ); ?>"><?php the_sub_field( 'btn_text' ); ?></a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'tp-flexible-content' ); ?>

<?php get_footer(); ?>