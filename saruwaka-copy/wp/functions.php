<?php

function d4_setup(){
  global $d4_uri;
  global $d4_image_uri;
  global $d4_term_image_tbl;

  $d4_uri = get_template_directory_uri();
  $d4_image_uri = $d4_uri . "/images";
  $d4_term_image_tbl = 'wp_test_d4_term_image';
}
add_action('after_setup_theme', 'd4_setup');

function d4_getUri() {
  return $GLOBALS['d4_uri'];
}

function d4_getImageUri(){
  return $GLOBALS['d4_image_uri'];
}

function d4_EchoUri() {
  echo d4_getUri();
}

function d4_EchoImageUri() {
  echo d4_getImageUri();
}

/**
 * 記事毎のアクセス数をカウントする
 * メタを利用する
 */
function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0 View";
  }
  return $count.' Views';
}

function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 

// Add to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}

function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

/**
 * データベースを試す wpdb
 */

 function d4TestWriteCategory () {
   echo 'd4TestWriteCategory() in funtctions.php'."\n";

   // 古いVer2.0迄
  //  global $table_prefix;
   
  global $wpdb;

   var_dump($wpdb->posts);

   $results = $wpdb->get_results( "SELECT post_title, post_status FROM {$wpdb->prefix}posts", OBJECT );

  //  var_dump($results);
  $tableName = "{$wpdb->prefix}terms";
  $sqlPrepare = $wpdb->prepare("select * from `{$tableName}`");
  var_dump($sqlPrepare);
  $resTerm = $wpdb->get_results($sqlPrepare, OBJECT);
  var_dump($resTerm);

}

/**
 * カテゴリを出力する
 */
function printCategoryFromDB() {
  global $wpdb;
  $sqlPre = $wpdb->prepare("select term_id, taxonomy, description from `{$wpdb->term_taxonomy}` where taxonomy = 'category';");
  // var_dump($sqlPre);
  // var_dump($wpdb->get_results($sqlPre, OBJECT));
}

/**
 * [カテゴリリストを出力する]
 * 組み込み関数を利用
 * ul li
 */
function outputCategoryList($parentID, $level = 1, $nowLevel = 1) {

  $cates = get_categories( ['hide_empty' => 0, 'parent' => $parentID] );

  // カテゴリが存在しない場合は処理を抜ける
  if(is_null($cates)){
    return 0;
  }

  echo '<ul>';
  foreach($cates as $cate){
    $category_link = sprintf( 
      '<a href="%1$s" alt="%2$s">%3$s</a>',
        esc_url( get_category_link( $cate->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $cate->name )),
        esc_html( $cate->name )
    );

    $catelist = sprintf('<li class="cat-list cat-level-%1$d cat-item-%2$d">',
      $nowLevel, $cate->term_id
    );
    $catelist .= $category_link;
    $catelist .= '</li>';
    echo $catelist;

    if($level > $nowLevel){
      outputCategoryList($cate->term_id, $level, $nowLevel + 1);
    }
  }
  echo '</ul>';
}

/**
 * タグの指定可能なカテゴリリスト出力
 * 
 */
function d4_categoryList($options = ['level' => 1], $parent_id = 0){

  // タグ出力
  echo $options['start_tag'];
  echo $options['title_stag'].$options['title'].$options['title_etag'];

  // リスト出力
  outputCategoryList($parent_id, $options['level']);

  echo $options['end_tag'];
}

// スタイル生成用PHPの読み込み
require_once(dirname(__FILE__).'/php_style_test.php');