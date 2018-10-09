<?php 

$date = get_the_date();
$date = new DateTime( $date ); 

get_header(); ?>

    <main>
        <div class="container">
            <div class="single">
                <h2 class="single__title"><?php the_title(); ?></h2>
                <p class="single__date"><?php echo $date->format( 'F j, Y' ); ?></p>
            </div>

            <div class="section">
                <?php the_field( 'content' ); ?>
            </div>
        </div>
        <?php get_template_part( 'tp-flexible-content' ); ?>
    </main>

<?php get_footer(); ?>