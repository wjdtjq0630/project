<?php
  include 'config.php';
  session_start();

  if(!isset($_SESSION['admin'])){
    echo '<script>alert("로그인 후 이용하세요.");location.href="./login.php"</script>';
  }
  if(isset($_GET['page'])){
    $page = $_GET['page'];
    $sql = "SELECT * FROM page WHERE page='$page'";
    if($result = mysqli_query($conn, $sql)){
      $row = mysqli_fetch_array($result);
      $pagename = $row['page'];
      $pagecontent = $row['content'];
    }else{
      $pagename="";
      $pagecontent = "";
    }
  }

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>관리자 페이지</title>
     <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
     <script type="text/javascript">
      $(document).ready(function(){
          $("#pagename").val('<?php echo $pagename;?>');
          $("#pagecontent").html('<?php echo $pagecontent;?>');
        });
     </script>
   </head>
   <body>
     <?php
      $sql = "SELECT * FROM page";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
       //네비게이션 바 메뉴 출력
       if(empty($_GET['page'])){
         for($i=1;$i<$num+1;$i++){
           $sql = "select * from page WHERE id='$i'";
           $result = mysqli_query($conn, $sql);
           $row = mysqli_fetch_array($result);
           $page[$i] = $row['page'];
           echo '<a href="admin.php?page='.$page[$i].'">'.strtoupper($page[$i]).'</a><br>';
         }
       }else{
          $page = $_GET['page'];
          echo '<form action="pagedb.php" method="post">
            <input type="hidden" name="page" value="'.$page.'">
            <input type="text" name="newpagename" id="pagename" placeholder="pagename"><br>
            <textarea rows="10" cols="50" name="newpagecontent" id="pagecontent" placeholder="pagecontent"></textarea><br>
            <input type="submit" value="submit">
          </form>';
       }
      ?>
      <a href="./logout.php">로그아웃</a>
   </body>
 </html>
