<?php
  include("head.php");

?><div class="" align="center">
  <h2>자기소개서 예약 페이지 - 정동주 변호사</h2>
  <br>
  * 정동주 변호사 자기소개서 첨삭은 강남에서만 진행합니다.
  <br>
  <br>

    <div class="input-group" style="width: 80%;">

  <br>
<div class="" align="center">
  <table class="table" style="width: 80%; text-align: center;">
    <tr>
      <td>시간</td>

      <td>9/8(토)</td>
      <td>9/10(월)</td>
      <td>9/15(토)</td>
      <td>9/17(월)</td>
      <td>9/19(수)</td>
      <td>9/21(금)</td>
    </tr>
    <?php
      $sql = "select a.time as time, a.id as id_1, a.loc as loc_1, b.id as id_2, b.loc as loc_2,
  c.id as id_3, c.loc as loc_3, d.id as id_4, d.loc as loc_4, e.id as id_5, e.loc as loc_5, f.id as id_6, f.loc as loc_6
    from (select * from reserve_essay_jdj where week = 1 and day = 1) as a
  left join (select * from reserve_essay_jdj where week = 1 and day = 2) as b on a.time = b.time
  left join (select * from reserve_essay_jdj where week = 1 and day = 3) as c on a.time = c.time
  left join (select * from reserve_essay_jdj where week = 1 and day = 4) as d on a.time = d.time
  left join (select * from reserve_essay_jdj where week = 1 and day = 5) as e on a.time = e.time
  left join (select * from reserve_essay_jdj where week = 1 and day = 6) as f on a.time = f.time;";
      $result = mysqli_query($db, $sql);


        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>";
          # 시간 채우기
          echo "<td>{$row['time']}</td>";
          # 요일 채우기
          for ($i=1; $i <= 6 ; $i++) {
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
              }

              if ($loc == "강남") {
                $_bgcol = "#fdf8d6";
              }else{
                $_bgcol = "#ffeeee";
              }

            echo "<td style=\"background : {$_bgcol};\">";
            if ($id != "") {
              echo "예약중";
            }else{
              echo "<a class=\"btn btn-default\" href =\"./reserve_process_jdj.php?week=1&day={$i}&step={$_GET['step']}&time={$row['time']}\">예약</a>";
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
