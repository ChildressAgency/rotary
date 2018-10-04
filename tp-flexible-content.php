<?php

// check if the flexible content field has rows of data
if( have_rows('custom_fields') ):

     // loop through the rows of data
    while ( have_rows('custom_fields') ) : the_row();

        if( get_row_layout() == 'basic' ):
            get_template_part( 'tp-basic' );

        elseif( get_row_layout() == '2_col' ):
            get_template_part( 'tp-2-col' );

        elseif( get_row_layout() == '2_col_img_right' ):
            get_template_part( 'tp-2-col-img-right' );

        elseif( get_row_layout() == 'mismatched_columns' ):
            get_template_part( 'tp-mismatched-columns' );

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>