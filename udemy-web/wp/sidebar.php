<div id="top_left">
  <div id="top_category">
    <h3>CATEGORY</h3>
    <ul>
      <li><a href="#">すべてのカテゴリー</a></li>
      <?php 
      $args = [
        'title_li' => '',
        'show_count' => false,
        'hide_empty' => false
      ];
      wp_list_categories( $args );
      ?>
    </ul>
  </div>
  <div id="archives">
    <h3>月別アーカイブ</h3>
    <ul>
      <?php 
      $args = [
        'type' => 'monthly',
        'show_post_count' => true,
      ];
      wp_get_archives( $args );
      ?>
    </ul>
  </div>
  <div id="top_ad">
    <img src="<?php echo get_template_directory_uri(); ?>/images/add.jpg" alt="ここに広告を挿入">
  </div>
</div>
