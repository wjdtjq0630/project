$("input").focusout(function(){
  $("input").each(function(){
    var input = $(this).val();
    alert(input);
  })

  // if(.search(/\s/) != -1){
  //   alert("모든 칸에 값을 입력해주세요")
  // }
})
