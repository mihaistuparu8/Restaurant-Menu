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

var suma = $('.raspuns').text('');
var txt = String(suma);
//var conv = eval(suma); // ????

var min = 30;
if (txt<=min) {
	alert('The minimum price should be 30 for the selected products');
}
else {
	alert('Success!');
}


});

});