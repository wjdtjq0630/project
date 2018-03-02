<?php
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "qqwwee11";
  $db_name = "board";

  $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

  mysqli_query($conn, "set session character_set_connection=utf8;");
  mysqli_query($conn, "set session character_set_results=utf8;");
  mysqli_query($conn, "set session character_set_client=utf8;");

  if(mysqli_connect_errno($conn)){
    echo "데이터베이스 연결 실패:".mysqli_connect_error();
  }

  ?>
