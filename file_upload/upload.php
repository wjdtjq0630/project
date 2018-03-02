<?php
  include 'config.php';

  if(empty($_FILES['file']['name'])){
    echo '<script>alert("파일이 입력되지 않았습니다."); history.back();</script>';
    exit;
    if(strlen($_FILES['file']['name'])>255){
      echo '<script>alert("파일 이름이 너무 깁니다."); history.back();</script>';
    }
  }

  $date = date("Y-m-d H:i:s", time()); //현재 날짜,시간
  $dir = "./files/"; //파일 경로 앞부분
  $file_hash = $date.$_FILES['file']['name']; //해시 파일을 만들기 위한 날짜와 파일 이름
  $file_hash = md5($file_hash); //위에서 구한 정보로 해시 파일을 만듦
  $upfile = $dir.$file_hash; //만들어진 해시 파일의 경로
  $file_name = $_FILES['file']['name']; //파일의 이름
  if(is_uploaded_file($_FILES['file']['tmp_name'])){ //서버에 파일이 업로드 되었는지 확인
    if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile)){ //서버에 업로드된 파일을 $upfile로 이동시킨다.
      echo "<p>upload error</p>";
      exit;
    }
  }

  $sql = "INSERT INTO ftp (name, hash, time) VALUES ('$file_name','$file_hash','$date')"; //파일의 이름,해시값,날짜를 삽입
  if(!$result = mysqli_query($conn, $sql)){
    echo "<p>DB upload error</p>";
    exit;
} else{
  echo "<script>alert('업로드 성공'); location.href='./index.php';</script>";
  exit;
}
 ?>
