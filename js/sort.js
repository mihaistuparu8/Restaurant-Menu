(function() {
	var sort = {
		init: function() {
			this.cacheDOM();
			this.bindEvents();
		},
		cacheDOM: function() {
			this.star = $(".star");
			this.mancare = $('.sort-food');
			this.panelBody = $('.bo');
			this.comandaPanel = $('#comanda');
			this.sumaProduselor = $('.raspuns'); 
			
		},
		bindEvents: function() {
			var self = this;
			self.star.on('click', self.alegeRating);
			self.star.on('mouseenter', self.selecteazaRating);
			self.star.on('mouseleave', self.deselecteazaRating);
			self.mancare.on('mouseenter', self.selecteazaProdus);
			self.mancare.on('click', self.clickItem);
			
		},
		alegeRating: function() {
			var span = $(this).find('span').text();
			var widget = $(this).closest(".rating_widget");
			widget.find('.star.rate-value').removeClass('rate-value');
			widget.find('.star').each(function() {
				var value = $(this).find('span').text();
				if(value == span) {
					$(this).nextAll().removeClass('selected');
					$(this).prevAll().addClass('selected');
					$(this).addClass('selected');
					$(this).addClass('rate-value');
				}
			});

			var rating = {};
			rating.rate = $(this).find('span').text();
			rating.produs = $(this).parents(".mancare").find('h4').clone().children().remove().end().text().trim();

			var request = $.ajax({
	      type: "POST",
	      url: "rating.php",
	      data: rating,
	      success: function(rating) {
	      	$('.ingrediente-on').html(rating);
	      	$().toastmessage('showSuccessToast', "Multumim pentru vot!");
	      },
	      error: function() {
	      	$().toastmessage('showErrorToast', "Oups! Produsele nu au fost sortate!");
	      }
	    });	
		},
		selecteazaRating: function() {
			$(this).nextAll().removeClass('selected');
			$(this).prevAll().addClass('selected');
			$(this).addClass('selected');
		},
		deselecteazaRating: function() {
			var widget = $(this).closest(".rating_widget");
			var stars = widget.find('.star.rate-value');
			widget.find('.star').each(function() {
				$(this).removeClass('selected');
			});
			if (stars) {
				stars.nextAll().removeClass('selected');
				stars.prevAll().addClass('selected');
				stars.addClass('selected');	
			}
		},
		selecteazaProdus: function() {
		var atr = $(this).attr('data-li');
		var set = $('#' + atr).closest('.imaginep');

		sort.panelBody.find('.pret').hide();
		$(this).find('.pret').show();
		set.find('.active').removeClass('active').fadeOut(100, nextImg);

			function nextImg () {
				$('#' + atr).fadeIn(1000);
				$('#' + atr).addClass('active');
			}	
		},
		clickItem: function() {

			var nume_produs = $(this).find('h4').clone().children().remove().end().text();
			var pret_produs = $(this).find('h4 span').clone().text();
			var nume_cautat = nume_produs.replace(/[^a-z0-9\s]/gi, '').replace(/,/g , "");
			nume_cautat = nume_cautat.replace(/\s/g, "");
			var $itemInBasket = sort.comandaPanel.find('#'+nume_cautat);

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
			 	sort.comandaPanel.append(text);
			} else {
				var $quantityInput = $itemInBasket.find('td .quantity');
	      var currentQuantity = parseInt( $quantityInput.val() );   
	      $quantityInput.val(currentQuantity+1);
	      var thisProd = $itemInBasket.find('.pretProdus').clone().text().replace(".lei","");
	      thisProd = parseFloat(thisProd);
	      totalProdus = thisProd * (currentQuantity+1);
	      $itemInBasket.find('.totalProdus').html(totalProdus + '.lei');
			}

			sort.calculateTotalPrice();

		},
		calculateTotalPrice: function() {

		},
	}
	sort.init();
})();
	
