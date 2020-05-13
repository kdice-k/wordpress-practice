<?php category_add_icon(); ?>
<style>
div#d4_category {
  width: 290px;
  height: auto;
  background-color: #fff;
  display: block;
  /* margin-left: 47px; */
  padding-bottom: 32px;
  margin-bottom: 30px;
}

div#d4_category li {
  list-style: none;
}

div#d4_category li a {
  text-decoration: none;
}

div#d4_category .category-title {
  font-size: 17px;
  font-weight: bold;
  color: #fff;
  height: 42px;
  line-height: 42px;
  padding-left: 54px;
  margin-bottom: 19px;
  background: url(<?php d4_EchoImageUri(); ?>/fold.png) #ff9966 no-repeat 23px center;
}

div#d4_category .cat-item {
  font-size: 17px;
  font-weight: bold;
  color: #000;
  padding-left: 48px;
  margin-bottom: 18px;
  /* trasition */
  transition: all 0.2s ease-in-out 0s;
}

ul.children li a {
  font-size: 15px;
  font-weight: normal;
  color: #999999;
  text-decoration: none;
  padding-left: 14px;

  /* trasition */
  transition: all 0.2s ease-in-out 0s;
}


</style>

<div id="d4_category">
<?php

wp_list_categories([
      'show_option_all'    => '', // トップページへのリンク
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
      'title_li'           => '<h2 class="category-title">'.__( 'Categories' ).'</h2>',
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
