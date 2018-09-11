<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package ZipTip
	 * @since 1.0
	 * @version 1.0
	 */
?>

<?php get_header(); ?>
  <main id="main">
    <section class="content">
      <div class="container">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php if(!is_archive()): ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <article>
              <?php the_content(); ?>
            </article>
          <?php else: ?>
            <div class="blog-summary">
              <h2><?php the_title(); ?></h2>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="read-more">Read More...</a>
            </div>
          <?php endif; ?>
        <?php endwhile; endif; ?>
      </div>
    </section>
  </main>
<?php get_footer(); ?>