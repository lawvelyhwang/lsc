<?php
  include("head.php");
?>
    <div class="jumbotron" style="width: 580px; margin-left:auto; margin-right:auto;margin-bottom: 50px;padding-top: 20px;padding-bottom: 0px;">
      <div class="container">
        <div>
          <form class="" action="./questionProcess.php" method="post">
          <table class="table" style="
          margin-left: 5%;
          margin-right: 5%; width: 90%;
          ">
          <tr>
              <td align="center" colspan="2"><h2>기출 문제 입력란</h2></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
           <tr>
              <td><label for="school">학교  </label></td>
              <td><select class="form-control" name="school" style="width: 90%" required>
                <option value="">학교 선택</option>
                <option value="강원대">강원대</option>
                <option value="건국대">건국대</option>
                <option value="경북대">경북대</option>
                <option value="경희대">경희대</option>
                <option value="고대">고대</option>
                <option value="동아대">동아대</option>
                <option value="부산대">부산대</option>
                <option value="서강대">서강대</option>
                <option value="서울대">서울대</option>
                <option value="성대">성대</option>
                <option value="시립대">시립대</option>
                <option value="아주대">아주대</option>
                <option value="연대">연대</option>
                <option value="영남대">영남대</option>
                <option value="외대">외대</option>
                <option value="원광대">원광대</option>
                <option value="이대">이대</option>
                <option value="인하대">인하대</option>
                <option value="전남대">전남대</option>
                <option value="전북대">전북대</option>
                <option value="제주대">제주대</option>
                <option value="중앙대">중앙대</option>
                <option value="충남대">충남대</option>
                <option value="충북대">충북대</option>
                <option value="한대">한대</option>

              </select></td>
            </tr>
            <tr>
              <td><label for="type">군 종류  </label></td>
              <td><select class="form-control" name="type" style="width: 90%" required>
                <option value="">군 선택</option>
                <option value="가군 오전">가군 오전</option>
                <option value="가군 오후">가군 오후</option>
                <option value="나군 오전">나군 오전</option>
                <option value="나군 오후">나군 오후</option>
              </select></td>
            </tr>
             <tr>
                 
                  <td><label for="question">문제</label></td>
            <td>
 
    <textarea class="form-control" id="question" name="question" rows="20"></textarea>
  </td>
            <input type="hidden" name="id" value = "<?php echo $_SESSION['login_user'];?>">
             </tr>
               
              
            <tr align="center">
              <td colspan="2"><input type="submit" name="submit"  class = "btn btn-default" style="width:30%;margin-top:20px;"><br></td>
            </tr>
            <tr align="center">
              <td colspan="2">
                
              </td>
            </tr>
          </table>
          </form>
        </div>
      </div>
    </div>

<?php
  include("foot.php");
 ?>
