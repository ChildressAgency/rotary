<div class="container">
    <div class="section <?php if( get_sub_field( 'is_dark' ) ) echo 'section--dark'; ?> <?php if( get_sub_field( 'is_thin' ) ) echo 'section--thin'; ?>">
        <?php the_sub_field( 'content' ); ?>
    </div>
</div>