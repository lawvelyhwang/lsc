<?php
  include("head.php");
?>
<style media="screen">
.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}
</style>

<div class="" align="center">
  <h2>자기소개서 예약 페이지</h2>
  <br>
  * reserve.csv 파일에 강의 위치 일정 넣고 업로드 할 것.
  * 파일 제출 부분 만들어야함.
  <table class="table" style="width: 80%; text-align: center">
    <tr>
      <td>주차</td>

      <td>예약날짜</td>
      <td>예약버튼</td>

      <td>파일제출</td>
    </tr>
    <!-- 회차 -->
    <?php
    $sql = "select A.week, date, time from (select distinct week from reserve_essay) as A
  left join (select * from reserve_essay where id = \"{$_SESSION['login_user']}\") as B
  on A.week = B.step;";
  $result = mysqli_query($db, $sql);
  $the_day = date("m-d", time());

  echo "서버시간 : {$the_day}<br><br>";

    for ($idx=1; $idx <= 7; $idx++) {
      $row = mysqli_fetch_assoc($result);
      $str_date = substr($row['date'],5);
      $str_time = substr($row['time'],0,5);
      echo "<tr>
              <form action=\"reserve_detail.php\" method=\"get\">
              <td>{$idx}회차</td>
              <td>{$str_date} / {$str_time}</td>";

      $t_month = substr($str_date, 0,2);
      $t_day = substr($str_date, 3);

        #echo "<br>123tmh:{$t_month}, tdy:{$t_day}<br>";
      $new_day = date("m-d", mktime(0,0,0, $t_month, $t_day, 2018));
        #echo "the_day : {$the_day}   /   ";
        #echo "new_day : {$new_day}    ";

      if ($the_day >= $new_day) {
        echo "<td>변경불가</td>";
      }else{
        echo "<td><button type=\"submit\" class=\"btn btn-default\">예약</button></td>";
      }




      echo "<input type=\"hidden\" name=\"step\" value=\"{$idx}\">
            </form>
            <td>";
      echo "<form enctype=\"multipart/form-data\" action=\"upload.php\" method=\"post\">
              <label class=\"btn btn-default btn-file\">
                파일첨부 <input type=\"file\" style=\"display: none;\" name=\"upfile\">
              </label>
              <input type=\"hidden\" name = \"date\" value = \"{$str_date}\">
              <input type=\"hidden\" name = \"step\" value=\"{$idx}\">
              <button style=\"margin-left: 10px\" class=\"btn btn-default\">제출</button>
            </form>";

      echo "</td>
          </tr>
          ";
    }

     ?>


    <!-- 참고사항 -->
    <tr>
      <td colspan=4>
        <br>
        * 자기소개서 예약 변경은 1일 전까지만 가능합니다. <br><br>
        * 첨부 파일은 doc 파일을 권장하고, 하나의 파일로 합쳐서 업로드 해주시기 바랍니다.<br><br>

      </td>
    </tr>



  </table>
</div>


<?php
  include("foot.php");
 ?>
