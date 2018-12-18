$(document).ready(function(){

	$("#banner").css({"height":$(window).height() + "px"});

	var flag = false;
	var scroll;
	var ancho;

	$(window).scroll(function(){
		scroll = $(window).scrollTop();
		ancho = $(window).width();
		if(scroll > 200){
			if(!flag){
				$("nav").css({"top":"-150px"});
				$(".containerLogoParabrisasOnline").css({"position":"relative","top":"155px"});
				$(".logoParabrisasOnline").css({"width":"80px"});
				$(".social-icons").css({"position":"relative","top":"90px"});
				$(".title-rrss").css({"position":"relative","top":"70px"});
				flag = true;
			}
		}else{
			if(flag){
				$("nav").css({"top":"0px"});
				$(".containerLogoParabrisasOnline").css({"top":"40px"});
				$(".logoParabrisasOnline").css({"width":"150px"});
				$(".social-icons").css({"position":"relative","top":"0"});
				$(".title-rrss").css({"position":"relative","top":"0"});
				flag = false;
			}
		}


	});

});