<?php
  include("head.php");
?>
<div>
  <form action="studyprocess.php" method="get">
    <?php
    echo "
    <button type=\"submit\" class=\"btn btn-default\"
    style=\"margin-left: auto; margin-right: auto; display: block;\">신청 해제</button>
    <input type=\"hidden\" name=\"id\" value=\"{$_SESSION['login_user']}\">
    <input type=\"hidden\" name=\"index\" value=0>";
   ?>

  </form>
</div>
<div id="columns">

  <?php
  $img = array('','./img/sc01.png', './img/sc02.png', './img/gn01.png',
              './img/gn02.png', './img/gn03.png', './img/gn04.png', './img/gn05.png', './img/gn06.png', './img/gn07.png');
  $startday = array('','9/18', '9/18', '9/18',
                    '9/18', '9/19', '9/19', '9/19', '9/23', '9/23');
  $sche = array('','월 수', '월 수', '월 수',
                '월 수', '화 목', '화 목', '화 목', '주말', '주말');
  $maxvalue = 9;

  for($i=1; $i<=9; $i++){
    $sql = "select count(*) as cnt from studydb where studyno = {$i}";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $sqlname = "select group_concat(id) as conid from studydb where studyno = {$i}";
    $resultname = mysqli_query($db,$sqlname);
    $rowname = mysqli_fetch_assoc($resultname);
    $rownames = str_replace(",", "<br>", $rowname['conid']);
    echo "<figure>
     <img src=\"{$img[$i]}\">
    <figcaption><br>시작일 : {$startday[$i]}<br>일정 : {$sche[$i]}
    <br>현재 인원 : {$row['cnt']}<br>총 인원 : {$maxvalue}<br></figcaption><br>

    <form action=\"studyprocess.php\" method=\"get\">
    <button type=\"submit\" class=\"btn btn-default\"
    style=\"margin-left: auto; margin-right: auto; display: block;\">신청</button>
    <input type=\"hidden\" name=\"id\" value=\"{$_SESSION['login_user']}\">
    <input type=\"hidden\" name=\"index\" value={$i}>
    </form>
    <hr>
    <figcaption>현재 인원<br>
    {$rownames}</figcaption><hr>
    </figure>";


  }
?>

</div>


<?php
  include("foot.php");
 ?>
