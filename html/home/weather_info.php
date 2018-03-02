<meta charset="utf-8">
<?php
 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, "http://m.kma.go.kr/m/index.jsp");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $result = curl_exec($ch);
 curl_close($ch);

 $html = $result; //기상청 홈페이지의 모든 내용

 $pos1 = strpos($html, '<p class="sec">'); // 필요한 내용의 시작 부분의 위치
 $pos2 = strpos($html, '<div class="wea" style="background:url(/m/images/right/weatherbgdb04.png) no-repeat right 0;">'); //필요한 내용의 마지막 부분의 위치
 $html = substr($html, $pos1, $pos2-$pos1); //필요한 내용을 추출

 $pos1 = strpos($html, '<p class="sec">') + strlen('<p class="sec">'); //기온을 추출하기 위해 앞 부분의 태그 다음을 시작 위치로 지정
 $html = substr($html, $pos1, strlen($html)-$pos1); //기온부터 끝 글자까지 추출

 $pos2 = strpos($html, '&nbsp;'); //기온 다음의 글자의 위치
 $temp = substr($html, 0, $pos2); //현재 기온(~도)

 //위와 같은 방식으로 날씨를 추출
 $pos1 = strpos($html, '<span class="sma">') + strlen('<span class="sma">');
 $html = substr($html, $pos1, strlen($html)-$pos1);

 $pos2 = strpos($html, '</span></p>');
 $weather = substr($html, 0, $pos2); //현재 날씨(흐림,맑음 등)
 echo $temp.' '.$weather;
 ?>
