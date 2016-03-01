console.log('Loaded script.js');

$(document).ready(function(){

$('.mancare').on('mouseover', function() {
	var imagineId = $(this).attr('data-li');
	$('#'+imagineId).show(300); 
	$(this).find('span').show();
});

$('.mancare').on('mouseleave', function() {
	var imagineId = $(this).attr('data-li');
	$('#'+imagineId).hide(100);
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
	$comanda.append(button.clone());
});

$('#comanda').on('click', '.butonx', function (event) {
	$("#comanda li:last-child").remove();
});



/*
$('.btn').on('click', function() {  //?????
	var string = $('#comanda').find('li');
		var numar = string.children('span');
		//var thenum = thestring.replace( /^\D+/g, '');
        alert(numar);

});
*/



});