<meta charset="utf-8">
<?php
  session_start();
  session_destroy();
  $target_url = "index.php";
  header("Location: {$target_url}");

 ?>
