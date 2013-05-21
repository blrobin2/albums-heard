<?php

error_reporting(0);

function isXHR() {
  return isset( $_SERVER['HTTP_X_REQUESTED_WITH'] );
}

function connect() {
  global $pdo;
  $pdo = new PDO("mysql:host=hostname;dbname=database name", "user", "password");
}

function get_artists( $letter ) {
  global $pdo;

  $stmt = $pdo->prepare('
    SELECT Artist, Album, Rating, album_id 
    FROM music_heard
    WHERE Artist LIKE :letter
    ORDER BY Artist
    LIMIT 500');

  $stmt->execute( array( ':letter' => $letter . '%') );

  return $stmt->fetchAll( PDO::FETCH_OBJ );
}

function get_album_rating( $album_id ) {
  global $pdo;

  $stmt = $pdo->prepare('
    SELECT Artist, Album, Rating, album_id 
    FROM music_heard
    WHERE album_id LIKE :album_id
    LIMIT 1');

  $stmt->execute( array( ':album_id' => $album_id ) );

  return $stmt->fetch( PDO::FETCH_OBJ );
}

