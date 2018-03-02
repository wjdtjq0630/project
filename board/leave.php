<?php
	session_start();
	include 'config.php';

	$user_id = $_SESSION['user_id'];
 	if(empty($user_id)){
		echo '<script>alert("로그인 후 이용해주세요"); location.href="./list.php";</script>';
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>회원 탈퇴하기</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
	<?php
		echo '<form method="post" action="leavedb.php?id='.$user_id.'" onsubmit="return password();">';
	 ?>
		비밀번호: <input type="password" name="leavepw" id="pw">
		<input type="submit" value="탈퇴하기" class="loginbutton">
	</form>
</body>
</html>
