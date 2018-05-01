<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: DevJS
 * Date: 2017-05-15
 * Time: 오후 7:21
 */
?>
<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>사업부 - 관리자</title>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/assets/css/materialize.css" media="screen,projection"/>
<link rel="stylesheet" href="/assets/css/common.css">
<link rel="stylesheet" href="/assets/css/formsStyle.css">
<!--<link rel="stylesheet" href="/assets/css/contents.css">-->
  <script type="text/javascript" src="/assets/js/jquery-1.9.1.min.js"></script>
<script src=" /assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
<script type="text/javascript" src="/assets/ckeditor/lang_.js"></script>
<script type="text/javascript" src="/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/assets/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="/assets/ckeditor/fileuploader.tapbbs.js"></script>
<script type="text/javascript" src="/assets/ckeditor/config_contents.js?t=EAPE"></script>
<?php
  if (isset($js_load)) {
    if (is_array($js_load)) {
      foreach ($js_load as $row) {
        ?>
        <script type="text/javascript" src="/assets/js/<?php echo $row; ?>"></script>
        <?php
      }
    }
  }  
?>
</head>
<body>
<header class="page-header z-depth-1 marginB50"><!-- light-blue lighten-1 -->
  <div class="container clearfix">
    <a href="/admin/board"><div class="logoW">관리자 페이지</div></a>
    <ul class="gnb">
		<li class="bar"><a href="/admin/board">공지사항</a></li>
		<li class="bar"><a href="/admin/inquiry_l">상담문의관리</a></li>
      <li class="bar"><a href="/admin/lecture_l">기업/대학 단체교육</a></li>
		<li class="bar"><a href="/admin/banner_l">메인 중앙 배너</a></li>
		<li class="bar"><a href="/admin/sub_v">기타 사이트 정보</a></li>
		<li class="bar"><a href="/admin/common">사업부 공통 공지사항</a></li>
	</ul>
   <!--<div><a href="/join/logout">로그아웃</a></div>-->
    <div class="AddressIP"><a href="/admin/manger_v" class="btn blue darken-2">관리자 정보수정</a></div>
  </div><!-- container -->
</header>
