<?php

function d4_setup(){
  global $d4_uri;
  global $d4_image_uri;

  $d4_uri = get_template_directory_uri();
  $d4_image_uri = $d4_uri . "/images";
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