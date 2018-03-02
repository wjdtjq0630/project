<?php
  session_start();
  include 'config.php';

  if(empty($_SESSION['admin'])){
    echo '<script>alert("로그인 후 이용가능.");location.href="./login.php"</script>';
  }else{
    $page = $_POST['page'];
    $newpagename =  $_POST['newpagename'];
    $newpagecontent = $_POST['newpagecontent'];
    $sql = "UPDATE page SET page='$newpagename',content='$newpagecontent' WHERE page='$page'";
    if($result = mysqli_query($conn, $sql)){
      echo '<script>alert("변경완료"); location.href="./index.php";</script>';
    }else{
      echo '<script>alert("query error"); location.href="./admin.php";</script>';
    }
  }
 ?>
