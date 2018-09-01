<?php
  include("head.php");

?><div class="" align="center">
  <h2>자기소개서 예약 페이지</h2>
  <br>
  <span style="color:#ffeeee"> &#9679; </span>- 신촌 | <span style="color:#fdf8d6"> &#9679; </span> - 강남
  <br>
  <br>

  <?php
  echo "<form action=\"reserve_detail.php\" method=\"get\">"; ?>
    <div class="input-group" style="width: 80%;">
      <select class="form-control" name="week">
        <?php
        $l_mon = "";
        $l_day = "";
          switch ($_GET['week']) {
            case 1:
              $label_week = "선택중 - 1주차 - 8/20 ~ 8/26";
              $l_mon = 8;
              $l_day = 20;
              break;
            case 2:
              $label_week = "선택중 - 2주차 - 8/27 ~ 9/02";
              $l_mon = 8;
              $l_day = 27;
              break;
            case 3:
              $label_week = "선택중 - 3주차 - 9/03 ~ 9/09";
              $l_mon = 9;
              $l_day = 3;
              break;
            case 4:
              $label_week = "선택중 - 4주차 - 9/10 ~ 9/16";
              $l_mon = 9;
              $l_day = 10;
              break;
            case 5:
              $label_week = "선택중 - 5주차 - 9/17 ~ 9/23";
              $l_mon = 9;
              $l_day = 17;
              break;
            case 6:
              $label_week = "선택중 - 6주차 - 9/24 ~ 9/30";
              $l_mon = 9;
              $l_day = 24;
              break;
            case 7:
              $label_week = "선택중 - 7주차 - 10/1 ~ 10/5";
              $l_mon = 10;
              $l_day = 1;
              break;

        }
          if ($_GET['week'] != 1) {
            echo "<option value=\"{$_GET['week']}\">{$label_week}</option>";

          }
         ?>
        <option value="1">1주차 - 8/20 ~ 8/26</option>
        <option value="2">2주차 - 8/27 ~ 9/02</option>
        <option value="3">3주차 - 9/03 ~ 9/09</option>
        <option value="4">4주차 - 9/10 ~ 9/16</option>
        <!--<option value="5">5주차 - 9/17 ~ 9/23</option>
        <option value="6">6주차 - 9/24 ~ 9/30</option>
        <option value="7">7주차 - 10/1 ~ 10/5</option>-->
      </select>
      <?php
        echo "<input type=\"hidden\" name=\"step\" value=\"{$_GET['step']}\">";
       ?>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">검색</button>
      </span>
    </div>
  </form>
  <br>
<div class="" align="center">
  <table class="table" style="width: 80%; text-align: center;">
    <tr>
      <td>시간</td>
      <?php
      $new_day = date("m-d", mktime(0,0,0, $l_mon, $l_day, 2018));
      $new_day_1 = date("m-d", mktime(0,0,0, $l_mon, $l_day+1, 2018));
      $new_day_2 = date("m-d", mktime(0,0,0, $l_mon, $l_day+2, 2018));
      $new_day_3 = date("m-d", mktime(0,0,0, $l_mon, $l_day+3, 2018));
      $new_day_4 = date("m-d", mktime(0,0,0, $l_mon, $l_day+4, 2018));
      $new_day_5 = date("m-d", mktime(0,0,0, $l_mon, $l_day+5, 2018));
      $new_day_6 = date("m-d", mktime(0,0,0, $l_mon, $l_day+6, 2018));

      echo "<td>{$new_day} (월)</td>
      <td>{$new_day_1} (화)</td>
      <td>{$new_day_2} (수)</td>
      <td>{$new_day_3} (목)</td>
      <td>{$new_day_4} (금)</td>
      <td>{$new_day_5} (토)</td>
      <td>{$new_day_6} (일)</td>";
       ?>


    </tr>
    <?php
      $sql = "select a.time as time, a.id as id_1, a.loc as loc_1, b.id as id_2, b.loc as loc_2,
  c.id as id_3, c.loc as loc_3, d.id as id_4, d.loc as loc_4
  , e.id as id_5, e.loc as loc_5, f.id as id_6, f.loc as loc_6
  , g.id as id_7, g.loc as loc_7
    from (select * from reserve_essay where week = {$_GET['week']} and day = 1) as a
  left join (select * from reserve_essay where week = {$_GET['week']} and day = 2) as b on a.time = b.time
  left join (select * from reserve_essay where week = {$_GET['week']} and day = 3) as c on a.time = c.time
  left join (select * from reserve_essay where week ={$_GET['week']} and day = 4) as d on a.time = d.time
  left join (select * from reserve_essay where week = {$_GET['week']} and day = 5) as e on a.time = e.time
  left join (select * from reserve_essay where week = {$_GET['week']} and day = 6) as f on a.time = f.time
  left join (select * from reserve_essay where week = {$_GET['week']} and day = 7) as g on a.time = g.time;";
      $result = mysqli_query($db, $sql);

      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        # 시간 채우기
        echo "<td>{$row['time']}</td>";
        # 요일 채우기
        for ($i=1; $i <= 7 ; $i++) {
          $loc = "";
          $id = "";
          switch ($i) {
            case 1:
              $loc = $row['loc_1'];
              $id = $row['id_1'];
              break;
            case 2:
              $loc = $row['loc_2'];
              $id = $row['id_2'];
            break;
            case 3:
              $loc = $row['loc_3'];
              $id = $row['id_3'];
              break;
            case 4:
              $loc = $row['loc_4'];
              $id = $row['id_4'];
          break;
          case 5:
            $loc = $row['loc_5'];
            $id = $row['id_5'];
            break;
            case 6:
              $loc = $row['loc_6'];
              $id = $row['id_6'];
            break;
            case 7:
              $loc = $row['loc_7'];
              $id = $row['id_7'];
            break;
          }

            if ($loc == "강남") {
              $_bgcol = "#fdf8d6";
            }else{
              $_bgcol = "#ffeeee";
            }
            echo "<td style=\"background : {$_bgcol};\">";
            if ($id != "") {
              echo "예약중";
            }else {
              echo "<a class=\"btn btn-default\" href =\"./reserve_process.php?week={$_GET['week']}&day={$i}&step={$_GET['step']}&time={$row['time']}\">예약</a>";
            }
            echo "</td>";
        }
        echo "</tr>";
      }

    ?>
  </table>
</div>

<?php
  include("foot.php");
 ?>
