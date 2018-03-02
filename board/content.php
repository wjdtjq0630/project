<?php
	session_start();
	include 'config.php';

	$id = mysqli_real_escape_string($conn, $_GET['id']);
 	$sql = "SELECT * FROM writing_board WHERE id='$id'";
 	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$date = date("Y-m-d");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php
 		echo '<title>게시글 - '.htmlspecialchars($row['title']).'</title>';
 	 ?>
	 <meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="edit.css">
	 <script src="jquery-3.2.1.min.js"></script>
 </head>
 <body>
		<form class="loginform" action="logindb.php" method="post">
		<?php
			if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
                echo '<h2>로그인</h2><input type="text" name="login_id" placeholder="아이디" minlength="1">
				<input type="password" name="login_pw" placeholder="비밀번호" minlength="1">
				<input type="submit" value="로그인" class="loginbutton">
			 	<a href="./join.php">[회원가입]</a>';
            } else {
                $user_id = $_SESSION['user_id'];
                $user_name = $_SESSION['user_name'];
                echo "<p><strong>$user_name</strong>($user_id)님<br> 환영합니다.<br>";
                echo "<a href=\"logout.php\">[로그아웃]</a><a href=\"./mypage.php\">[마이페이지]</a></p>";
            }
		 ?>
	</form>
	<div class="content">
		<form method="post" action="search.php">
 		<h2>게시글</h2>
 		<input type="text" name="searchtext" id="search">
			<input type="submit" value="검색" class="loginbutton">
 		</form>
 	<?php
 		echo '<h1>'.htmlspecialchars($row['title']).'</h1>';
 		echo '<span>작성일:'.$row['date'].'<br>작성자:'.htmlspecialchars($row['writer']).'</span><br><p>'.str_replace("\n", "<br>", htmlspecialchars($row['content'])).'</p>';
 	 ?>
	 <div id="bar">
 	 <a href="./list.php" class="left">[홈]</a>
 	 <?php
 	 	echo '<a href="./deletedb.php?id='.$row['id'].'" class="right">[삭제하기]</a>';
 	 	echo '<a href="./editcontent.php?id='.$row['id'].'" class="right">[수정하기]</a>';
 	 ?>
	 </div>
	 <form action="commentdb.php?id=<?php echo $id; ?>" method="post" onsubmit="return com();">
		 <table class="write_comment">
		 <tr>
			 <?php if(isset($_SESSION['user_id'])){
				 echo '<td class="cwriter" rowspan="2"><input type="hidden" name="bbs_id" value="'.$id.'"><input type="hidden" name="cwriter" value="'.$_SESSION['user_id'].'">';
				 echo '<b>'.$_SESSION['user_id'].'</b></td>';
			 } else{
				 echo '<td class="cwriter" rowspan="2">로그인 후 이용</td>';
			 } ?><td class="cdate"><input type="hidden" name="cdate" value="<?php echo $date; ?>"></td>
		 </tr>
		 <tr>
			 <td><textarea name="comment" rows="3" cols="80" minlength="5"></textarea><input type="submit" value="등록" class="submit_comment"></td>
		 </tr>
		</table>
	 </form>
	 <?php
 		$sql ="SELECT * FROM comment_board WHERE bbs_id=$id ORDER BY id DESC";
		$result = mysqli_query($conn, $sql);
		while($crow = mysqli_fetch_array($result)){
			$name = htmlspecialchars($crow['name']);
			$date = htmlspecialchars($crow['wdate']);
			$comment = htmlspecialchars($crow['comment']);
			echo "<table class=\"comment\">
				 <tr>
					 <td class=\"cwriter\" rowspan=\"2\">".$name."</td><td class=\"cdate\">".$date."</td>
				 </tr>
				 <tr>
					 <td>".$comment."</td>
				 </tr>
				</table>";
			}
		?>
 	 </div>
 </body>
 </html>
