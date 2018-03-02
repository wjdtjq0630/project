<!DOCTYPE html>
<html>
<head>
	<title>회원가입</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
	<form method="post" action="joindb.php" class="joinform" onsubmit="return required();">
		<h2>회원가입</h2>
		<input type="text" name="join_id" placeholder="아이디" minlength="8"><br>
		<input type="password" name="join_pw" placeholder="비밀번호" minlength="8"><br>
		<input type="text" name="join_name" placeholder="이름" minlength="2"><br>
		<input type="text" name="join_phn" placeholder="전화번호" minlength="9"><br>
		<input type="submit" value="가입하기" class="loginbutton">
		<a href="./list.php">취소하기</a>
	</form>
	<script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		function required(){
 			var join_id = $("input[name=join_id]").val();
 			var join_pw = $("textarea[name=join_pw]").val();
 			var join_name = $("input[name=join_name]").val();
 			var join_phn = $("input[name=join_phn]").val();
 			if(join_id == ""){
 				alert('아이디를 입력하세요!');
 				return false;
 			} else if(join_pw == ""){
 				alert('비밀번호를 입력하세요!');
 				return false;
 			} else if(join_name == ""){
 				alert('이름을 입력하세요!');
 				return false;
 			} else if(join_phn == ""){
 				alert('전화번호를 입력하세요!');
 				return false;
 			} else{
 				alert('가입 완료!');
 				return true;
 			}

 		}
	</script>
</body>
</html>
