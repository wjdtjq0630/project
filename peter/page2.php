<?php
  include 'config.php';
  $sql = "SELECT * FROM page";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>김정섭</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
    <header id="header">
      <a href="index.php"><div class="top">PeterKim</div></a><br>
      <nav class="nav">
        <div style="text-align:center;">
          <a href="index.php" class="first navf">MAIN</a>
          <?php
            //네비게이션 바 메뉴 출력
            for($i=1;$i<$num+1;$i++){
              $sql = "select * from page WHERE id='$i'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              $page[$i] = $row['page'];
              echo '<a href="page'.$i.'.php?page='.$page[$i].'">'.strtoupper($page[$i]).'</a>';
            }
           ?>
        </div>
      </nav>
    </header>
     <hr>
     <main id="main" class="main">
       <div id="p">
         <?php
            if($page = $_GET['page']){
                $sql = "SELECT * FROM page WHERE page='$page'";
            }else{
              echo '<script>alert("잘못된 접근입니다."); history.back();</script>';
            }
            if($result = mysqli_query($conn, $sql)){
              $row = mysqli_fetch_array($result);
              $content = $row['content'];
              echo $content;
            }else{
              echo '<script>alert("잘못된 접근입니다."); history.back();</script>';
            }
          ?>
     </div>
     </main>
     <?php
        $year = date("Y",time());
      ?>
     <footer class="footer">
       ⓒ <?php echo $year; ?> PeterKim. All rights reserved.
     </footer>
  </body>
</html>
