<?php
  include 'config.php';
  session_start();

  $sql = "select * from user_info where id ='".$_SESSION['user_id']."'";
  $res = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($res);

  $mypage_pw = $_POST['newpwd'];
  $mypage_phn = $_POST['newpn'];

  // if(gettype($mypage_pw) == NULL || gettype($mypage_pw) == integer) || gettype($mypage_phn) == NULL || gettype($mypage_phn) != integer{
  //   echo '<script>var qwe = prompt("비밀번호 또는 전화번호를 다시 입력해주세요."); if(qwe == true){location.replace("./editmpg.php");</script>';
  // }

  $pwsql = "update user_info set user_pw='".$mypage_pw."' where user_id='".$_SESSION['user_id']."'";
  $phnsql = "update user_info set user_phn='".$mypage_phn."' where user_id='".$_SESSION['user_id']."'";

  mysqli_query($conn,$pwsql);
  mysqli_query($conn,$phnsql);
  mysqli_close($conn);

  echo '<script>alert("회원정보 수정이 완료 되었습니다.");location.replace("./login.php");</script>';

 ?>
