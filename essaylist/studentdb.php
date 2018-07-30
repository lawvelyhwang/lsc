<?php

require("s_essay_head.php"); ?>
        <!-- 컨텐츠가 표시되는 영역을 지정 -->
    <div data-role="content" style="
    padding-top: 0px;
">

        <?php

          $sql = "select name, pnumb, age, school, major, gpa, gpaidx, leeta, leetb,
          eng, engidx, schsub from userdb where id = '{$_GET['id']}'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_assoc($result);
          $rowindex2 = array($row['name'],$row['pnumb'],$row['age'],$row['school'],$row['major'],$row['gpa']."/".$row['gpaidx'],$row['leeta'],$row['leetb'],$row['eng']." - ".$row['engidx'], $row['schsub']);
          $rowindex1 = array('이름', '전화번호', '나이', '대학교', '전공','학점','언어점수','추리점수','영어','대학원,직장');
         ?>
         <table class="table" >
         <thead>
           <tr>
             <th>구분</th>
             <th>내용</th>
           </tr>
         </thead>
         <tbody>
          <?php
            {
              for($i = 0; $i<11; $i++){
              echo "<tr>";
                echo "<th>{$rowindex1[$i]}</th>";
                echo "<td>{$rowindex2[$i]}</td>";
              echo "</tr>";}
            }
           ?>
         </tbody>
       </table>


    </div><!-- /content -->

</div><!-- /page -->

</body>
</html>
