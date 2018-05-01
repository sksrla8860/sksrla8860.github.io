<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: DevJS
 * Date: 2017-05-15
 * Time: 오후 4:52
 */
?>

<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>그린컴퓨터아트학원</title>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script type="text/javascript" src="/assets/js/jquery-1.9.1.min.js"></script>
  <?php
  if (isset($css_load)) {
    if (is_array($css_load)) {foreach ($css_load as $row) {
      ?>
      <link type="text/css" rel="stylesheet" href="/assets/css/<?php echo $row; ?>" media="screen,projection"/>
      <?php
    }
    }
  }
  ?></head>
<body>
<div class="backgroundBox">
  <?php
  $attributes = array('class' => 'form-horizontal', 'id' => 'auth_login');
  echo form_open('/join/login', $attributes);
  ?>
  <fieldset>
    <legend>로그인</legend>
    <div class="loginBox">
      <h1 class="logo">그린컴퓨터아트학원</h1>
      <div class="controls">
        <p class="help-block"><?php echo validation_errors(); ?></p>
      </div>
      <div><input type="text" id="m_id" name="m_id" placeholder="아이디"/></div>
      <div><input type="password" id="m_password" name="m_password" placeholder="비밀번호"></div>
      <button type="submit" class="cyan btn">로그인</button>
    </div><!-- loginBox -->
  </fieldset>
  </form>
</div>
<script type="text/javascript">
  $("#auth_login").submit(function () {
    if (!$("#m_id").val()) {
      alert('아이디를 입력해주세요.');
      return false;
    }
    if (!$("#m_password").val()) {
      alert("비밀번호를 입력해주세요.");
      return false;
    }
  });
</script>
</body>
</html>

