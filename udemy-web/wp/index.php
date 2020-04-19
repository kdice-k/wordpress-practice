<!-- カテゴリor月別アーカイブ -->
<?php get_header(); ?>

<div id="single_maincontainer">
  <div id="left"><?php get_sidebar(); ?></div>
  <div id="right">
  <?php
    get_template_part( "loop", "main" );
  ?>
  </div>
</div><!-- #single_maincontainer -->

<?php get_footer(); ?>