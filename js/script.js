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

$('.mancare').on('click', function() {  //?????
	var titlu = $(this).children('h4');
	$('#comanda').append(titlu.clone(), '<button id="butonx">x</button>');
});

$('.co').find('ul').delegate('#butonx', 'click', function(e) {
	var remove = $(e.target).closest('li');
	$(remove).remove();
	$('.co').find('ul').append('<li id="comanda"></li>');
});





$('.btn').on('click', function() {  //?????
	var string = $('#comanda').find('li');
		var numar = $(string).children('span');
		//var thenum = thestring.replace( /^\D+/g, '');
        alert(numar);

});





});