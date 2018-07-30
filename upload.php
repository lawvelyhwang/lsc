<meta charset="utf-8">

<?php

include("config.php");
session_start();



// 설정
$uploads_dir = './uploads/files/';

$allowed_ext = array('hwp','doc','docx','txt','pdf');


	if(is_dir($uploads_dir)){

	}else {
		mkdir($uploads_dir);
	}



// 변수 정리
$error = $_FILES['upfile']['error'];
$name = $_FILES['upfile']['name'];
$ext = strtolower(array_pop(explode('.', $name)));

// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}

// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
	echo "허용되지 않는 확장자입니다.";
	exit;
}


if(empty($_FILES['upfile']['name'])){
	echo "<script>alert('파일 없습니다.');</script>";
	exit;
}

echo $_FILES['upfile']['name']."<br>";
echo $_FILES['upfile']['type']."<br>";
echo $_FILES['upfile']['size']."<br>";
echo $_FILES['upfile']['tmp_name']."<br>";
echo $_FILES['upfile']['error']."<br>";


// 파일 이동
move_uploaded_file( $_FILES['upfile']['tmp_name'], $uploads_dir.$_POST['date']."-".$_SESSION['login_user']."-".$_POST['step'].".".$ext);

echo "<script>alert('파일을 성공적으로 제출하였습니다.');</script>";
// 파일 정보 출력
/*echo "<h2>파일 정보</h2>
	<ul>
		<li>파일명: $name</li>
		<li>확장자: $ext</li>
		<li>파일형식: {$_FILES['myfile']['type']}</li>
		<li>파일크기: {$_FILES['myfile']['size']} 바이트</li>
	</ul>";
*/
	$target_url = "reserve.php";
 echo "<meta http-equiv='refresh' content='0;url={$target_url}'>";

	//header("Location: {$target_url}");

?>
