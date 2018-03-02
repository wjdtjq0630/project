<?php
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://www.naver.com");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($ch);
  curl_close($ch);

  $html = $result;

  $pos1 = strpos($result, "실시간 급상승 검색어"); //원하는 정보 첫글자
  $pos2 = strpos($result, '<span class="ah_ico_open"></span>'); //원하는 정보 마지막글자

  $html = substr($html, $pos1, $pos2 - $pos1); //원하는 정보 첫글자부터 원하는 정보 마지막글자수를 더하는데, 그냥 더하면 마지막 - 첫번째

  for($i=0; $i<20; $i++){
    $pos = strpos($html, 'ah_k">') + strlen('ah_k">'); //그냥 이용하면 a부터 시작하니, 글자수만큼 더한 이후를 출력하면 바로 원하는 값 나옴
    $html = substr($html, $pos, strlen($html) - $pos); //실시간 검색어 첫글자부터 맨 끝까지 불러옴

    $pos = strpos($html, '</span>'); //불러온 문자에서 실시간 검색어 끝글자의 위치를 알아냄

    $rank = substr($html, 0, $pos); //실시간 검색어 첫글자부터 끝글자까지 불러냄

    echo ($i+1)."순위 : {$rank}<br>"; // 알아낸 검색어 내용과 순위를 출력함.
  }
?>
