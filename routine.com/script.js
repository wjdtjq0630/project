$(function(){
  $('.main').fadeIn();
})

$(document).ready(function(){
    $("#navbar").hover(function(){
        $('#slide').slideDown();
        }, function(){
        $('#slide').slideUp();
    });
});

$(function(){
	var interval=10000;
	$('.slideshow').each(function(){
		var container=$(this);
		function switchImg(){
			var imgs=container.find('img');
			var first=imgs.eq(0);
			var second=imgs.eq(1);
			first.fadeOut().appendTo(container);
			second.fadeIn(2000);
		}
		setInterval(switchImg, interval);
	});
});
