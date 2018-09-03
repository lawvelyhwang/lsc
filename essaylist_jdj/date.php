<?php
  require("s_essay_head.php");
 ?>
        <!-- 컨텐츠가 표시되는 영역을 지정 -->
    <div data-role="content">
      <div class="" align="center">
        - <?php echo $_GET['date']; ?> 자기소개서 상담 예약 목록 -
      </div>
      <ul data-role="listview" data-inset="true">
      <?php
      date_default_timezone_set('Asia/Seoul');
      $date = $_GET['date'];
      $t_month = substr($date, 0,2);
      $t_day = substr($date, 3);
      $sql = "select `a`.`date` AS `date`,`a`.`week` AS `week`,`a`.`day` AS `day`,`a`.`time` AS `time`,`a`.`id` AS `id`,
  `b`.`name` AS `name`,`a`.`step` AS `step`,`a`.`loc` AS `loc`
  from (`lawvelyhwang`.`reserve_essay_jdj` `a` left join `lawvelyhwang`.`userdb` `b` on((`a`.`id` = `b`.`id`)))
  where a.id not in (\"-\",\"\",\"수업\",\"아침수업\",\"저녁수업\") and date = str_to_date('2018-{$t_month}-{$t_day}', '%Y-%m-%d')";

      $result = mysqli_query($db,$sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $str_time = substr($row['time'],0,5);
        echo "<li><a href=\"studentdb.php?id={$row['id']}\">{$str_time} : {$row['name']} - {$row['step']}회차</a></li>";
      }
      ?>

      </ul>
    </div><!-- /content -->
</div><!-- /page -->
</body>
</html>
