<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/cate_test.css">
  <script src="https://kit.fontawesome.com/ad68787c9e.js" crossorigin="anonymous"></script>
 <?php
          setPostViews(get_the_ID());
  ?>

  <!-- スタイル(css)を出力する -->
  <?php category_add_icon(); ?>

</head>
<body>
  <h1>single.php</h1>
  <h2>カテゴリ一覧を表示する</h2>
  <div id="categori-list">
  <?php
    // デフォルト値
    // $args = array(
    //   'show_option_all'    => '',
    //   'orderby'            => 'name',
    //   'order'              => 'ASC',
    //   'style'              => 'list',
    //   'show_count'         => 0,
    //   'hide_empty'         => 1,
    //   'use_desc_for_title' => 1,
    //   'child_of'           => 0,
    //   'feed'               => '',
    //   'feed_type'          => '',
    //   'feed_image'         => '',
    //   'exclude'            => '',
    //   'exclude_tree'       => '',
    //   'include'            => '',
    //   'hierarchical'       => 1,
    //   'title_li'           => __( 'Categories' ),
    //   'show_option_none'   => __( '' ),
    //   'number'             => null,
    //   'echo'               => 1,
    //   'depth'              => 0,
    //   'current_category'   => 0,
    //   'pad_counts'         => 0,
    //   'taxonomy'           => 'category',
    //   'walker'             => null
    // );

    wp_list_categories([
      'show_option_all'    => 'HOME', // トップページへのリンク
      'orderby'            => 'name',
      'order'              => 'ASC',
      'style'              => 'list', // 構造 list or none
      'show_count'         => false,   // 投稿数 0(false) 1(true)
      'hide_empty'         => 0,      // 投稿のないカテゴリーを非表示にするか 0(false):全て表示 
      'use_desc_for_title' => 1,      // カテゴリの説明をアンカー(<a>)のtitleに挿入
      'child_of'           => 0,      // カテゴリー ID の子カテゴリーのみ表示 hide_empty パラメータに false がセットされる
      'feed'               => '',
      'feed_type'          => '',
      'feed_image'         => '',
      'exclude'            => '',
      'exclude_tree'       => '',
      'include'            => '',
      'hierarchical'       => 1,
      'title_li'           => '<h2>'.__( 'Categories' ).'</h2>',
      'show_option_none'   => __( '' ),
      'number'             => null,
      'echo'               => 1,
      'depth'              => 2,
      'current_category'   => 0,
      'pad_counts'         => 0,
      'taxonomy'           => 'category',
      'walker'             => null
    ]);
  ?>
  </div>

  <a href="<?php bloginfo( 'url' ); ?>">戻る- HOME</a>

  <?php
  // カテゴリリストを出力する
  d4_categoryList(
    [
      'start_tag' => "<div class='category_list'>",
      'end_tag' => "</div>",
      'title' => 'カテゴリリスト',
      'title_stag' => '<h3>',
      'title_etag' => '</h3>',
      'level' => 2,
    ]);
  ?>

</body>
</html>