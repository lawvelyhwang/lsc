<?php
  include("head.php");
?>
   asdf
    <?php
      
      
      $school= mysqli_real_escape_string($db, $_POST['school']);
      $type = mysqli_real_escape_string($db, $_POST['type']);
      $id = mysqli_real_escape_string($db, $_POST['id']);
      $question = mysqli_real_escape_string($db, $_POST['question']);
      $sql = "insert into question_ga(id, school, type, question) 
      values('".$id."','".$school."','".$type."','".$question."')";
      
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
      
      header('Location: main.php');
      
     ?>
 
<?php
  include("foot.php");
 ?>
