<?php
require("../config.php");
 ?>

<!DOCTYPE html>
<html>
    <head>
    <title>Special Essay List</title>
    <meta charset="utf-8">
        <!-- 모바일 디바이스를 위한 설정 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- jQuery mobile에서 사용하는 css, javascript. 아래 3개의 리소스를 로드해야 함 -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
    <link rel="stylesheet" href="../bootstrap.css">
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body>

<!-- data-role는 jQuery mobile에서 해당 엘리먼트가 어떤 UI인지를 지정한다. 아래 page는 이 엘리먼트가 가장 큰 단위인 페이지임을 의미한다. -->
<div data-role="page">
        <!-- 제목과 글로벌 메뉴를 표시하는 엘리먼트를 지정 -->
    <div data-role="header">

        <h1 style="font-size: larger;">Lawvely Hwang</h1>
    </div><!-- /header -->
<?php date_default_timezone_set('Asia/Seoul'); ?>
