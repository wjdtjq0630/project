<?php
	session_start();
	include 'config.php';

	$user_id = $_SESSION['user_id'];
 	$user_name = $_SESSION['user_name'];

 	 if(empty($user_id) || empty($user_name)){
		echo '<script>alert("로그인 후 이용해주세요"); location.href="./list.php";</script>';
	} else {
 		$user_id = $_GET['id'];
 		$sql = "SELECT * FROM data_board WHERE user_id = '$user_id'";
 		$result = mysqli_query($conn, $sql);
 		$row = mysqli_fetch_array($result);
 		$user_pw = $row['user_pw'];
 	}
 	$pw = $_POST['leavepw'];
 	if($pw == $user_pw){
		$sql = "DELETE FROM data_board WHERE user_id='$user_id'";
 		mysqli_query($conn, $sql);
		$sql = "DELETE FROM writing_board WHERE writer='$user_id'";
		mysqli_query($conn, $sql);
 		mysqli_close($conn);
 		session_destroy();
 		echo '<script>alert("탈퇴 완료."); location.href="./list.php";</script>';
 	} else{
 		echo '<script>alert("비밀번호가 일치하지 않습니다."); window.history.back();</script>';
 	}
 ?>
