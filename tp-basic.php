<div <?php if( get_sub_field( 'is_dark' ) ) echo 'class="section--dark"'; ?>>
    <div class="container">
        <div class="section <?php if( get_sub_field( 'is_thin' ) ) echo 'section--thin'; ?>">
            <?php the_sub_field( 'content' ); ?>
        </div>
    </div>
</div>