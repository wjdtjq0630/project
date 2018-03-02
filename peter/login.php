<?php
  include 'config.php';
  session_start();
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if(isset($_SESSION['admin'])){
        echo '<script>location.href="./admin.php"</script>';
      }else{
        echo '<form action="logindb.php" method="post">
          <input type="text" name="log_id"><br>
          <input type="password" name="log_pw"><br>
          <input type="submit" value="login">
          </form>';
        }
   ?>
  </body>
</html>
