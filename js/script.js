
$(document).ready( function () {


	$('li').on('mouseover', function () { //show image

		var atr = $(this).attr('data-li');
		var set = $('#' + atr).closest('.imaginep');

		$(this).find('span').show();
		set.find('.active').removeClass('active').fadeOut(100, nextImg);

		function nextImg () {

			$('#' + atr).fadeIn(1000);
			$('#' + atr).addClass('active');
			$('li').find('span').hide();

		}
		
	});

	$('.imagine').hover( function () { //image hover

		$('.panel').css("opacity","0.6");
		$(this).css({
					"opacity" : "1",
					"border" : "2px solid #fff",
					"box-shadow" : "10px 10px 5px #ccc"
		});
		
	}, function () {

		$('.panel').css("opacity","1");
		$(this).css({
					"opacity" : "0.8",
					"border" : "none",
					"box-shadow" : "none"
		});

	});

	$('.tabs li').on('click', function () { //drinks panel

		var tab = $(this).closest('.tab-panels');
		var atr = $(this).attr('rel');

		
		tab.find('.tabs li.active').removeClass('active');
		$(this).addClass('active');
		tab.find('.panel.active').slideUp(100, nextPanel);

		function nextPanel () {

			$(this).removeClass('active'); 
			$('#' + atr).slideDown(100 , function () { 
			$(this).addClass('active');
			});			
		}

	});


});