<?php
  include 'config.php';

  $sql = "select * from user_info where id ='$login_id'";
  $res = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($res);

  $mypage_pw = $_POST['newpwd'];
  $mypage_pn = $_POST['newpn'];

  $pwsql = "update user_info set pwd='".$mypage_pw."' where id='".$row['id']."'";
  echo $pwsql;
  $pnsql = "";
  //mysqli_query($conn,$mpsql);
  //mysqli_close($conn);
 ?>
