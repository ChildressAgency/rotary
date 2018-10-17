<div <?php if( get_sub_field( 'is_dark' ) ) echo 'class="section--dark"'; ?>>
    <div class="container">
        <div class="section">
            <div class="objectivelist <?php if( get_sub_field( 'is_thin' ) ) echo 'section--thin'; ?>">
                <?php if( have_rows( 'objectives' ) ): while( have_rows( 'objectives' ) ): the_row(); ?>
                    <div class="objectivelist__number">
                        <p><strong><?php the_sub_field( 'number' ); ?></strong></p>
                    </div>
                    <div class="objectivelist__text">
                        <p><?php the_sub_field( 'text' ); ?></p>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>