<?php
	session_start();
	include 'config.php';

	$sql = 'SELECT * FROM writing_board WHERE id='.$_GET['id'];
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($res);
	$id = $row['id'];
	$title = $row['title'];
	$content = $row['content'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
	 <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="edit.css">
 	<?php
 		echo '<title>게시글 수정하기 - '.$title.'</title>';
 	 ?>
 	 <script src="jquery-3.2.1.min.js"></script>
 	 <?php
 	 	if(empty($_SESSION['user_id']) || empty($_SESSION['user_name'])){
 	 		echo '<script>
 	 		$(document).ready(function(){
 				alert("로그인 후 이용해주세요.");
				window.history.back();
			});</script>';
 	 	} else if($_SESSION['user_id'] == $row['writer']){
 	 		echo '<script>
 	 		$(document).ready(function(){
 				$("section").show();
 			});</script>';
 	 	} else{
 	 		echo '<script>alert("자신의 글만 수정 가능합니다."); window.history.back();</script>';
 	 	}
 	  ?>
 </head>
 <body>
 	<section>
 	 <form action="editcontentdb.php" id="newwriteform" method="post" onsubmit="return required();">
 	 	<?php
 	 		echo '<input type="hidden" name="id" value="'.$id.'">';
 	 	 ?>
 	 	제목:<br>
 	 	<input type="text" id="newtitle" name="newtitle" minlength="5"><br>
 	 	내용:<br>
 	 	<textarea form="newwriteform" id="newcontent" name="newcontent" cols="50" rows="10" minlength="3" maxlength="100"></textarea><br>
 	 	<input type="submit" value="수정하기">
 	 	<?php
 	 	    echo '<a href="./content.php?id='.$id.'">취소하기</a>';
 	 	 ?>
 	 </form>
 	 </section>
	 <script type="text/javascript">
	 $(document).ready(function(){
			$("#newtitle").val("<?php echo $title;?>");
			$("#newcontent").html("<?php echo $content;?>");
	 });
	 function required(){
		 var title= $("input[name=newtitle]").val();
		 var content= $("textarea[name=newcontent]").val();

		 if(title == ""){
			 alert('제목을 입력하세요.');
			 return false;
		 } else if(content == ""){
			 alert('내용을 입력하세요');
			 return false;
		 } else{
			 alert('수정 완료');
			 return true;
		 }
	 }
</script>
 </body>
 </html>
