<?php
	session_start();
 	include 'config.php';

	$page_list = 5; //한 페이지의 리스트 수
	$page_block = 10; //한 블록 당 페이지 수
	$sql = 'SELECT * FROM writing_board';
	if($result = mysqli_query($conn, $sql)){
		$total = mysqli_num_rows($result); //총 게시물 수
	} else{
		$total = 0; //게시물이 존재하지 않을 경우 총 게시물 수를 0으로 설정.
	}
	$total_page =  ceil($total/$page_list); //총 페이지 수

	if(empty($_GET['page']) || $_GET['page']<=0 ){
		$page=1; //페이지 값이 없을 경우 첫번째 페이지 값을 넘겨줌
	} else if($_GET['page']>$total_page){
		$page = $total_page;
	} else {
		$page = $_GET['page']; //페이지 값 받기
	}
	$block = ceil($total/$page_list); //현재 블록의 페이지 수
	if($page%$page_block == 0){
		$start_page = floor($page/$page_block)*$page_block+1-10; //현재 페이지가 10의 배수일 경우 시작 페이지
	} else{
		$start_page = floor($page/$page_block)*$page_block+1; //현재 페이지가 10의 배수가 아닐 경우 시작 페이지
	}
	$end_page = min($start_page+$page_block-1,$total_page); //현재 블록의 마지막 페이지
	$prev_page = $page-1; //이전 페이지
	$next_page = $page+1; //다음 페이지
	$prev_block = $block-1; //이전 블록
	$next_block = $block+1; //다음 블록
	?>
<!DOCTYPE html>
<html>
<head>
	<title>글 목록</title>
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
                echo "<p><strong>$user_name</strong>($user_id)님<br> 환영합니다.";
                echo "<a href=\"logout.php\">[로그아웃]</a><a href=\"./mypage.php\">[마이페이지]</a></p>";
            }
		 ?>
	</form>
		<form method="post" action="search.php">
		<h2>자유게시판</h2>
		<table id="list_result">
			<tr><td colspan="3" class="firstrow"><input type="text" name="searchtext">
			<input type="submit" value="검색" class="loginbutton"></td></tr>
			<tr><th id="first">no</th><th id="second">title</th><th id="third">writer</th><th id="third">date</th></tr>
			<?php
				$start_limit = ($page-1)*$page_list;
				$sql = "SELECT * FROM writing_board ORDER BY id DESC LIMIT $start_limit, $page_list";
				if($list_result = mysqli_query($conn, $sql)){
					while($row = mysqli_fetch_array($list_result)){
						$id = $row['id'];
						$title = htmlspecialchars($row['title']);
						$date = $row['date'];
						$writer = htmlspecialchars($row['writer']);
						echo '<tr><td>'.$id.'</td><td><a href="./content.php?id='.$id.'">'.$title.'</a></td><td>'.$writer.'</td><td>'.$date.'</td></tr>';
					}
				}
			?>
			<tr><td class="last"><a href="./list.php" class="left">[홈]</a></td>
				<td colspan="2" class='last page'>
					<?php
						if($start_page>1){
							echo '<a href="./list.php">[처음]</a>';
						}
						if($end_page<$total_page){
							echo '<a href="./list.php?page='.$next_page.'">[다음]</a>';
						}
						for($count=$start_page; $count<=$end_page; $count++){
							if($count == $page){
								echo '<a href="./list.php?page='.$count.'"><b>'.$count.'</b></a>';
							}else{
								echo '<a href="./list.php?page='.$count.'">'.$count.'</a>';
							}
						}
					 ?>
				</td>
				<td class="last"><a href="./write.php" class="last">[글쓰기]</a></td></tr>
		</table>
		</form>
</body>
</html>
