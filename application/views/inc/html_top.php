<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta property="og:type" content="website">
	<link rel="SHORTCUT ICON" href="/favicon.ico">
	<meta name="ROBOTS" content="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!-- <link rel="stylesheet" href="/assets/css/nanumbarungothic.css" /> -->
	<script src="/assets/js/jquery-1.9.1.min.js"></script>
	<script src="/assets/js/jquery-ui.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css"/>
	<!-- <script src="/assets/js/responsive-nav.js"></script> -->
	<!-- <script src="/assets/js/responsive-campus.js"></script> -->
	<script src="/assets/js/gnb.js"></script>
	<script src="/assets/js/swiper.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/style_reset.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/css/header.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/css/footer.css"/>
	<link rel="stylesheet" type="text/css" href="/assets/css/quick.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/sub/subTitle.css" />
	<title><?=$sub->s_title; ?></title>

    <!--<link rel="canonical" href="http://<%=site_host%>/" />-->
    <script src="/assets/js/jquery.slides.js"></script>
    <script src="/assets/js/jquery.bxslider.js"></script>
    <script src="/assets/js/rwd_main.js"></script>
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
  if (isset($css_load)) {
    if (is_array($css_load)) {
      foreach ($css_load as $row) {
        ?>
        <link type="text/css" rel="stylesheet" href="/assets/css/<?php echo $row; ?>" media="screen,projection"/>
        <?php
      }
    }
  }
  ?>
</head>