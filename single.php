<?php get_header(); ?>

    <main>
        <div class="container">
            <div class="single">
                <h2 class="single__title"><?php the_title(); ?></h2>
                <div class="single__details">
                    <?php if( get_field( 'date' ) ): ?><p><strong>Date: </strong></p><p><?php echo date_format( new DateTime(get_field( 'date' )), 'F j, Y' ); ?><?php if( get_field( 'start_time' ) ) echo ' at ' . get_field( 'start_time' ); ?><?php if( get_field( 'end_time' ) ) echo ' to ' . get_field( 'end_time' ); ?></p><?php endif; ?>
                    <?php if( get_field( 'speaker' ) ): ?><p><strong>Speaker: </strong></p><p><?php the_field( 'speaker' ); ?></p><?php endif; ?>
                    <?php if( get_field( 'topic' ) ): ?><p><strong>Topic: </strong></p><p><?php the_field( 'topic' ); ?></p><?php endif; ?>
                    <?php if( get_field( 'location' ) ): ?><p><strong>Location: </strong></p><p><?php the_field( 'location' ); ?></p><?php endif; ?>
                </div>
            </div>
        </div>
        <?php get_template_part( 'tp-flexible-content' ); ?>
    </main>

<?php get_footer(); ?>