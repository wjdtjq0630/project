<?php
    include 'config.php';
    session_start();

    $login_id = $_POST['login_id'];
    $login_pw = $_POST['login_pw'];
    $sql = "select * from user_info where user_id ='$login_id'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    if($row != null){
      if($login_id == $row['user_id']){
        if($login_pw == $row['user_pw']){
          echo $row['user_name'].'님 안녕하세요</p>';
          echo '<a href="./logout.php">로그아웃 하기</a>';
          echo "<ul><li>아이디:".$row['user_id']."</li>";
          echo "<li>비밀번호:".$row['user_pw']."</li>";
          echo "<li>이름:".$row['user_name']."</li>";
          echo "<li>전화번호:".$row['user_phn']."</li>";
          echo '<li><a href="./editmpg.php">수정하기</a></li></ul>';
          echo '<a href="./freeboard.php">자유게시판</a>';
          $_SESSION['user_id'] = $login_id;
          $_SESSION['user_pw'] = $login_pw;
        }
        else{
          echo '<script>var logerrmsg = confirm("비밀번호를 잘못 입력하셨습니다.");
          if(logerrmsg == true){location.replace("./login.php");}</script>';
        }
      }
    }
    else{
      echo '<script>var logerrmsg = confirm("아이디를 잘못 입력하셨습니다.");
      if(logerrmsg == true){location.replace("./login.php");}</script>';
    }
  ?>
