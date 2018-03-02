<?php
  include 'config.php';
  session_start();

  if(isset($_SESSION['admin'])){
    echo '<script>alert("이미 로그인 하셨습니다.");location.href="./admin.php"</script>';
  }else{
    $log_id = $_POST['log_id'];
    $log_pw = $_POST['log_pw'];
    $sql = "SELECT * FROM admin WHERE id='$log_id'";
    if(!$result = mysqli_query($conn, $sql)){
      echo '<script>alert("존재하지 않는 아이디"); history.back();</script>';
    }
    $row = mysqli_fetch_array($result);
     if($row['pw'] != $log_pw){
      echo '<script>alert("로그인 실패"); history.back();</script>';
    }else{
      $_SESSION['admin'] = $row['nm'];
      echo '<script>alert("로그인 성공"); location.href="./admin.php";</script>';
    }
  }
?>
