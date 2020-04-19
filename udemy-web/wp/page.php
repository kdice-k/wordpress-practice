<?php get_header(); ?>
<div id="main_wrapper">
  <?php

  // 空白はデフォルトが設定されるようだ
  // $postHtml = '';
  // $postHtml = '<li><a href="{url}">{text_title}</a></li>';
  $postHtml = '
  <li>
    <dl>
      <dt>
        <img src="{thumb_url}" alt="ランキング画像01">
        <div class="thumb_img"></div>
      </dt>
      <dd>
        <h3><a href="#">{title}</a></h3>
        <span class="ranking_tag webdesign">ウェブデザイン</span>
      </dd>
    </dl>
  </li>';

  $prm = [
    'header' => '人気記事ランキング',
    'header_start' => '<div id="pop_rank_list"><h2 class="wpp_pop_rank">',
    'header_end' => '</h2></div>',
    'limit' => 4,
    'thumbnail_width' => 89,  // 設定(admin)でサムネイルをON 且つ、サイズを設定で出力される
    'thumbnail_height' => 55,

    'range' => 'all',

    'title_length' => 15,
    'title_by_words' => 0, // 0でtitle_length数に丸める

    'stats_views' => 0, // 表示数の表示ON/OFF
    'stats_author' => 0, // 記事の投稿者の表示 ON/OFF

    // 'wpp_start' => '',
    // 'wpp_end' => '',

    'post_html' => $postHtml,

  ];
  wpp_get_mostpopular($prm);
  ?>

  <?php 
    if( have_posts() ):
      while(have_posts()):
        the_post();
        the_content();
  ?>



  <?php
      endwhile;
    endif;
  ?>
</div>
<?php get_footer(); ?>