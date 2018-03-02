<?php
	session_start();
	include 'config.php';
	$id = mysqli_real_escape_string($conn, $_GET['id']);
 	$sql = "SELECT * FROM writing_board WHERE id='$id'"; 

 	$result = mysqli_query($conn, $sql);
 	$row = mysqli_fetch_array($result);

 	$writer = $row['writer'];

	$sql = "DELETE FROM writing_board WHERE id='$id'"; //해당 게시물을 삭제
	$csql = "DELETE FROM comment_board WHERE bbs_id='$id'"; //해당 게시물의 댓글을 삭제
	?>
	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>

<?php
	 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name'])){
	 	echo '<script>alert("로그인 후 이용해주세요."); window.history.back();</script>';
	 } else if($_SESSION['user_id'] != $writer){
	 	echo '<script>alert("자신의 게시글만 삭제할 수 있습니다."); window.history.back();</script>';
	 } else if($_SESSION['user_id'] == $writer){
	 	mysqli_query($conn, $sql);
		mysqli_query($conn, $csql);
	 	echo '<script>alert("게시글이 삭제 되었습니다."); location.href="./list.php";</script>';
	 }

	?>
