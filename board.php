<?php
  include("head.php");
?>

<div class="" align="center">
  <h2>게시판</h2>
  <br>
</div>
<?php

    echo "<div style=\"text-align: center;\">
    <table class=\"table\" style=\"width: 80%; align: center; margin-right: auto; margin-left: auto;\">";

    if($_GET['index'] == null){
    echo "<tr>
    <td style=\"width:10%;\">글번호</td>
    <td style=\"width:60%;\">제목</td>
    <td style=\"width:15%;\">작성자</td>
    <td style=\"width:15%;\">시간</td>
    </tr>";

    session_start();
      $result = getResult("boarddb",'','','all');
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
          <td>{$row['numb']}</td>
          <td><a href=\"?index={$row['index']}\">{$row['subject']}</a></td>
          <td>{$row['author']}</td>
          <td>{$row['time']}</td>
        </tr>";
      }
    }else{
      $result = getResult("boarddb", 'index', $_GET['index']);
      $row = mysqli_fetch_assoc($result);
      echo "
      <tr align=\"left\">
      <td colspan=\"2\" style=\"
        padding-left: 5%;
        font-size: large;
        padding-top: 1%;
        font-weight: bold;
        padding-bottom: 1%;
        \">
        {$row['subject']}</td>
      </tr>
      <tr align=\"left\">
      <td colspan=\"2\" style=\"
      padding-right: 6%;
      text-align: right;
      padding-top: 1%;
      padding-bottom: 1%;
      \">
        {$row['author']} | {$row['time']}
      </td></tr>
      <tr align=\"left\">
      <td colspan=\"2\" style=\"
      padding-left: 5%;
      padding-top: 1%;
      padding-bottom: 1%;
      height: 380px;
      \">
        {$row['article']}
      </td></tr>
      <tr align=\"left\">
      <td style=\"
      padding-left: 5%;
      padding-top: 1%;
      padding-bottom: 1%;
      \">첨부파일 : ";
      if($row['file'] != null){
        echo $row['file']."       <a style=\"margin-left: 15px;\" class=\"btn btn-default\" href=\"download.php?index={$row['index']}\">다운로드</a>";
      }
      echo "</td>
      <td style=\"text-align: right; padding-right: 5%;\">
        <a class=\"btn btn-default\" href=\"board.php\">목록</a>
      </td>
      </tr>";
      }

    echo "</table>
    </div>";
     ?>



<?php
  include("foot.php");
 ?>
