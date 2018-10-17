<div class="container">
    <div class="row">
        <div class="fourwaytest">
            <?php if( have_rows( 'block' ) ): $i = 1; while( have_rows( 'block' ) ): the_row(); ?>
                <div class="fourwaytest__block">
                    <h3 class="fourwaytest__number"><?php echo $i; ?></h3>
                    <h4 class="fourwaytest__heading">
                        <?php the_sub_field( 'heading' ); ?><span><?php the_sub_field( 'heading_big' ); ?></span>
                    </h4>
                    <img class="fourwaytest__icon" src="<?php the_sub_field( 'icon' ); ?>">
                    <p><?php the_sub_field( 'text' ); ?></p>
                    <p><strong><em><?php the_sub_field( 'question' ); ?></em></strong></p>
                </div>
            <?php $i++; endwhile; endif; ?>
        </div>
    </div>
</div>