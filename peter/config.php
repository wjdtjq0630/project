<?php
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "qqwwee11";
  $db_name = "peter";

  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

  if(mysqli_connect_errno($conn)){
    echo "데이터베이스 연결 실패:".mysqli_connect_error();
  }
  ?>
