
<!DOCTYPE html>
<html>
  <head>
<meta http-equiv='refresh' content='0;url=main.php'>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    include("config.php");

    if(!isset($_POST['id']) || !isset($_POST['password'])) exit;
    $user_id = $_POST['id'];

    $salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
    $user_pw = crypt($_POST['password'], $salt);

    $sql = "select * from userdb where id = '".$_POST['id']."'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    echo "로그인 중 입니다.";

    if(!isset($row['id'])) {
      echo "<script>alert('아이디가 잘못되었습니다.');history.back();</script>";
      exit;
    }
    if($row['pwd'] != $user_pw) {
      echo "<script>alert('패스워드가 잘못되었습니다.');history.back();</script>";
      exit;
    }
    session_start();
    $_SESSION['login_user'] = $user_id;
    $sql = "select * from userprogress where id = '".$user_id."'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql = "insert into login (`id`) values({$_SESSION['login_user']});";
    $result = mysqli_query($db, $sql);
    
    $_SESSION['nowW']= $row['nowW'];

    ?>

  </body>
</html>
