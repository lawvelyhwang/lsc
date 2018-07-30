<?php
  include("head.php");
  $result = getResult("interviewdb","id",$_SESSION['login_user']);
  $row = mysqli_fetch_assoc($result);
?>

<div style="text-align: center;">
  <h2>면접 영상</h2>
  <br>
  <table class="table"  style="width: 80%; align: center; margin-right: auto; margin-left: auto;">
    <tr>
      <td>회차</td>
      <td>내용</td>
      <td>날짜</td>
      <td>다운로드</td>

    </tr>
    <tr>
      <td></td>
      <td>면접 영상 폴더</td>
      <td>-</td>
      <td><?php if($row['file1']!=''){
        echo "<a href=\"{$row['file1']}\">다운로드</a>";
      }else{echo "없음";}
       ?></td>
    </tr>
    <tr>
      <td colspan="4">
        <br>
        비밀번호는 'lawvely' 입니다.<br><br>
        동영상 보는 방법<br>
        1. zip 파일을 다운로드 한다.<br>
        2. 압축을 해제 한 뒤 txt 확장자를 mp4 확장자로 변환하여 실행한다.
      </td>
    </tr>
  </table>
</div>

  <?php
  include("foot.php");
 ?>
