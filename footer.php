	<footer class="footer">
        <div class="section container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <?php the_field( 'footer_section_left', 'option' ); ?>
                </div>
                <div class="col-12 col-md-4 side-borders">
                    <h3 class="footer__heading">Browse Our Site</h3>
                        <?php 
                        wp_nav_menu( array(
                            'theme_location'    =>  'footer_menu',
                            'menu_class'        =>  'col-12 col-sm-6 footer__menu',
                            'container_class'   =>  'row',
                            'walker'            =>  new Footer_Nav_Walker()
                        ) ); ?>
                </div>
                <div class="col-12 col-md-4">
                    <?php the_field( 'footer_section_right', 'option' ); ?>
                </div>
            </div>
            <div class="vert-spacer"></div>
            <div class="copyright">
                <?php the_field( 'copyright_text', 'option' ); ?>
            </div>
        </div>

        
    </footer>
	
	<?php wp_footer(); ?>
</body>
</html>