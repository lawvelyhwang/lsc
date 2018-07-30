
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();
      include("config.php");
      $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
      $passwd = crypt($_POST['pwd'], $salt);

      $pwd = mysqli_real_escape_string($db, $passwd);
      $name = mysqli_real_escape_string($db, $_POST['name']);
      $pNumber = mysqli_real_escape_string($db, $_POST['pNumber']);
      $school = mysqli_real_escape_string($db, $_POST['school']);
      $major = mysqli_real_escape_string($db, $_POST['major']);
      $gpa = mysqli_real_escape_string($db, $_POST['gpa']);
      $gpaIndex = mysqli_real_escape_string($db, $_POST['gpaIndex']);
      $leetApure = mysqli_real_escape_string($db, $_POST['leetApure']);
      $leetBpure = mysqli_real_escape_string($db, $_POST['leetBpure']);
      $eng = mysqli_real_escape_string($db, $_POST['eng']);
      $engIndex = mysqli_real_escape_string($db, $_POST['engIndex']);

      $sql = "select * from userdb where id = '".$_SESSION['login_user']."'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);

        $sql = "update userdb set `pwd`= '{$pwd}', `name` = '{$name}', `pnumb` = '{$pNumber}', `age` ='{$age}',
         `school` = '{$school}', `major` = '{$major}', `gpa` = '{$gpa}', `gpaidx` = '{$gpaIndex}',
         `leeta` = '{$leetApure}', `leetb` = '{$leetBpure}', `eng` = '{$eng}',
        `engidx` = '{$engIndex}' where `id` = '{$_SESSION['login_user']}'";
      $result = mysqli_query($db,$sql);

        echo "<script>alert('변경 되었습니다.');history.back();</script>";
        exit;

     ?>
  </body>
</html>
