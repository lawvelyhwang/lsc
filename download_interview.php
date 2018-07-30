<meta charset="utf-8">


<?php

  include("config.php");
  session_start();
  // 파일 Path를 지정합니다.
  // id값등을 이용해 Database에서 찾아오거나 GET이나 POST등으로 가져와 주세요.
  $sql = "select * from interviewdb where `id` = '{$_SESSION['login_user']}'";

  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_assoc($result);

  $w="file".$_GET['week'];
  $filePath = $row[$w];
  $file = "./downloads/interview/".$filePath;
  $file_size = filesize($file);
  $filename = urlencode($filePath);
  // 접근경로 확인 (외부 링크를 막고 싶다면 포함해주세요)
// echo $sql."<br>".$w."<br>".$filePath."<br>".$file."<br>";
// var_dump(is_file($file));
  if (!eregi($_SERVER['HTTP_HOST'], $_SERVER['HTTP_REFERER']))
  {
  echo "<script>alert('외부 다운로드는 불가능합니다.');</script>";
  return;
  }
  if (is_file($file)) // 파일이 존재하면
  {
  // 파일 전송용 HTTP 헤더를 설정합니다.
  if(strstr($HTTP_USER_AGENT, "MSIE 5.5"))
  {
  header("Content-Type: doesn/matter");
  Header("Content-Length: ".$file_size);
  header("Content-Disposition:  attachment; filename=".$filename);
  header("Content-Transfer-Encoding: binary");
  header("Pragma: no-cache");
  header("Expires: 0");
  }
  else
  {
  Header("Content-type: file/unknown");
  Header("Content-Disposition: attachment; filename=".$filename);
  Header("Content-Transfer-Encoding: binary");
  Header("Content-Length: ".$file_size);
  Header("Content-Description: PHP3 Generated Data");
  header("Pragma: no-cache");
  header("Expires: 0");
  }

  //파일을 열어서, 전송합니다.
  $fp = fopen($file, "rb");
  if (!fpassthru($fp)){
  fclose($fp);
    }
    $target_url = "interview.php";
    header("Location: {$target_url}");

  }else{
    echo "<script>alert('파일이 없습니다.');history.back();</script>";
    exit;
  }


 ?>
