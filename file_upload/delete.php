<?php
  error_reporting(0);
  include 'config.php';

  if(!$num = $_GET['num']){
    echo '<script>alert("잘못된 접근입니다.")</script>';
  }
  $sql = "SELECT * FROM ftp WHERE id='$num'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $dir = "./files/";
  $sql = "DELETE FROM ftp WHERE id='$num'";
  $result = mysqli_query($conn, $sql);
  if(!$result || !unlink($dir.$row['hash'])){
       echo "<p>delete error</p>";
       echo "<a href='./index.php'>파일 목록</a>";
  } else{
    echo "<p>파일 삭제 성공</p>";
    echo "<a href='./index.php'>파일 목록</a>";
  }
  mysqli_close($conn);
 ?>
