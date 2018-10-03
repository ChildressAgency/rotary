<div class="section <?php if( get_sub_field( 'is_dark' ) ) echo 'section--dark'; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <?php the_sub_field( 'left-content' ); ?>
            </div>
            <div class="col-12 col-md-6">
                <?php the_sub_field( 'right-content' ); ?>
            </div>
        </div>
    </div>
</div>