<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
  <head>
<meta http-equiv='refresh' content='0;url=study.php'>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    $maxvalue = 9;
    session_start();
    $sql = "select count(*) as cnt from studydb where id = '{$_SESSION['login_user']}'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $sqlcnt = "select count(*) as cnt from studydb where studyno = '{$_GET['index']}'";
    $resultcnt = mysqli_query($db, $sqlcnt);
    $rowcnt = mysqli_fetch_assoc($resultcnt);

    if($rowcnt['cnt']<$maxvalue){
      if ($row['cnt']>=1) {
        $sql = "update studydb set sdudyno = '' where id = '{$_SESSION['login_user']}'";
        $result = mysqli_query($db, $sql);
        $sql = "update studydb set studyno = '{$_GET['index']}' where `id` = '{$_SESSION['login_user']}'";
        $result = mysqli_query($db, $sql);

      }else{

        $sql = "insert into studydb(`id`, `studyno`) values ('{$_SESSION['login_user']}', '{$_GET['index']}')";
        $result = mysqli_query($db, $sql);
      }


    }else{
      echo "<script>alert(\"스터디 인원이 가득 찼습니다. 다른 스터디를 선택해주세요.\");history.back();</script>";
      exit;
    }
    ?>

  </body>
</html>
