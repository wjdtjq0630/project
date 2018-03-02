<?php
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://www.naver.com");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($ch);
  curl_close($ch);

  $html = $result;

  $pos1 = strpos($html, '<span class="an_icon">');
  $pos2 = strpos($html, '<ul id="PM_ID_serviceNavi"  class="an_l">');

  $html = substr($html, $pos1, $pos2-$pos1);

  for($i=0; $i<7; $i++){
    $pos = strpos($html, 'class="an_txt">')+strlen('class="an_txt">');
    $html = substr($html, $pos, strlen($html)-$pos);

    $pos = strpos($html, '</span>');

    $rank = substr($html, 0, $pos);

    echo "메뉴".($i+1).":{$rank}<br>";
  }
 ?>
