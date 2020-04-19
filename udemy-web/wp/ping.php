<?php
  $name = $_POST['name'];//ポストで受け取れる
  //略
  $html = "戻り値: ".$name;
  
  // $to = $_POST['to'];
  // $title = $_POST['title'];
  // $content = $_POST['content'];

  $to = 'kmt@tmick.net';
  $title = 'メール送信テスト from PHP';
  $content = $name;

  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  if(mb_send_mail($to, $title, $content)){
    $html = "メールを送信しました";
  } else {
    $html = "メールの送信に失敗しました";
  }

  header('Content-type: application/json');//指定されたデータタイプに応じたヘッダーを出力する
  echo json_encode( $html );
