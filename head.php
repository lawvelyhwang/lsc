<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <link rel="stylesheet" href="./nav.css">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./study-style.css">

    <style media="screen">
      .is-visible{
        background-color: #fdf8d6 !important;
      }
        .is-visiblea{
        background-color: #ffeeee !important;
      }
      .is-hidden{
        color: #ccc;
        background-color: #f9f9f9 !important;
      }
      .is-visible-btn{
        background-color: #fffdf2 !important;
      }
      hr{
        border-top: 1px solid #9c9c98 !important;
        width: 90%;
      }
      @import url('http://fonts.googleapis.com/earlyaccess/nanumgothic.css');
      html, body, h1, h2, h3, h4, h5, h6, li, p {font-family:'Nanum Gothic';}
    </style>

    <title></title>
  </head>
  <body>
    <div class="" align="center">
      <img src="./logo.png" style="width: 30%">
    </div>
    <?php session_start();
    if($_SESSION['login_user'] == ''){

            header('Location: index.php');
    }

    ?>

    <nav class="navbar navbar-default" style="width:90%;margin-left:auto;margin-right:auto;">
  <div class="container-fluid" align="center">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style=" display:inline-block; ">

      <a class="navbar-brand" href="./main.php">Home</a>
      <a class="navbar-brand" href="./reserve.php">예약</a>
      <a class="navbar-brand" href="./study.php">스터디</a>
      <!--<a class="navbar-brand" href="./reserve_simul.php">예약</a>-->
      <!--<a class="navbar-brand" href="http://lawvelyhwang.gonetis.com/collect.php">기출문제 입력</a>-->
      <!--<a class="navbar-brand" href="http://lawvelyhwang.gonetis.com/board.php">게시판</a>-->
      <!--<a class="navbar-brand" href="http://lawvelyhwang.gonetis.com/analy.php">정량 분석</a>-->
      <!--<a class="navbar-brand" href="http://lawvelyhwang.gonetis.com/leetscoreinsert.php">리트성적입력</a>-->
      <!--<a class="navbar-brand" href="./interview.php">면접 영상</a>-->
    </div>
    <?php echo "<div align=\"right\" style=\"margin-right: 5%; height:50px;\">
    <a class=\"navbar-brand\" href=\"logout.php\" style=\"float: right;\">로그아웃</a>
    <a class=\"navbar-brand\" style=\"float: right;\" href=\"userupdate.php\">접속자 : {$_SESSION['login_user']}님</a>
    </div>";
 ?>
  </div><!-- /.container-fluid -->
</nav>

<?php
  function getResult($table, $searchCol, $searchVal, $option='where'){
    global $db;
    $sql = "select * from ".$table;

    if($option == 'where'){
      $option = " where `".$searchCol."` = '".$searchVal."'";
      $sql .= $option;
    }
    $result = mysqli_query($db, $sql);
    return $result;
  }
  function timeClac($index){
    $hour = floor(($index+1)/2) +9;
    $min = $index%2;
    $time = $hour . ":";
    if($min == 0){
      $time .="30";
    }else{
      $time .="00";
    }
    return $time;
  }
  function dayCalc($index, $dayValue, $day, $tableName, $checker){
    if($dayValue == ''){
      $url = "reserveProcess.php?index=".$index."&day=".$day."&tableName=".$tableName;
      if($tableName == 'curriculum_special'){
        $content = " class=\"is-visible\"><a class=\"btn btn-default is-visible-btn\" href =\"".$url."\">예약</a>";
      }else{
      if($index>7 && $index<16 && $checker == 1){
          $content = " class=\"is-visiblea\"><a class=\"btn btn-default is-visible-btn\" href =\"".$url."\">예약</a>";
      }else{
          $content = " class=\"is-visible\"><a class=\"btn btn-default is-visible-btn\" href =\"".$url."\">예약</a>";
      }}
      return $content;
    }else if($dayValue == '수업'){
        return " class=\"is-hidden\">수업";
    }else if($dayValue == '이동중'){
        return " class=\"is-hidden\">이동중";
    }else{
      return " class=\"is-hidden\">예약 완료";
    }
  }
function dayCalc2($index, $dayValue, $day, $tableName, $checker){
    if($dayValue == ''){
      $url = "reserve_process_simul.php?index=".$index."&day=".$day."&tableName=".$tableName;

        $content = " class=\"is-visible\"><a class=\"btn btn-default is-visible-btn\" href =\"".$url."\">예약</a>";

      return $content;
    }else if($dayValue == '수업'){
        return " class=\"is-hidden\">수업";
    }else if($dayValue == '이동중'){
        return " class=\"is-hidden\">이동중";
    }else{
      return " class=\"is-hidden\">예약 완료";
    }
  }

 ?>
 <hr>
<br>
