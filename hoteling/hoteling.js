var dt = new Date();
  var year = dt.getFullYear();
  var month = dt.getMonth()+1;
  var day = dt.getDate();
  var date = new Array();

  for(var i=0; i<13; i++){
    date[i] = (year) + "년" + (month+i) + "월";
    if(month+i>12){
      date[i] = (year+1) + "년" + (month+i-12) + "월";
    }
  }
  function checkinm(){
    document.write("<option selected>" + date[0] + "</option>");
    for(var j=1; j<date.length; j++){
      document.write("<option>" + date[j] + "</option>");
    }
  }
  var checkin_month = document.getElementById("checkinmonth").value;
  //var checkin_month = checkin_months.value;
function checkind(){
  if(checkin_month=="1" || checkin_month == "3" || checkin_month == "5" || checkin_month == "7" || checkin_month == "8"){
    for(day=1; day<32; day++){
    document.write("<option>" + day + "일</option>");
  }
}
  else if(checkin_month == "4" || checkin_month == "6" || checkin_month == "9" || checkin_month == "10" || checkin_month == "12"){
    for(day=1; day<32; day++){
      document.write("<option>" + day + "일</option>");
    }
  }
  else if(checkin_month =="2"){
    for(day=1; day<29; day++){
      document.write("<option>" + day + "일</option>");
    }
  }
  }
//alert(sss.substr(0,2));
  //alert(month.substring(2, 2));
  //alert(selMonth[0]);
  //alert(selMonth.substring(5, 6));
//document.getElementById("checkin").value='2000-06-30';
    //document.getElementById("checkin").value = "2014-02-09";

    var place = document.getElementsByName("place");
    var checkin_month = document.getElementById("checkin_month").value;
