<div class="container">
    <div class="section <?php if( get_sub_field( 'is_dark' ) ) echo 'section--dark'; ?>">
        <div class="row">
            <div class="col-12 col-md-6 order-md-last">
                <img class="mb-5 aligncenter" src="<?php the_sub_field( 'image' ); ?>" />
            </div>
            <div class="col-12 col-md-6">
                <?php the_sub_field( 'content' ); ?>
            </div>
        </div>
    </div>
</div>