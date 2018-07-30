<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
  <head>

 <meta http-equiv='refresh' content='0;url=reserve.php'>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    session_start();
    #$_SESSION['login_user']
    # 사용할 변수 week, day, step, time

    # 현재시간이 가능한지
    $sql_tf = "select * from reserve_essay where week = {$_GET['week']} and day = {$_GET['day']} and time = \"{$_GET['time']}\";";
    $result_tf = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result_tf);
    if ($row['id'] == "") {

    #예약한 상태인지 아닌지 먼저 확인 - step, id

      $sql = "select * from reserve_essay where id = \"{$_SESSION['login_user']}\" and step = {$_GET['step']};";

      $result = mysqli_query($db, $sql);
      $row_tf = mysqli_num_rows($result);
      if ($row_tf > 0 ) {
        $sql_upt = "update reserve_essay set id = \"\", step = \"\" where id = \"{$_SESSION['login_user']}\" and step = {$_GET['step']};";
        $result_upt = mysqli_query($db, $sql_upt);
      }

      $sql_upt = "update reserve_essay set id = \"{$_SESSION['login_user']}\", step = {$_GET['step']} where week = {$_GET['week']} and day = {$_GET['day']} and time = \"{$_GET['time']}\";";
      $result = mysqli_query($db, $sql_upt);
    }else{ # 현재 시간이 차있다면
      echo "<script>alert('이미 예약 된 시간 입니다. 다른 시간에 예약해 주십시오.');history.back();</script>";
      exit;
    }

    ?>

  </body>
</html>
