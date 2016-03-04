console.log('Loaded script.js');

$(document).ready(function () {

	$('.mancare').on('mouseover', function (event) {

		event.preventDefault();
		$(this).find('span').show();
		var imagineId = $(this).attr('data-li');
		var img = $('#'+imagineId).closest('.imaginep');
		img.find('.imagine.active').removeClass('active').fadeOut(1000, showNextImg);

		function showNextImg () {
			$('#'+imagineId).fadeIn(1000); 
			$('.mancare').find('span').hide();
			$('#'+imagineId).addClass('active');				
		}		
	});

	$('.tab-panels .tabs li').on('click', function (event) { 
		
		event.preventDefault();
		var panel = $(this).closest('.tab-panels'); 
		panel.find('.tabs li.active').removeClass('active'); 
		$(this).addClass('active');
		var panelShow = $(this).attr('rel'); 
		panel.find('.panel.active').slideUp(300, showNextPanel); 

	 	function showNextPanel () { 
			$(this).removeClass('active'); 
			$('#'+panelShow).slideDown(300 , function () { 
			$(this).addClass('active');
			});			
		}
	});

	$('.pizza .mancare').on('click', function (event) { 
	
		event.preventDefault();
		var $comanda = $("#comanda");
		var $button = $('.butonx');	

		$comanda.append($(this).clone());
		$comanda.find('.mancare p').remove();
		$button.addClass('active');	

		var element = $comanda.find('.mancare h4 span').text();
		$('.raspuns').text('');
		$( "#comanda span" ).each(function () {
  			var ap =$( this ).text().concat('+');  
  			$('.raspuns').append(ap);
		});

		var txt = $('.raspuns').text();
  		var fin = txt.substr(0, txt.length-1);
  		var sum = (new Function( 'return ' + fin))();
 		$('.raspuns').text('');
 		$('.raspuns').append(sum); 	
	
	});

	$('#comanda').on('click', '.butonx', function (event) {

		event.preventDefault();
		var txt = $('.raspuns').text();
		var ultim = $("#comanda li:last-child").find('span').text();
		var undo = (new Function( 'return ' + (txt-ultim)))();
		$('.raspuns').text('');
		$('.raspuns').append(undo); 
		$("#comanda li:last-child").remove(); 
	});

	$('.btn').on('click', function (event) {  

		event.preventDefault();
		var suma = $('.raspuns').text();
		var txt = String(suma);
		var dmin = 10;
		var pmin = 30;
    	var fpizza = $("#comanda li h4").hasClass("pizaa");
    	var fdrinks = $("#comanda li h4").hasClass("drinks");

    	if (fpizza && fdrinks) {
    		$().toastmessage('showSuccessToast', "You have successfully sent your order! Congratz!");
    	}
		else if (txt >= pmin) {
			$().toastmessage('showSuccessToast', "You have successfully sent your order! Congratz!");
		}
		else if (fpizza) {	
			$().toastmessage('showErrorToast', " The total price should be at least 30 when you choose to buy pizza only!");		
		}
		else if (fdrinks && (txt >= dmin)) {
			$().toastmessage('showSuccessToast', "You have successfully sent your order! Congratz!");
		}
		else {
			$().toastmessage('showErrorToast', "The total price should be at least 10 when you choose to buy drinks only!");
		} 

	});

});