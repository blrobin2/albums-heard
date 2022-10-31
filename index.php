<?php

require 'functions.php';
connect();

if ( isXHR() && isset($_POST['q']) ) {
  echo json_encode( get_artists( $_POST['q'] ) );
  return;
}

if ( isset($_POST['q']) ) {
  $artists = get_artists( $_POST['q'] );
}

if ( isXHR() && isset( $_POST['album_id'] ) ) {
  $info = get_album_rating( $_POST['album_id'] );
  echo json_encode($info->Rating);
  return;
}

include 'views/index.tmpl.php';