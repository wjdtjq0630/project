<?php
  include 'config.php';
  session_start();
  
    $user_id = $_POST['id'];
    $user_pw = $_POST['pw'];
    $user_name = $_POST['name'];
    $user_phonenumber = $_POST['phonenumber'];
    echo "아이디:".$user_id."<br>";
    echo "비밀번호:".$user_pw."<br>";
    echo "이름:".$user_name."<br>";
    echo "전화번호:".$user_phonenumber."<br>";
    $sql = "INSERT INTO user_info (user_id, user_pw, user_name, user_phn)
    VALUES ('$user_id','$user_pw','$user_name','$user_phonenumber')";
    //id1234 , pw1234 , 정섭, 01000001111
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    $newURL = './login.php';
     header('Location: '.$newURL);
  ?>
