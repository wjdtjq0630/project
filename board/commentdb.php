<?php
  session_start();
  include 'config.php';

  if(empty($_SESSION['user_id'])){
    echo '<script>alert("로그인 후에 댓글을 작성할 수 있습니다..");';
    echo 'window.history.back();</script>';
  }
  $bbs_id = mysqli_real_escape_string($conn, $_POST['bbs_id']); //해당 게시물의 id값
  $writer = mysqli_real_escape_string($conn, $_POST['cwriter']); //댓글 작성자의 아이디
  $comment = mysqli_real_escape_string($conn, $_POST['comment']); //댓글 내용
  $date = mysqli_real_escape_string($conn, $_POST['cdate']); //댓글 작성 날짜
  $id = $_GET['id'];
  if(strlen($comment)<5){
    echo "<script>alert('5글자 이상 입력하세요.'); history.back();</script>";
  }else{
    $sql = "INSERT INTO comment_board (bbs_id, name, comment, wdate) VALUES ('$bbs_id', '$writer', '$comment', '$date')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    $URL = "./content.php?id=$id";
    header('Location:'.$URL);
  }
 ?>
