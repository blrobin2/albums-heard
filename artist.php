<?php

require 'functions.php';
connect();

$info = get_album_rating( $_GET['album_id'] );

include 'views/artist.tmpl.php';