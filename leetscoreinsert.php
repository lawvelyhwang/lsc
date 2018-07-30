<?php
  include("head.php");
?>

<div class="jumbotron" style="width: 580px; margin-left:auto; margin-right:auto;margin-bottom: 50px;padding-top: 20px;padding-bottom: 0px;">
  <div class="container">
    <div>
      <form class="" action="./leetscoreprogress.php" method="post">
      <table class="table" style="
      margin-left: 5%;
      margin-right: 5%; width: 90%;
      ">
        <tr>
          <td align="center" colspan="2"><h2>리트 성적 입력 폼</h2></td>
        </tr>
        <tr>
          <td><label for="leetAscore">언어 표점</label></td>
          <td><input type="text" name="leetAscore" required="required">
        </td>
        </tr>
        <tr>
          <td><label for="leetAPscore">언어 백분위 </label></td>
          <td><input type="text" name="leetAPscore" required="required"></td>
        </tr>
        <tr>
          <td><label for="leetBscore">추리 표점 </label></td>
          <td><input type="text" name="leetBscore" value="" required="required"></td>
        </tr>
        <tr>
          <td><label for="leetBPscore">추리 백분위  </label></td>
          <td><input type="text" name="leetBPscore" required="required"></td>
        </tr>
        <tr align="center">
          <td colspan="2">
          입력하신 정량 자료는 황변호사 개인만 관리하며,<br> 면접 종료시 파기하겠습니다.
          </td>
        </tr>
        <tr align="center">
          <td colspan="2"><input type="submit" name="submit" style="width:30%;margin-top:20px;" class='form-control'><br></td>
        </tr>
      </table>
      </form>
    </div>
  </div>
</div>


<?php
  include("foot.php");
 ?>
