<?php
  include 'config.php';

  $sql = "SELECT * FROM ftp";
  $result = mysqli_query($conn, $sql);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>파일 전송</title>
    <style media="screen">
      td{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <table border='1' align="center">
      <thead>
        <tr>
          <th>ID</th><th>FILE</th><th>TIME</th><th>DOWN</th><th>DEL</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_array($result)){
            $id = $row['id'];
            $name = $row['name'];
            $time = $row['time'];
            if($row['down'] == ""){
              $down = 0;
            } else{
              $down = $row['down'];
            }
             echo '<tr><td>'.$id.'</td><td><a href="./download.php?num='.$id.'">'.$name.'</a></td><td>'.$time.'</td><td>'.$down.'</td><td><a href="./delete.php?num='.$id.'">DEL</a></td>';
          }
          mysqli_close($conn);
         ?>
      </tbody>
    </table><p>
    <form align="center" action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" value="업로드">
    </form>
  </body>
</html>
