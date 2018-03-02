<?php
	session_start();
	include 'config.php';

	if(empty($_SESSION['user_id']) || empty($_SESSION['user_name'])){
		echo '<script>alert("로그인 후 이용해주세요."); location.href="./list.php";</script>';
	}
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM data_board WHERE user_id='$user_id'";
	$result = mysqli_query($conn, $sql);
 	$row = mysqli_fetch_array($result);
 	$pw = $row['user_pw'];
 	$name = $row['user_name'];
 	$phn = $row['user_phn'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>회원정보 수정하기</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="edit.css">
 </head>
 <body>
 	<form method="post" action="editmypagedb.php" onsubmit="return required();">
		비밀번호:<input type="password" name="new_pw" id="new_pw" placeholder="비밀번호" minlength="8"><br>
		이름:<input type="text" name="new_name" id="new_name" placeholder="이름" minlength="2"><br>
		전화번호:<input type="text" name="new_phn" id="new_phn" placeholder="전화번호" minlength="9"><br>
		<input type="submit" value="수정하기" class="loginbutton">
		<a href="./mypage.php">취소하기</a>
 	</form>
 	<script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
 		   $("#new_pw").val("<?php echo $pw;?>");
 		   $("#new_name").val("<?php echo $name;?>");
 		   $("#new_phn").val("<?php echo $phn;?>");
 		});
		function required(){
 			var new_pw = $("input[name=new_pw]").val();
 			var new_name = $("input[name=new_name]").val();
 			var new_phn = $("input[name=new_phn]").val();
 			if(new_pw == ""){
 				alert('비밀번호를 입력하세요');
 				return false;
 			} else if(new_name == ""){
 				alert('이름을 입력하세요');
 				return false;
 			} else if(new_phn == ""){
 				alert('전화번호를 입력하세요');
 				return false;
 			} else{
 				alert('수정 완료');
 				return true;
 			}
 		}
	</script>
 </body>
 </html>
