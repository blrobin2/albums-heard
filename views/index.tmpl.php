<?php include '_partials/header.php'; ?>

<h1>Albums I've Heard (and Some Ratings!)</h1>

<form id="artist-selection" action="index.php" method="post">
  <label for="q">Select fist letter of Artist:</label>
  <select name="q" id="q">
    <?php
    $alphabet = str_split('abcdefghijklmnopqrstuvwxyz');
    foreach( $alphabet as $letter ) {
      echo "<option value='$letter'>$letter</option>";
    }
    ?>
  </select>
  <button type="submit">Go</button>
</form>

<ul class="artists_list">
  <?php foreach( $artists as $a ) {
    echo "<li data-album_id='{$a->album_id}'><a href='artist.php?album_id={$a->album_id}'>{$a->Artist}: {$a->Album}</a></li>";
  } 
  ?>

<script id="artist_list_template" type="text/x-handlebars-template">
    {{#each this}}
    <li data-album_id="{{album_id}}">
      <a href="artist.php?album_id={{album_id}}">{{artistAlbum this}}</a>
    </li>
    {{/each}}
  </script>
</ul>

<div class="album_info">
<script id="album_info_template" type="text/x-handlebars-template">
  <p class="rating">{{info}}</p>
  <span class="close">X</span>
</script>
</div>

<?php include '_partials/footer.php'; ?>