<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min.css">

    <title>회원가입</title>
    <style media="screen">
      label{
        margin-left: 10%;
      }
      tr{
        height:50px;
      }
      input{
        display: block;
width: 90%;
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
color: #555;
background-color: #fff;
background-image: none;
border: 1px solid #ccc;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
      }
    </style>
  </head>
  <body>
    <?php
    //echo "<script>alert('회원가입 기간이 아닙니다.');history.back();</script>";
     ?>
    <header>
      <div class="" align="center">
        <img src="./logo.png" style="width: 380px">
      </div>
    </header>
    <div class="jumbotron" style="width: 580px; margin-left:auto; margin-right:auto;margin-bottom: 50px;padding-top: 20px;padding-bottom: 0px;">
      <div class="container">
        <div>
          <form class="" action="./signinProcess.php" method="post">
          <table class="table" style="
          margin-left: 5%;
          margin-right: 5%; width: 90%;
          ">
            <tr>
              <td align="center" colspan="2"><h2>회원 가입 폼</h2></td>
            </tr>
            <tr>
              <td><label for="id">아이디* </label></td>
              <td><input type="text" name="id" required="required">
            </td>
            </tr>
            <tr>
              <td><label for="pwd">비밀번호*  </label></td>
              <td><input type="password" name="pwd" required="required"></td>
            </tr>
            <tr>
              <td><label for="name">이름*  </label></td>
              <td><input type="text" name="name" value="" required="required"></td>
            </tr>
            <tr>
              <td><label for="pNumber">전화번호*  </label></td>
              <td><input type="text" name="pNumber" required="required"></td>
            </tr>
            <tr>
              <td><label for="pNumber">나이*  </label></td>
              <td><input type="text" name="age" required="required"></td>
            </tr>            <tr>
              <td><label for="school">졸업대학교*  </label></td>
              <td><input type="text" name="school" required="required"></td>
            </tr>


            <tr>
              <td><label for="major">전공*  </label></td>
              <td><input type="text" name="major" required="required"></td>
            </tr>
            <tr>
              <td><label for="gpa">학점*  </label></td>
              <td><input type="text" name="gpa" required="required" style="width: 44%; display:inline;">
                <select class="form-control" name="gpaIndex" style="width: 44%; display:inline;">
                <option>4.5</option>
                <option>4.3</option>
                <option>4.0</option>
              </select></td>
            </tr>

            <tr>
              <td><label for="leetApure">리트언어개수*  </label></td>
              <td><input type="text" required="required" name="leetApure"></td>
            </tr>
            <tr>
              <td><label for="leetBpure">리트추리개수*  </label></td>
              <td><input type="text" required="required" name="leetBpure"></td>
            </tr>
            <tr>
              <td><label for="eng">영어*  </label></td>
              <td><input type="text" required="required" name="eng"style="width: 44%; display:inline;">
                <select class="form-control" name="engIndex"style="width: 44%; display:inline;">
                <option>toeic</option>
                <option>toefl</option>
                <option>teps</option>
              </select></td>
            </tr>
            <tr>
              <td><label for="schoolsub">대학원/직장 </label></td>
              <td><input type="text" name="schoolsub"></td>
            </tr>
            <tr align="center">
              <td colspan="2"><input type="submit" name="submit" style="width:30%;margin-top:20px;"><br></td>
            </tr>
            <tr align="center">
              <td colspan="2">
                <br>
              입력하신 정량 자료는 황변호사 개인만 관리하며,<br> 면접 종료시 파기하겠습니다.
              </td>
            </tr>
          </table>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
