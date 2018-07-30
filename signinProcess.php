
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
      include("config.php");
      $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
      $passwd = crypt($_POST['pwd'], $salt);

      $id = mysqli_real_escape_string($db, $_POST['id']);
      $pwd = mysqli_real_escape_string($db, $passwd);
      $name = mysqli_real_escape_string($db, $_POST['name']);
      $pNumber = mysqli_real_escape_string($db, $_POST['pNumber']);
      $age = mysqli_real_escape_string($db, $_POST['age']);
      $school = mysqli_real_escape_string($db, $_POST['school']);
      $major = mysqli_real_escape_string($db, $_POST['major']);
      $gpa = mysqli_real_escape_string($db, $_POST['gpa']);
      $gpaIndex = mysqli_real_escape_string($db, $_POST['gpaIndex']);
      $leetApure = mysqli_real_escape_string($db, $_POST['leetApure']);
      $leetBpure = mysqli_real_escape_string($db, $_POST['leetBpure']);
      $eng = mysqli_real_escape_string($db, $_POST['eng']);
      $engIndex = mysqli_real_escape_string($db, $_POST['engIndex']);
      $essayTF = mysqli_real_escape_string($db, $_POST['essayTF']);
      $schoolsub = mysqli_real_escape_string($db, $_POST['schoolsub']);

      $sql = "select * from userdb where id = '".$id."'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
      if($row['id'] == null){

      $sql = "insert into userdb (`id`, `pwd`, `name`, `pnumb`, `age`, `school`,
       `major`, `gpa`, `gpaidx`, `leeta`, `leetb`, `eng`, `engidx`, `schsub`) values
       ('{$id}', '{$pwd}', '{$name}', '{$pNumber}', '{$age}',
      '{$school}', '{$major}', {$gpa}, {$gpaIndex}, {$leetApure}, {$leetBpure}, {$eng}, '{$engIndex}'
      ,'{$schoolsub}')";
      $result = mysqli_query($db,$sql);
      echo $sql;
      header('Location: index.php');}
      else{
        echo "<script>alert('아이디가 중복입니다.');history.back();</script>";
        exit;
      }
     ?>
  </body>
</html>
