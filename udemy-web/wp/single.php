<?php get_header(); ?>

<div id="single_maincontainer">
  <div id="left"><?php get_sidebar(); ?></div>
  <div id="right">
      <?php 
      if (have_posts()):
        while(have_posts()) :
          the_post();
      ?>
      <article>
        <section>
          <h1><?php the_title(); ?></h1>
          <div class="content">
            <?php the_content(); ?>
          </div>
        </section>
        <nav class="postNave">
          <span><?php previous_post_link() ?></span>
          <span><?php next_post_link() ?></span>
        </nav>
      </article>
      <?php 
        endwhile; 
      endif;
      ?>

  </div>
</div><!-- #single_maincontainer -->

<?php get_footer(); ?>
