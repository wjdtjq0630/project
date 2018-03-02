<?php
	session_start();
	include 'config.php';

	$page_list = 5; //한 페이지의 리스트 수
	$page_block = 10; //한 블록 당 페이지 수
	if(isset($_POST['searchtext'])){
		$searchtext = mysqli_real_escape_string($conn, $_POST['searchtext']);
		$sql = "SELECT * FROM writing_board WHERE title LIKE '%$searchtext%'";
	} else{
		$sql = "SELECT * FROM writing_board";
	}
 	$list_result = mysqli_query($conn, $sql);
	$total = mysqli_num_rows($list_result); //총 게시물 수
	$total_page = ceil($total/$page_list); //총 페이지 수

	if(empty($_GET['page']) || $_GET['page']<=0 ){
		$page=1; //페이지 값이 없을 경우 첫번째 페이지 값을 넘겨줌
	} else if($_GET['page']>$total_page){
		$page = $total_page;
	} else {
		$page = $_GET['page']; //페이지 값 받기
	}

	$block = ceil($page/$page_list); //현재 블록의 페이지 수
	$start_page = floor($block/$page_block)*$page_block+1; //현재 블록의 시작 페이지
	$end_page = min($start_page+$page_block-1,$total_page); //현재 블록의 마지막 페이지
	$prev_page = $page-1; //이전 페이지
	$next_page = $page+1; //다음 페이지
	$prev_block = $block-1; //이전 블록
	$next_block = $block+1; //다음 블록
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>검색결과-[<?php if(isset($_POST['searchtext'])){echo $_POST['searchtext'];}else{echo "   ";} ?>]</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="edit.css">
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
		<form method="post" action="search.php">
		<table id="list_result">
			<tr><td colspan="4">검색결과<input type="text" name="searchtext" id="search">
			<input type="submit" value="검색" class="loginbutton"></td></tr>
			<tr><th id="first">no</th><th id="second">title</th><th id="third">writer</th><th id="third">date</th></tr>
			<?php
				$start_limit = ($page-1)*$page_list;
				if(isset($_POST['searchtext'])){
					$sql = "SELECT * FROM writing_board WHERE title LIKE '%$searchtext%' ORDER BY id DESC LIMIT $start_limit, $page_list";
				} else{
					$sql = "SELECT * FROM writing_board ORDER BY id DESC LIMIT $start_limit, $page_list";
				}
				$list_result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($list_result)){
					$id = $row['id'];
					$title = htmlspecialchars($row['title']);
					$date = $row['date'];
					$writer = htmlspecialchars($row['writer']);
					echo '<tr><td>'.$id.'</td><td><a href="./content.php?id='.$id.'">'.$title.'</a></td><td>'.$writer.'</td><td>'.$date.'</td></tr>';
				}
			?>
			<tr><td class="last"><a href="./list.php" class="left">[홈]</a></td>
				<td colspan="2" class='last page'>
					<?php
						if($start_page>1){
							echo '<a href="./search.php">[처음]</a>';
						}
						if($end_page<$total_page){
							echo '<a href="./search.php?page='.$next_page.'">[다음]</a>';
						}
						for($count=$start_page; $count<=$end_page; $count++){
							if($count == $page){
								echo '<a href="./search.php?page='.$count.'"><b>'.$count.'</b></a>';
							}else{
								echo '<a href="./search.php?page='.$count.'">'.$count.'</a>';
							}
						}
					 ?>
				</td>
				<td class="last"><a href="./write.php" class="last">[글쓰기]</a></td></tr>
		</table>
		</form>
		<script src="jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
 		   $("#search").val("<?php echo htmlspecialchars($searchtext);?>");
 		});
		</script>
 </body>
 </html>
