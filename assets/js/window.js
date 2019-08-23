$(document).ready(function(){
	// alert($(window).width())
	$(window).resize(function(){
		var wheight = $(window).height()
		var wwidth = $(window).width()
		var lside = $('.lside').width()
		var rside = wwidth - lside - 2;
		var headl = $('.lside .head').height()
		var hwrpr = $('.wrapper').height()
		var wwrpr = $('.wrapper').width()
		// alert(headl)
		// $('.lside').css("height",wheight+"px");
		// $('.rside').css("height" , wheight+"px");
		$('.rside .head').css({"height" : headl+"px","max-height" : headl+"px"});
		$('.chatbox').css({"min-height" :wheight- (headl*2) +"px"});
		$('.dynamic').css("min-height",wheight +"px");
		// fotobox
		$("#chatroom").animate({ scrollTop: $('#chatroom').height() }, "slow");
		// alert($('#chatroom').height())
		if ($(window).width() <= 1024) {
			$('.rside').css({"width": "100%" , "min-height" : wheight+"px"});
			$('.rside .head').css({"height" : "auto"});
			$('.mainbox').css({
				"padding-top" : $('.mob-head').height() +"px"
			})
		}
	}).resize()
})