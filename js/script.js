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
		this.checkout = $('#checkout');
		this.panelBody = $('.bo');
		this.panel = $('.panel');
		this.comandaPanel = $('#comanda');  
		this.ingredientePanel = $('.ingrediente-on');
		this.sumaProduselor = $('.raspuns'); 
		this.comandaProduse = $("#comanda h4");
		this.sorteaza = $("#sorteaza");
		this.recomandariLink = $('a.recomandari');
		this.topRated = $('.top-rated');
		this.topVoted = $('.top-voted');
		this.afisorComanda = $('.afisorComanda');
		this.afisorLivrare = $('.afisorLivrare');
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
		self.checkout.on('click', self.lanseazaCheckout);
		self.topRated.on('click', self.showRated);
		self.topVoted.on('click', self.showVoted);
		self.recomandariLink.on('click', self.arataRecomandari);
		this.comandaPanel.on('change','.quantity', this.calculateItemPrice);
    this.comandaPanel.on('change','.quantity', this.calculateTotalPrice);
		$(document).on('click', '#comanda .butonx', self.stergeProduse);
		$(document).on('click', '.added-ingr .buttony', self.stergeIngrediente);
		$(document).ready(self.sorteazaProduse);
		$('.page-link').on('click', self.pageLinks);
		$(".parola-uitata").on('click', self.ascundeModalLogin);
		
	},
	showRated: function() {
		$(this).parent().find('.btn.active').removeClass('active');
		$(this).addClass('active');
		var rated = {};
		var request = $.ajax({
      type: "POST",
      url: "ratedProducts.php",
      data: rated,
      success: function(rated) {
      	$('.recomandari-result').html(rated);
      },
      error: function() {
      	$().toastmessage('showErrorToast', "Oups! Nu se pot afisa produsele!");
      }
    });
	},
	showVoted: function() {
		$(this).parent().find('.btn.active').removeClass('active');
		$(this).addClass('active');
		var voted = {};
		var request = $.ajax({
      type: "POST",
      url: "votedProducts.php",
      data: voted,
      success: function(voted) {
      	$('.recomandari-result').html(voted);
      },
      error: function() {
      	$().toastmessage('showErrorToast', "Oups! Nu se pot afisa produsele!");
      }
    });
	},
	arataRecomandari: function() {
		var recomandari = {};
		var request = $.ajax({
			type: "POST",
			url: "votedProducts.php",
			data: recomandari,
			success: function(data) {
				$('.recomandari-result').html(data);
			},
			error: function() {
				$().toastmessage('showErrorToast', "Oups! Recomandarile nu sunt valabile momentan!");
			}
		})

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

		meniu.panelBody.find('.pret').hide();
		$(this).find('.pret').show();
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

		var nume_produs = $(this).find('h4').clone().children().remove().end().text().trim();
		var pret_produs = $(this).find('h4 span').clone().text().trim();
		var nume_cautat = nume_produs.replace(/[^a-z0-9\s]/gi, '').replace(/,/g , "");
		nume_cautat = nume_cautat.replace(/\s/g, "");
		var $itemInBasket = meniu.comandaPanel.find('#'+nume_cautat);

		if($itemInBasket.length == 0) {
			var text =  
				"<tr class='item' id="+ nume_cautat +">"
				+ "<td>" 
					+"<div class=\"produs-selectat\">" 
						+ "<p class=\"nume-produs\">"+nume_produs+"</p>" 
					+ "</div>"
				+ "</td>" 
				+ "<td>"
			    	+ "<div class=\"pretProdus\">"+pret_produs+"</div>" 
	      + "</td>"
	      + "<td>" 
	      	+ "<input type=\"number\" min=\"0\" value=\"1\" class=\"quantity\" id='quantity'/>"
	      + "</td>"
      	+ "<td>"
      		+ "<span class='totalProdus'>"+pret_produs+".lei</span>"
      	+ "</td>"
      	+ "<td>"
      		+ "<button class='butonx'>x</button>" 
      	+ "</td>"	
      + "</tr>";
		 	meniu.comandaPanel.append(text);
		} else {
			var $quantityInput = $itemInBasket.find('td .quantity');
      var currentQuantity = parseInt( $quantityInput.val() );   
      $quantityInput.val(currentQuantity+1);
      var thisProd = $itemInBasket.find('.pretProdus').clone().text().replace(".lei","");
      thisProd = parseFloat(thisProd);
      totalProdus = thisProd * (currentQuantity+1);
      $itemInBasket.find('.totalProdus').html(totalProdus + '.lei');
		}
		meniu.calculateTotalPrice();
	},
  calculateItemPrice : function() {

    var quant = $(this).val();
    var thisProd = $(this).parents('.item').find('.pretProdus').clone().text().replace(".lei","");
    quant = parseInt(quant);
    thisProd = parseFloat(thisProd.trim());
    totalProdus = thisProd * quant;
    $(this).parents('.item').find('.totalProdus').html(totalProdus + ' lei');

  },
  calculateTotalPrice : function() {

    if(event) {
      event.preventDefault();
    }
    var total = 0;
    meniu.comandaPanel.find('.totalProdus').each( function(){
      var pret = $(this).text().replace("lei","");
      var cantitate = $(this).parents('.item').find('.quantity').val();

      cantitate = parseInt(cantitate);
      pret = parseFloat(pret.trim());
      total += pret;
    });
    if(total<10) {
    	$('#checkout').addClass('disabled');
    } else {
    	$('#checkout').removeClass('disabled');
    }
    var transport = 20;
    var totalCom = transport + total;
    meniu.afisorComanda.find('.totalPrice').html(total + ' lei');
    meniu.afisorComanda.find('.transport').html(transport + ' lei');
    meniu.afisorComanda.find('.totalCom').html(totalCom + ' lei');
    meniu.sumaProduselor.html(totalCom);
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
    var $item = $(this).parents('.item'); 

    if(confirm('Esti sigur ca vrei sa stergi acest produs din cos?')) {
      $item.remove();
      meniu.calculateTotalPrice();
    }
    event.preventDefault();
	},
	stergeIngrediente: function() {
		$(this).parent().remove();
		var nume = $(this).parent().text();
		$("#" + nume).prop('checked', false);
		/*input*/
		$("input"+"#" + nume).val('');
	},
	lanseazaCheckout: function() {
		var total = $('.raspuns').text();
		var require = 30;	
		if(total<require) {
			$().toastmessage('showErrorToast', "Comanda trebuie sa fie de minimum 30.lei!");
		}	

		var data = {};
		data.afisor = $('.afisorComanda').clone().html();

		var request = $.ajax({
      type: "POST",
      url: "afisorLivrare.php",
      data: data,
      success: function(data) {
      	//var result = $('<div />').append(data).find('.afisorLivrare').html();
      	$('.afisorLivrare').html(data);
      },
      error: function() {
      	$().toastmessage('showErrorToast', "Oups! Produsele din comanda nu pot fi adaugate!");
      }
    });
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






