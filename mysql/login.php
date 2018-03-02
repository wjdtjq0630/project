<?php
  session_start();
  session_destroy();
  include 'session.php';

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
  </head>
  <body>
    <form action="logindb.php" method="post">
      <input type="text" name="login_id" placeholder="아이디">
      <input type="password" name="login_pw" placeholder="비밀번호">
      <input type="submit" value="login">
    </form>
  </body>
</html>
