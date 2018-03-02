<!DOCTYPE html>
<html>
<head>
	<title>마이페이지</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
	<?php
		session_start();
		include 'config.php';

			if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
                echo '<h2>로그인</h2><input type="text" name="login_id" placeholder="아이디" minlength="1"><br>
				<input type="password" name="login_pw" placeholder="비밀번호" minlength="1">
				<input type="submit" value="로그인" class="loginbutton">
			 	<a href="./join.php">회원가입</a>';
            } else {
                $user_id = $_SESSION['user_id'];
                $user_name = $_SESSION['user_name'];
                echo "<p><strong>".$user_name."</strong>(".$user_id.")님<br> 환영합니다.<br>";
                echo "<a href=\"logout.php\">[로그아웃]</a><a href=\"./mypage.php\">[마이페이지]</a></p>";
            }
		 ?>
	<?php
	if(empty($user_id)){
		echo '<script>alert("로그인 후 이용해주세요"); window.history.back();</script>';
	} else if(isset($user_id) && isset($user_name)){
		$sql = "SELECT * FROM data_board WHERE user_id='$user_id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		echo '<h1>회원정보</h1>';
		echo "<ul><li>아이디:".$row['user_id']."</li>";
		echo "<li>이름:".$row['user_name']."</li>";
		echo "<li>전화번호:".$row['user_phn']."</li>";
		echo '<a href="./list.php">[글 목록]</a>';
		echo '<a href="./editmypage.php">[회원정보 수정하기]</a><br>';
		echo '<a id="leave" href="./leave.php">[*회원 탈퇴하기*]</a>';
	}
 ?>
</body>
</html>
