<?php
  require("s_essay_head.php");
 ?>
        <!-- 컨텐츠가 표시되는 영역을 지정 -->
    <div data-role="content">
      <div class="" align="center">
        - 자기소개서 상담 예약 목록 -
      </div>
<ul data-role="listview" data-inset="true">
      <?php
      $one_day = 86400;

      for($i = 0; $i<7; $i++){
        $date = date("m-d", time() + $one_day *(42+ $i));
        $t_month = substr($date, 0,2);
        $t_day = substr($date, 3);
        $sql = "select count(*) as cnt from reserve_essay
        where date = str_to_date('2018-{$t_month}-{$t_day}', '%Y-%m-%d')
        and id <> \"\";";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_assoc($result);

        echo "<li><a href=\"date.php?date={$date}\">{$date} : {$row['cnt']} 명</a></li>";}
      ?>


 </ul>

    </div><!-- /content -->

</div><!-- /page -->

</body>
</html>
