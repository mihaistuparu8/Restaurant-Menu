
$(document).ready( function () {


	$('.mancare').hover( function () { //show image

		var atr = $(this).attr('data-li');
		var set = $('#' + atr).closest('.imaginep');

		$(this).find('span').show();
		set.find('.active').removeClass('active').fadeOut(100, nextImg);

		function nextImg () { //show next image

			$('#' + atr).fadeIn(1000);
			$('#' + atr).addClass('active');
			
		}

	}, function () {

		$(this).find('span').hide();

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

		function nextPanel () { //show next panel

			$(this).removeClass('active'); 
			$('#' + atr).slideDown(100 , function () { 
			$(this).addClass('active');
			});			
		}

	});

	
	
	$('.mancare').on('click', function () { //item click

		var button = "<button class='butonx'>x</button>";		
		var total = 0;

		$(this).find('h4').clone().appendTo('#comanda').before(button);
		
		$('#comanda').find('span').each( function(){ //total sum

        total += parseFloat($(this).text().trim());

    	});

		$('.raspuns').html(total);

	});


	$(document).on('click', '#comanda .butonx', function() { //remove button

		var cancel = parseFloat($(this).next().find('span').text().trim());
		var total = $('.raspuns').text();

		total = total - cancel;
		$('.raspuns').html(total); //append current sum

     	$(this).next().remove(); //remove items
     	$(this).remove();

 });


	$('.btn').on('click', function () { //order button

		var total = $('.raspuns').text();
		var minPizza = 30;
		var minDrinks = 10;		
		var isPizza = $("#comanda h4").hasClass("pizaa");
    	var isDrinks = $("#comanda h4").hasClass("drinks");


    	if (isPizza && isDrinks) { //order conditions

    		$().toastmessage('showSuccessToast', "You have successfully sent your order! Congratz!");
    	
    	}	else if (total >= minPizza) {

			$().toastmessage('showSuccessToast', "You have successfully sent your order! Congratz!");
		
		}	else if (isPizza) {	

			$().toastmessage('showErrorToast', " The total price should be at least 30 when you choose to buy pizza only!");		
		
		}	else if (isDrinks && (total >= minDrinks)) {
			
			$().toastmessage('showSuccessToast', "You have successfully sent your order! Congratz!");
		
		}	else if (isDrinks){

			$().toastmessage('showErrorToast', "The total price should be at least 10 when you choose to buy drinks only!");
		
		}	else {

			$().toastmessage('showErrorToast', "Your order list is empty!");

		}


	});



});