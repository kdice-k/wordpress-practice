<?php

function category_add_icon() {
  global $d4_term_image_tbl;

  mb_http_output('utf-8');
  echo '<style type="text/css">';

  // カテゴリ数ループしてスタイルを生成する
  global $wpdb;
  $sqlPre = $wpdb->prepare("select * from `{$d4_term_image_tbl}`;");
  $cursor = $wpdb->get_results($sqlPre, OBJECT);

  // カテゴリの分だけループしてスタイルを出力する
  foreach($cursor as $rec) {
    echo<<<EOF
    .cat-item-$rec->term_id a:first-child::before {
      font-family: "$rec->fa_font"; 
      font-weight: $rec->fa_weight; 
      content: "\\$rec->fa_content";
      font-size: 17px;
      margin-right: 10px;
    }
    EOF;
  }

  echo '</style>';
}
