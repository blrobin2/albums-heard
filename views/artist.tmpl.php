<?php include '_partials/header.php'; ?>

<?php
  if ( $info ) {
      echo "<h1>{$info->Artist}: {$info->Album}</h1>";
    if ( "{$info->Rating}" !== "" ) {
    echo "<p>{$info->Rating} stars out of 5</p>";
    } else {
      echo "<p>No rating yet!</p>";
    }
  } else {
    echo "<p>No results available.</p>";
  } 
?>

<p><a href="index.php">Back</a></p>
  
<?php include '_partials/footer.php'; ?>