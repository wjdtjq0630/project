<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
    <script src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="join.js"></script>
  </head>
  <body>
    <form class="" action="db.php" method="post">
      <input type="text" name="id" id="joinid" placeholder="아이디"  min="5" max="18">
      <input type="password" name="pw" id="joinpw" placeholder="비밀번호" min="6" max="21">
      <input type="text" name="name" id="joinnm" placeholder="이름" min="2" max="5">
      <input type="text" name="phonenumber" id="joinphn" placeholder="연락처" min="10" max="11">
      <input type="submit" value="join">
    </form>
  </body>
</html>
