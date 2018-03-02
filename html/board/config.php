<meta charset="utf-8">
<?php
  //호스팅 전용 config파일
  $db_host = "localhost";
  $db_user = "damn";
  $db_password = "wjdtjq0630!";
  $db_name = "damn";

  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

  if(mysqli_connect_errno($conn)){
    echo "데이터베이스 연결 실패:".mysqli_connect_error();
  }
?>
