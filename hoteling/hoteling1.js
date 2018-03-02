  var dt=new Date();
  var year=dt.getFullYear();
  var month=dt.getMonth()+1;
  var day=dt.getDate();
  var date = new Array();
  for(var i=0; i<13; i++){
    date[i]=(year)+"년"+(month+i)+"월";
    if(month+i>12){
      date[i]=(year+1)+"년"+(month+i-12)+"월";
    }
  }
  function checkinm(){
    for(var j=0; j<date.length; j++){
      document.write("<option>"+date[j]+"</option>");
    }
  }

//var checkin_month = document.getElementsByName("place");
var selMonth = document.getElementsByName("place");

function checkind(){
  var months = document.getElementsByName("checkin_month");
  var month = months[0].value;

  alert(month);
  //alert(month.substring(2, 2));
  //alert(selMonth[0]);
  //document.write(selMonth.substring(5, 6));
}
