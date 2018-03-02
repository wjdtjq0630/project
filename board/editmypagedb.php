<?php
	session_start();
	include 'config.php';

	$id = $_SESSION['user_id'];
	$pw = mysqli_real_escape_string($conn,$_POST['new_pw']);
	$name = mysqli_real_escape_string($conn,$_POST['new_name']);
	$phn = mysqli_real_escape_string($conn,$_POST['new_phn']);

	$sql = "UPDATE data_board SET user_pw='$pw' WHERE user_id='$id'";
	mysqli_query($conn, $sql);
	$sql = "UPDATE data_board SET user_name='$name' WHERE user_id='$id'";
	mysqli_query($conn, $sql);
	$sql = "UPDATE data_board SET user_phn='$phn' WHERE user_id='$id'";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	$_SESSION['user_name'] = $name;

	$URL = "./mypage.php";
	header('Location:'.$URL);

 ?>
