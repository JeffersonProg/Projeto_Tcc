$(function(){

	var curSlide = 0;
	var maxSlide = $('.banner-single').length - 1;
	var delay = 3;     //intervalo 


	initSlider();
	changeSlide();


	function initSlider(){
		$('.banner-single').css('opacity','0');
		$('.banner-single').eq(0).css('opacity','1');
		for(var i = 0; i < maxSlide+1; i++){
			var content = $('.bullets').html();
			if(i == 0)
				content+='<span class="active-slider"></span>';
			else
				content+='<span></span>';
			$('.bullets').html(content);
		}
	}
									//codigo foi programado para não ter efeito de stop , sauvementee transição
	function changeSlide(){
		setInterval(function(){
			$('.banner-single').eq(curSlide).animate({'opacity':'0'},2000);
			curSlide++;
			if(curSlide > maxSlide)
				curSlide = 0;
			$('.banner-single').eq(curSlide).animate({'opacity':'1'},2000);
												
																//Trocar bullets da navegacao do slider!
			$('.bullets span').removeClass('active-slider');
			$('.bullets span').eq(curSlide).addClass('active-slider');
		},delay * 1000);
	}


	$('body').on('click','.bullets span',function(){                     //controle do botão
		var currentBullet = $(this);
		$('.banner-single').eq(curSlide).animate({'opacity':'0'},3000);
		curSlide = currentBullet.index();
		$('.banner-single').eq(curSlide).animate({'opacity':'1'},3000);       //alterar segundos nos banner 
		$('.bullets span').removeClass('active-slider');
		currentBullet.addClass('active-slider');
	});

})