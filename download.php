<meta charset="utf-8">


<?php

  include("config.php");
  // 파일 Path를 지정합니다.
  // id값등을 이용해 Database에서 찾아오거나 GET이나 POST등으로 가져와 주세요.
  if($_GET['id']==null){
  $sql = "select * from boarddb where `index` = '{$_GET['index']}'";

  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_assoc($result);


  $filePath = $row['file'];
  $file = "./downloads/".$filePath;
  $file_size = filesize($file);
  $filename = urlencode($filePath);
  // 접근경로 확인 (외부 링크를 막고 싶다면 포함해주세요)
}else{
  $sql = "select `userdb`.id, `userdb`.name, `userdb`.pNumber, b.nowW,
    b.w1file, b.w2file, b.w3file, b.w4file, b.w5file from
  userdb left join userprogress as B on userdb.id = B.id where userdb.id = '{$_GET['id']}'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_assoc($result);
  $w = "w".$_GET['index']."file";
  $filePath = $row[$w];
  $file = "./uploads/".$filePath;

  $file_size = filesize($file);
  $filename = urlencode($filePath);

}
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
    fclose($fp);}
  }


  if($_GET['id']==null){
  $target_url = "board.php?index={$_GET['index']}";}
  else{
    $target_url = "adminmain.php?date={$_GET['date']}";
  }
  header("Location: {$target_url}");

 ?>
