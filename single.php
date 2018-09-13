<?php get_header(); ?>
  <main id="main">
    <section class="content">
      <div class="container">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <h1 class="page-title"><?php the_title(); ?></h1>
          <article>
            <?php the_content(); ?>
          </article>
        <?php endwhile; endif; ?>
      </div>
    </section>
  </main>
<?php get_footer(); ?>