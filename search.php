<?php get_header(); ?>
    <main id="main">
        <section class="content">
            <div class="container">
                <div class="section">
                    <div class="page-heading">
                        <img src="http://dev.childressagency.com/rotary/wp-content/uploads/2018/10/wheel.png" alt="logo" class="page-heading__logo">
                        <div class="page-heading__heading">
                            <h2 class="page-heading__title">Search Results</h2>
                        </div>
                    </div>
                </div>
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <h2 class="page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <article>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; endif; ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>