<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>회원정보 수정하기</title>
  </head>
  <body>
    <form action="mpgdb.php" method="post">
      <input type="password" name="newpwd" placeholder="새로운 비밀번호">
      <input type="text" name="newpn" placeholder="새로운 전화번호">
      <input type="submit" value="수정하기">
    </form>
  </body>
</html>
