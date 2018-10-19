<?php 

/* Template Name: Documents Template
 * Template Post Type: page
 */

get_header(); ?>

    <div class="container">
        <div class="section">
            <?php if( have_rows( 'documents_section' ) ): while( have_rows( 'documents_section' ) ): the_row(); ?>
                <div class="documents">
                    <div class="documents__title">
                        <div class="documents__close"><i class="fas fa-minus"></i></div>
                        <h3><?php the_sub_field( 'section_title' ); ?></h3>
                    </div>
                    <div class="documents__grid-wrapper">
                        <div id="documents-grid" class="documents__grid">
                            <p class="documents__filename"><strong>File Name</strong></p>
                            <p class="documents__modified"><strong>Modified</strong></p>
                            <p class="documents__filesize"><strong>Size</strong></p>
                        
                            <div class="documents__underline"></div>
                        
                            <?php if( have_rows( 'documents' ) ): while( have_rows( 'documents' ) ): the_row(); ?>
                                <?php
                                $file = get_sub_field( 'file' );

                                $ext = pathinfo( $file['filename'], PATHINFO_EXTENSION );

                                $filesize = filesize( get_attached_file( $file['id'] ) );
                                $filesize = size_format( $filesize, 0 );
                                ?>
                                <?php if( $ext == 'docx' || $ext == 'doc' ): ?>
                                    <div class="documents__icon"><i class="far fa-file-word"></i></div>
                                <?php elseif( $ext == 'pdf' ): ?>
                                    <div class="documents__icon"><i class="far fa-file-pdf"></i></div>
                                <?php else: ?>
                                    <div class="documents__icon"><i class="far fa-file"></i></div>
                                <?php endif; ?>
                                <p class="documents__filename"><a href="<?php echo $file['url']; ?>"><?php echo $file['title'] . '.' . $ext; ?></a></p>
                                <p class="documents__modified"><?php echo $file['modified']; ?></p>
                                <p class="documents__filesize"><?php echo $filesize; ?></p>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>

    <?php get_template_part( 'tp-flexible-content' ); ?>

<?php get_footer(); ?>