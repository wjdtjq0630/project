function checktime(i){ //시간이 한자리 수일 경우 앞에 0을 붙여 시간을 반환
  if(i<10){
    i="0"+i;
  }
  return i;
}
function getday(i){ //요일숫자를 실제 요일로 반환
  var week = new Array('일','월','화','수','목','금','토');
  return week[i];
}
function clock(){
  var today = new Date(); //서버의 날짜
  var year = today.getYear()-100; //년도 끝 두글자 //1900년도부터 년도가 카운트되므로 100을 빼줌
  var month = today.getMonth()+1; //현재 월
  var date = today.getDate(); //현재 일
  var day = today.getDay(); //현재 요일
  var hours = today.getHours(); //현재 시간(시)
  var minutes = today.getMinutes(); //현재 시간(분)
  var seconds = today.getSeconds(); //현재 시간(초)
  day = getday(day);
  hours = checktime(hours);
  minutes = checktime(minutes);
  seconds = checktime(seconds);
  month = checktime(month);
  date = checktime(date);
  time = year+"."+month+"."+date+"("+day+") "+hours+":"+minutes+":"+seconds; //현재 날짜,시간
  document.getElementById("clock").innerText = time; //현재 날짜,시간을 idclock에 삽입
  setTimeout("clock()",500); //0.5초에 한 번씩 시간을 업데이트
}
//body에 onload="clock()"을 넣어 실행.
//시계를 표시할 곳에는 id="clock"을 넣는다.
