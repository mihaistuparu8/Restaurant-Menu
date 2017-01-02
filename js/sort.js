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
			var text =  "<div class=\"produs-selectat\">" 
										+ "<p class=\"nume-produs\">" + nume_produs + "</p>" + " - " 
			 					    + "<div class=\"pret-produs\">" + pret_produs + "</div>" 
							      + ".lei" 
							      + "<button class='butonx'>x</button>" + 
			 			      "</div>";		
			var total = 0;

			sort.comandaPanel.append(text);

			$(sort.comandaPanel).find('.pret-produs').each( function(){ //total sum
	        	total += parseFloat($(this).text().trim());
	    	});

			sort.sumaProduselor.html(total);

		}
	}
	sort.init();
})();
	
