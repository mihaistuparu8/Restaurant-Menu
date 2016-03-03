console.log('Loaded script.js');

$(document).ready(function(){

	$('.mancare').on('mouseover', function() {
		var imagineId = $(this).attr('data-li');
		$('#'+imagineId).fadeIn(20); 
		$(this).find('span').show();
	});

	$('.mancare').on('mouseleave', function() {
		var imagineId = $(this).attr('data-li');
		$('#'+imagineId).fadeOut(20);
		$(this).find('span').hide();
	});
	//pentru categoriile de bauturi
	$('.tab-panels .tabs li').on('click', function() { //cauta li in clasa .tabs
		var panel = $(this).closest('.tab-panels'); //verifica panel-ul in care se afla
		panel.find('.tabs li.active').removeClass('active'); //scoate clasa active
		$(this).addClass('active'); //adauga active pe cel pe care am dat click
		var panelShow = $(this).attr('rel'); //afla panel-ul pe care am dat click

		panel.find('.panel.active').slideUp(300, showNextPanel); //ascunde pe cel curent

	 	function showNextPanel() { //arata urmatorul panel
			$(this).removeClass('active'); //sterge clasa active
			$('#'+panelShow).slideDown(300 , function() { //arata panel-ul
			$(this).addClass('active'); //adauga clasa activa
			});			
		}
	});

	$('.pizza .mancare').on('click', function(event) { 
	
		event.preventDefault();
		var $comanda = $("#comanda");
		var $button = $('.butonx');	

		$comanda.append($(this).clone());
		$comanda.find('.mancare p').remove();
		$button.addClass('active');	

		var element = $comanda.find('.mancare h4 span').text();
		$('.raspuns').text('');

		$( "#comanda span" ).each(function() {
  			var ap =$( this ).text().concat('+');  
  			$('.raspuns').append(ap);
		});

		var txt = $('.raspuns').text();
  		var fin = txt.substr(0, txt.length-1);
  		var sum = eval(fin);

 		$('.raspuns').text('');
 		$('.raspuns').append(sum); //afiseaza pretul curent
		$comanda.append(button.clone()); 
	
	});

	$('#comanda').on('click', '.butonx', function (event) {
		var txt = $('.raspuns').text();
		var ultim = $("#comanda li:last-child").find('span').text();
		var undo = eval(txt-ultim);

		$('.raspuns').text('');
		$('.raspuns').append(undo); //afiseaza pretul curent
		$("#comanda li:last-child").remove(); //sterge ultimul elem
	});

	$('.btn').on('click', function() {  

	var suma = $('.raspuns').text();
	var txt = String(suma);
	var dmin = 10;
	var pmin = 30;
    var fpizza = $("#comanda li h4").hasClass("pizaa");
    var fdrinks = $("#comanda li h4").hasClass("drinks");

    if (fpizza && fdrinks){
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