<?php
  include 'config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="headerstyle.css">
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <title>routine.com</title>
  </head>
  <body>
    <header>
      <ul id="nav">
        <li><a href="./index.php" id="logo">루틴닷컴</a></li>
        <li id="navbar" class="nav">
        <a id="inavbar">부위별운동
        <ul id="slide">
        <li><a href="./chest.php">가슴</a></li>
        <li><a href="./back.php">등</a></li>
        <li><a href="./shoulder.php">어깨</a></li>
        <li><a href="./biceps.php">이두</a></li>
        <li><a href="./triceps.php">삼두</a></li>
        <li><a href="./wrist.php">전완</a></li>
        <li><a href="./abs.php">복부</a></li>
        <li><a href="./frontthighs.php">허벅지 전면</a></li>
        <li><a href="./backthighs.php">허벅지 후면</a></li>
        </ul></a>
      </li>
      <li class="nav"><a href="./login.html">로그인</a></li>
      <li class="nav"><a href="./join.html">회원가입</a></li>
      </ul>
    </header>
    <hr>
    <main id="main" class="main">
      <div class="slideshow">
        <img src="img/img1.jpg" alt="main1" class="bgimg firstbgimg">
        <img src="img/img2.jpg" alt="main1" class="bgimg">
        <img src="img/img3.jpg" alt="main1" class="bgimg">
        <img src="img/img4.jpg" alt="main1" class="bgimg">
      </div>
    </main>
    <hr>
    <div class="footer"> COPYRIGHT (C) 루틴닷컴 ALL RIGHTS RESERVED
        <br> developer: seob 30627115 </div>
  </body>
</html>
