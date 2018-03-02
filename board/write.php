 <!DOCTYPE html>
 <html>
 <head>
 	<title>글쓰기</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="edit.css">
 	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
 </head>
 <body>
 	<?php
 		session_start();

 		if(empty($_SESSION['user_id'])){
 			echo '<script>alert("로그인 후 이용해주세요"); window.history.back();</script>';
 		}
 	 ?>
 	<form action="writedb.php" method="post" id="writeform" onsubmit='return required();'>
 		<h2>게시글 작성하기</h2>
 		<?php echo '<input type="hidden" name="date" value="'.date("Y-m-d").'">';
 			  echo '<input type="hidden" name="writer" value="'.$_SESSION['user_id'].'">';
 			?>
 		title: <br><input type="text" name="title" minlength="5" maxlength="20"><br>
 		content: <br><textarea name="content" cols="50" rows="10" minlength="1" maxlength="100" form="writeform"></textarea><br>
 			<input type="submit" value="글 올리기" class="loginbutton">
 		<a href="./list.php">[취소하기]</a>
 	</form>
 	 <script type="text/javascript">
 		function required(){
 			var title= $("input[name=title]").val();
 			var content= $("textarea[name=content]").val();
 			var pw= $("input[name=pw]").val();

 			if(title == ""){
 				alert('제목을 입력하세요.');
 				return false;
 			} else if(content == ""){
 				alert('내용을 입력하세요');
 				return false;
 			} else if(pw == ""){
 				alert('비밀번호를 입력하세요');
 				return false;
 			} else{
        alert("POST");
        return true;
 			}

 		}
 	</script>
 </body>
 </html>
