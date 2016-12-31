(function() {

var meniu = {

	init: function() {
		this.cacheDOM();
		this.bindEvents();
		this.validation();
	},
	cacheDOM: function() {
		this.mancare = $('.mancare');
		this.imagine = $('.imagine');
		this.tabs = $('.tabs li');
		this.tabsFood = $('.tabs-food li');
		this.addIngredientsButton = $('.add-ingredients');
		this.comanda = $('.lanseaza');
		this.panelBody = $('.bo');
		this.panel = $('.panel');
		this.comandaPanel = $('#comanda');  
		this.ingredientePanel = $('.ingrediente-on');
		this.sumaProduselor = $('.raspuns'); 
		this.comandaProduse = $("#comanda h4");
		this.sorteaza = $("#sorteaza");
	},
	bindEvents: function() {
		var self = this;
		self.sorteaza.on('click', self.sorteazaProduse);
		self.mancare.on('mouseenter', self.selecteazaProdus);
		self.imagine.hover(self.selecteazaImagine);
		self.imagine.on('mouseout', self.deselecteazaImagine);
		self.tabs.on('click', self.panouri);
		self.tabsFood.on('click', self.panouriMancare);
		self.mancare.on('click', self.clickItem);
		self.addIngredientsButton.on('click', self.adaugaIngrediente);
		self.comanda.on('click', self.lanseazaComanda);
		$(document).on('click', '#comanda .butonx', self.stergeProduse);
		$(document).on('click', '.added-ingr .buttony', self.stergeIngrediente);
		$('.page-link').on('click', self.pageLinks);
		$(".parola-uitata").on('click', self.ascundeModalLogin);
		


		// $("#rate .stars").click(function (){

		// 	var data = {};
		// 	data.produs = $(this).parents(".mancare").find('h4').clone().children().remove().end().text().trim();
		// 	data.rating = $(this).val();

			

	  // 	var data = {};
			// data.produs = $(this).parents(".mancare").find('h4').clone().children().remove().end().text().trim();
			// data.rating = $(this).val();

			// $.post('rating.php', {produs: data.produs, rating: data.rating},
			// 	function(data) {
			// 		alert(data);
			// 	});
			

		// });

			
	

	
		//alert(data.sos_tomat);
	



	/*

		var request = $.ajax({
      method: "POST",
      url: "proceseaza-comanda.php",
      data: data
    });

    request.done(function () {

      alert('Comanda dumneavoastra a fost salvata.');

    });

    request.fail(function( jqXHR, textStatus ) {
      
      alert('Comanda dumneavoastra nu a fost salvata.');
    });

	*/

		//continuare

	},
	panouriMancare: function() {
		var atr = $(this).attr('rel');
		var category_list = [];

		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
		} else {
			$(this).addClass('active');
		}
		$('.searchPanel .tabs-food li.active').each(function() {
			var categorie = $(this).attr('rel');
			category_list.push(categorie);
		});
		if(category_list.length == 0) {
			$('.searchResult .mancare').fadeIn();
		} else {
			$('.searchResult .mancare').each(function(){
        var item = $(this).attr('data-tag');
        if(jQuery.inArray(item,category_list) > -1) {
          $(this).fadeIn('slow');
        } else {
          $(this).hide();
        }
      });
		}
	},
	sorteazaProduse: function() {
		var data = {};
		data.sos_tomat = $('.ingrediente-on').find('#sos_tomat').val();	
		data.ardei = $('.ingrediente-on').find('#ardei').val();
		data.branza_mozzarella = $('.ingrediente-on').find('#branza_mozzarella').val();
		data.ceapa = $('.ingrediente-on').find('#ceapa').val();
		data.ciuperci = $('.ingrediente-on').find('#ciuperci').val();
		data.dublu_pepperoni = $('.ingrediente-on').find('#dublu_pepperoni').val();
		data.masline = $('.ingrediente-on').find('#masline').val();
		data.porumb = $('.ingrediente-on').find('#porumb').val();
		data.rosii = $('.ingrediente-on').find('#rosii').val();
		data.sunca = $('.ingrediente-on').find('#sunca').val();	

		var request = $.ajax({
      type: "POST",
      url: "sort.php",
      data: data,
      success: function(data) {
      	$('.searchResult').html(data);
      },
      error: function() {
      	$().toastmessage('showErrorToast', "Oups! Produsele nu au fost sortate!");
      }

    });


	},
	ascundeModalLogin: function() {
		$(this).closest(".modal").hide();
		$(".modal-backdrop").hide();
	},
	pageLinks : function() {
    var url = $(this).attr("href");
    var hash = url.split('#')[1];
    var $activePage = $('.pagina.active');
    var $activeUrls = $("#navigation .selected");
    var $parent = $(this).parent();
    var $page = $(".pagina."+hash);

    if (hash != null && hash != "" ) {
      $activeUrls.removeClass('selected');
      $activePage.removeClass('active');
      $page.addClass('active');
      $parent.addClass('selected');
    }
	},
	selecteazaProdus: function() {
		var atr = $(this).attr('data-li');
		var set = $('#' + atr).closest('.imaginep');

		meniu.panelBody.find('span').hide();
		$(this).find('span').show();
		set.find('.active').removeClass('active').fadeOut(100, nextImg);

		function nextImg () {
			$('#' + atr).fadeIn(1000);
			$('#' + atr).addClass('active');
		}	
	},
	selecteazaImagine: function() {
		meniu.panel.css("opacity","0.6");
		$(this).addClass('image-hover');
	},
	deselecteazaImagine: function() {
		meniu.panel.css("opacity","1");
		$(this).removeClass('image-hover');
	},
	panouri: function() {
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
	},
	clickItem: function() {

		var nume_produs = $(this).find('h4').clone().children().remove().end().text();
		var pret_produs = $(this).find('h4 span').clone().text();
		var text =  "<div class=\"produs-selectat\">" 
									+ "<p class=\"nume-produs\">" + nume_produs + "</p>" + " - " 
		 					    + "<div class=\"pret-produs\">" + pret_produs + "</div>" 
						      + ".lei" 
						      + "<button class='butonx'>x</button>" + 
		 			      "</div>";		
		var total = 0;

		meniu.comandaPanel.append(text);

		$(meniu.comandaPanel).find('.pret-produs').each( function(){ //total sum
        	total += parseFloat($(this).text().trim());
    	});

		meniu.sumaProduselor.html(total);

	},
	adaugaIngrediente: function() {
		/*checkbox*/
		var ingredient = $('.ingrediente').val();
		$("#" + ingredient).prop('checked', true);		
		var label = "<span class=\"added-ingr label\">"+ ingredient +"<span class='buttony glyphicon glyphicon-remove'></span></span>";		
		/*input*/
		$("input"+"#" + ingredient).val(ingredient);


		var exista;	
		$(meniu.ingredientePanel).find('.added-ingr').each( function() {
			var val = $(this).text();
			(val === ingredient) ? exista = true : exista = false; 	
		});	

		(exista == true) ? $().toastmessage('showErrorToast', "Ingredientul există deja!") :
			$(meniu.ingredientePanel).append(label);
	}, 
	stergeProduse: function() {
		var cancel = parseFloat($(this).parent().find('.pret-produs').text().trim());
		var total = meniu.sumaProduselor.text();

		total = total - cancel;
		meniu.sumaProduselor.html(total); //append current sum
     	$(this).parent().remove(); //remove items
     	$(this).remove();
	},
	stergeIngrediente: function() {
		$(this).parent().remove();
		var nume = $(this).parent().text();
		$("#" + nume).prop('checked', false);
		/*input*/
		$("input"+"#" + nume).val('');
	},
	lanseazaComanda: function() {
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
	}, 
	validation: function() {
		$.validator.setDefaults({
	    highlight: function(element) {
	      $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	      $(element).closest('.form-group').removeClass('has-error');
	    },
	    errorElement: 'span',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
	    }
		});
		$("#login-form").validate({
			rules: {
				email: {
					required: true,
					minlength: 6
				},
				password: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				email: {
						required: "Introdu adresa de e-mail!",
						minlength: "Adresa de e-mail trebuie să conțină minimum 6 caractere!"
					},
					password: {
						required: "Introdu parola!",
						minlength: "Parola trebuie să conțină minimum 6 caractere!"
					}
			}
		});
		$("#register-form").validate({
			rules: {
				register_email: {
					required: true,
					minlength: 6
				},
				register_password: {
					required: true,
					minlength: 6
				},
				register_nume: {
					required: true,
					minlength: 3
				}
			},
			messages: {
				register_email: {
					required: "Introdu adresa de e-mail!",
					minlength: "Adresa de e-mail trebuie să conțină minimum 6 caractere!"
				},
				register_password: {
					required: "Introdu parola!",
					minlength: "Parola trebuie să conțină minimum 6 caractere!"
				},
				register_nume: {
					required: "Introdu numele!",
					minlength: "Numele trebuie să conțină minimum 3 caractere!"
				}
			}
		});
		$("#change-form").validate({
			rules: {
				change_email: {
					required: true,
					minlength: 6
				},
				change_password: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				change_email: {
					required: "Introdu adresa de e-mail!",
					minlength: "Adresa de e-mail trebuie să conțină minimum 6 caractere!"
				},
				change_password: {
					required: "Introdu parola!",
					minlength: "Parola trebuie să conțină minimum 6 caractere!"
				}
			}
		});
	}
}

meniu.init();

})();






