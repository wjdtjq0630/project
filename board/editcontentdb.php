<?php
  include 'config.php';

  $newtitle = mysqli_real_escape_string($conn, $_POST['newtitle']);
  $newcontent = mysqli_real_escape_string($conn, $_POST['newcontent']);
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $sql = "UPDATE data_board SET title='$newtitle' WHERE id='$id'";
  mysqli_query($conn, $sql);

  $sql = "UPDATE data_board SET content='$newcontent' WHERE id='$id'";
  mysqli_query($conn, $sql);

  mysqli_close($conn);

  $newURL ='./content.php?id='.$id;
  header('Location:'.$newURL);
 ?>
