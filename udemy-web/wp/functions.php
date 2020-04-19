<?php
/**アイキャッチを使用可能にする */
add_theme_support("post-thumbnails");

/**カスタムメニューを使用可能にする */
add_theme_support("menus");

function custom_excerpt_length( $length ) {
  return 55;	
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * テンプレートパーツに変数を渡す関数
 * https://www.tabosque.com/tech/220 より
 * 
 * exp)
 * $var_array = array('apple'=>'りんご', 'banana'=>'バナナ');
 * get_template_part_with_var_array('template-part', $var_array);
 */
function get_template_part_with_var_array($template_name, $var_array=null){
  if (isset($var_array)) {
    while (list($key, $val) = each($var_array)) {
      set_query_var($key, $val);
    }
  }
  get_template_part($template_name);
}

// Ajax ヘッダにフックする
function add_my_ajaxurl() {
  ?>
      <script>
          var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
      </script>
  <?php
}
add_action( 'wp_head', 'add_my_ajaxurl', 1 );

function view_sitename(){
  $name = $_POST['name'];//ポストで受け取れる

  $html = '';
  $to = 'renraku@tmick.net';
  $title = 'メール送信テスト from PHP';
  $content = $name;

  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  if(mb_send_mail($to, $title, $content)){
    $html = "メールを送信しました";
  } else {
    $html = "メールの送信に失敗しました";
  }

  //指定されたデータタイプに応じたヘッダーを出力する
  header('Content-type: application/json');

  echo json_encode( $html );  
  // echo get_bloginfo( 'name' );
  die();
}
add_action( 'wp_ajax_view_sitename', 'view_sitename' );
add_action( 'wp_ajax_nopriv_view_sitename', 'view_sitename' );

// パンくずリストを生成する
// 
// 参考サイト
// https://www.suzukikenichi.com/blog/google-finally-supports-breadcrumbs-with-schema-org/
// https://developers.google.com/search/docs/guides/sd-policies
// https://schema.org/BreadcrumbList
//
function d4isk_breadCrumb($startTag='', $endTag=''){
  if ( is_front_page() ) {
    // トップページの場合
    return;
  }
  
  echo $startTag;
  
  // ホーム
  $home = '<ul class="d4_breadcrumb"><li><a href="'.get_bloginfo('url').'" >HOME > </a></li>';

  if ( is_front_page() ) {
  // トップページの場合

  }
  else if ( is_category() ) {
    $output = '<script>console.log("-----> In カテゴリ パンくずリスト生成");</script>'."\n";
    echo $output;
  
  // カテゴリページの場合

    // 親がいる場合の出力をする
    $cat = get_queried_object();
    $cat_id = $cat->parent;
    // $cat_list = array();
    $cat_list = [];
    while ($cat_id != 0){
        $cat = get_category( $cat_id );
        $cat_link = get_category_link( $cat_id );
        array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
        $cat_id = $cat->parent;
    }
    // echo $home;

    foreach($cat_list as $value){
        // echo $value;
        $home .= $value;
    }

    // ご本人の登場です
    $home .= '<li>'.get_the_archive_title().'</li>';

  }
  else if ( is_archive() ) {
  // 月別アーカイブ・タグページの場合
    $home .= '<li>'.get_the_archive_title().'</li>';
  }
  else if ( is_single() ) { // 投稿ページの場合
    // 投稿に設定されているカテゴリを取得する。１つとは限らない
    $categories = get_the_category();
    // $separator = ' '; CSSでセパレータを設定するので削除
    $output = '';
    if ( $categories ) {
      foreach( $categories as $category ) {
        $retArr = [];
        $retArr = catParent($category->cat_ID);
        foreach($retArr as $val){
          $cat = get_category( $val );
          $cat_link = get_category_link( $val );
          $home .= '<li><a href="'.$cat_link.'">'.$cat->name.' > </a></li>';
        }
      }
    }

    // ご本人の登場です
    // $home .= '<li>'.get_the_title().'</li>';
    $home .= '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';

  }
  else if( is_page() ) {
  // 固定ページの場合
    $home .= get_the_title();
  }
  else if( is_search() ) {
  // 検索ページの場合
    $home .= '<li>「'.get_search_query().'」の検索結果</li>';
  }
  else if( is_404() ) {
  // 404ページの場合
    // echo $home;
    $home .='<li>ページが見つかりません</li>';

  }else{
    // え？
  }

  $home .= "</ul>";
  // $home .= '</div>';
  $home .= $endTag;
  echo $home;

}

/**
 * パンくずリストを生成する
 * 
 */
function createBreadcrumbList(){
  // 雛形
  $tmplItem = [
    "@type" => "ListItem",
    "position" => 0,
    "name" => "name",
    "item" => "item(url)"
  ];

  $bclist = [];

  // トップページの場合 なし
  if ( is_front_page() ) {

  // カテゴリページの場合
  } else if ( is_category() ) {
    // ホームを含める
    $tmplItem["position"] = 1;
    // $tmplItem["name"] = "ホーム";
    $tmplItem["name"] = get_bloginfo('name');
    $tmplItem["item"] = get_bloginfo('url');
    $bclist[0][] = $tmplItem;
    
    // 親がいる場合の出力をする
    $cat = get_queried_object();
    $cat_id = $cat->parent;

    $count = 2;
    while ($cat_id != 0){
        $cat = get_category( $cat_id );
        $cat_link = get_category_link( $cat_id );

        $tmplItem["position"] = $count;
        $tmplItem["name"] = $cat->name;
        $tmplItem["item"] = $cat_link;
        $bclist[0][] = $tmplItem;

        $cat_id = $cat->parent;
        $count++;
    }

    $tmplItem["position"] = $count;
    $tmplItem["name"] = get_the_archive_title();
    $tmplItem["item"] = get_category_link( get_query_var('cat') );
    $bclist[0][] = $tmplItem;

  }
  else if ( is_archive() ) {
  // 月別アーカイブ・タグページの場合
    $home .= '<li>'.get_the_archive_title().'</li>';

  // 投稿ページの場合
  } else if ( is_single() ) {
    // 投稿に設定されているカテゴリを取得する。
    //  ※１つとは限らない
    //  ここでは、あるだけ返す。どうするかは呼び出し元の判断に任せる
    $categories = get_the_category();

    if ( $categories ) {
      // 複数カテゴリを保つ場合に、JSON-LPの出力をどうするか？
      // ひつのみなのか
      $countX = 0;
      foreach( $categories as $category ) {
        $retArr = [];
        $retArr = catParent($category->cat_ID);

        $countY = 1;
        foreach($retArr as $val){
          $cat = get_category( $val );
          $cat_link = get_category_link( $val );
          // $home .= '<li><a href="'.$cat_link.'">'.$cat->name.' > </a></li>';

          $tmplItem["position"] = $countY;
          $tmplItem["name"] = $cat->name;
          $tmplItem["item"] = $cat_link;
          $bclist[$countX][] = $tmplItem;
          $countY++;
        }

        $tmplItem["position"] = $countY;
        $tmplItem["name"] = get_the_title();
        $tmplItem["item"] = get_the_permalink();
        $bclist[$countX][] = $tmplItem;
        $countX++;
      }
    }
  }
  else if( is_page() ) {
  // 固定ページの場合
    $home .= get_the_title();
  }
  else if( is_search() ) {
  // 検索ページの場合
    $home .= '<li>「'.get_search_query().'」の検索結果</li>';
  }
  else if( is_404() ) {
  // 404ページの場合
    // echo $home;
    $home .='<li>ページが見つかりません</li>';

  }

  return $bclist;
}

/*
 *  このタイミングでJSON-LPをつっこむ
 * 
 */
add_action( 'wp_head', 'd4_creBreadcrumbJSONLp' );
function d4_creBreadcrumbJSONLp() {

  // パンくずリストを生成する
  $jsonLp = [];
  $jsonLp = [
    '@context' => 'http://schema.org',
    "@type" => "BreadcrumbList",
  ];

  $bclist = createBreadcrumbList();
  if(!$bclist){
    // データない場合は抜ける
    return;
  }
  $jsonLp["itemListElement"] = $bclist[0];

  // JSON-LPを出力する
  echo '<script type="application/ld+json">'."\n";
  echo json_encode($jsonLp, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  echo "\n".'</script>'."\n";
}

/*
 *  
 * 
 */
function catParent($catID){
  $pID = get_category($catID)->parent;
  $retArr = [$catID];

  if($pID != 0){
    $pRetArr = [];
    $pRetArr = catParent($pID);
    foreach($pRetArr as $val){
      array_unshift($retArr, $val);
    }
  }

  return $retArr;
}

// タイトルの余計なものを削除する
// e.g. "カテゴリー: HOGE" を "HOGE" にする
add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );

  } elseif ( is_month() ) {
    $title = single_month_title( '', false );
  }
  return $title;
});

// モジュールを読み込む
require_once(get_stylesheet_directory() . "/myfunc/func_test01.php");

// 読み込んだモジュールの関数を呼び出す
add_action('wp_head', 'd4_opMsg');
