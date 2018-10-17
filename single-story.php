<?php 

$date = get_the_date();
$date = new DateTime( $date ); 

get_header(); ?>
Password1
    <main>
        <div class="container">
            <div class="single-story">
                <h2 class="single-story__title"><?php the_title(); ?></h2>
                <p class="single-story__date"><?php echo $date->format( 'F j, Y' ); ?></p>
            </div>

            <?php if( get_field( 'featured_image' ) ): ?><img class="stories__img" src="<?php the_field( 'featured_image' ); ?>"><?php endif; ?>

            <div class="section">
                <?php the_field( 'content' ); ?>
            </div>
        </div>
        <?php get_template_part( 'tp-flexible-content' ); ?>
    </main>

<?php get_footer(); ?>