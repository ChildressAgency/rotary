<div class="section <?php if( get_sub_field( 'is_dark' ) ) echo 'section--dark'; ?>">
    <div class="container">
        <div class="mismatched-columns">
            <div class="mismatched-columns__wide">
                <?php the_sub_field( 'content_1' ); ?>
            </div>
            <div class="mismatched-columns__thin text-center">
                <div class="center-content">
                    <div class="side-borders">
                        <?php the_sub_field( 'content_2' ); ?>
                    </div>
                </div>
            </div>

            <div class="mismatched-columns__thin">
                <?php the_sub_field( 'content_3' ); ?>
            </div>
            <div class="mismatched-columns__wide">
                <?php the_sub_field( 'content_4' ); ?>
            </div>
        </div>
    </div>
</div>