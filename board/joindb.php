<?php 
	include 'config.php';
	$id= mysqli_real_escape_string($conn, $_POST['join_id']);
	$pw= mysqli_real_escape_string($conn, $_POST['join_pw']);
	$name= mysqli_real_escape_string($conn, $_POST['join_name']);
	$phn= mysqli_real_escape_string($conn, $_POST['join_phn']);
	//echo $id.'<br>'.$pw.'<br>'.$name;
 	
 	$sql= "INSERT INTO data_board (user_id, user_pw, user_name, user_phn) VALUES ('$id', '$pw', '$name', '$phn')";
 	mysqli_query($conn, $sql);
   	mysqli_close($conn);
   	
   	$new_URL = "./list.php";
   	header('Location: '.$new_URL);
 ?>