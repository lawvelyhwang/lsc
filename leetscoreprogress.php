
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("config.php");
      session_start();

      $leetAscore = mysqli_real_escape_string($db, $_POST['leetAscore']);
      $leetAPscore = mysqli_real_escape_string($db, $_POST['leetAPscore']);
      $leetBscore = mysqli_real_escape_string($db, $_POST['leetBscore']);
      $leetBPscore = mysqli_real_escape_string($db, $_POST['leetBPscore']);

      $sql = "select * from userleetdb where id = '".$_SESSION['login_user']."'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
      if($row['id'] == null){

      $sql = "insert into userleetdb   values ( '{$_SESSION['login_user']}', {$leetAscore}, {$leetAPscore}, {$leetBscore}, {$leetBPscore},null)";
      $result = mysqli_query($db,$sql);
      echo $sql;

      header('Location: index.php');}
      else{
        $sql = "update userleetdb set id = '{$_SESSION['login_user']}', leetAscore = {$leetAscore},
        leetAPscore = {$leetAPscore}, leetBscore = {$leetBscore}, leetBPscore ={$leetBPscore}
        where id = '{$_SESSION['login_user']}'";
        $result = mysqli_query($db,$sql);

        echo $sql;
      }
      header('Location: main.php');

     ?>
  </body>
</html>
