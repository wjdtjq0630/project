<?php
  include 'config.php';
  header("Content-type: text/html; charset=utf-8");

  if(!$num = $_GET['num']){
    echo '<script>alert("잘못된 접근입니다."); history.back();</script>';
  }

  $sql = "SELECT * from ftp WHERE id='$num'";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo "<p>query error</p>";
    exit;
  }
  $row = mysqli_fetch_array($result);

  $dir = "./files/";
  $filename = $row['name'];
  $filehash = $row['hash'];
  $filedown = $row['down'];
  if(file_exists($dir.$filehash)){
    header("Content-Type: Application/octet-stream");
    header("Content-Disposition: attachm;ent; filename=".$filename);
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($dir.$filehash));

    $fp = fopen($dir.$filehash, "rb");
    while(!feof($fp)){
      echo fread($fp, 1024);
    }
    fclose($fp);

    if($row['down'] == ""){
      $sql = "UPDATE ftp SET down='1' WHERE id='$id'";
      mysqli_query($conn, $sql);
    } else{
      $sql = "UPDATE ftp SET down=(down+1) WHERE id='$id';";
      mysqli_query($conn, $sql);
    }
    mysqli_close($conn);
  } else{
    echo "<script>alert('파일이 존재하지 않습니다.'); history.back();</script>";
  }

 ?>
