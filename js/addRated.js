(function() {
	var addRated = {
		init: function() {
			this.Dom();
			this.Events();
		},
		Dom: function() {
			this.addedVote = $('.added-vote');
			this.produs = $('.ratedp');
			this.comandaPanel = $('#comanda');
			this.sumaProduselor = $('.raspuns'); 
			this.rateRow = $('.rate-row');
			this.afisorComanda = $('.afisorComanda');
		},
		Events: function() {
			var self = this;
			self.addedVote.on('click', self.adaugaProdusVotat);
			self.produs.on('mouseover', self.selecteazaProdusVotat);
			$(document).ready(self.adaugaStele);
		},
		adaugaStele: function() {
			$('.media').each(function() {
				var value = parseInt($(this).text());
				$(this).parents('.continut-produs').find('.rating_widget .star span').each(function() {
					var starVal = $(this).text().trim();
					if(starVal == value) {
						$(this).parent().addClass('selected');
						$(this).parent().prevAll().addClass('selected');
					}
				});
			});
		},
		adaugaProdusVotat: function() {
			var nume_produs = $(this).parents('.continut-produs').find('h4').clone().children().remove().end().text().trim();
			var pret_produs = $(this).parents('.continut-produs').find('h4 span').clone().text().trim();
			var nume_cautat = nume_produs.replace(/[^a-z0-9\s]/gi, '').replace(/,/g , "");
			nume_cautat = nume_cautat.replace(/\s/g, "");
			var $itemInBasket = addRated.comandaPanel.find('#'+nume_cautat);

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
			 	addRated.comandaPanel.append(text);
			} else {
				var $quantityInput = $itemInBasket.find('td .quantity');
	      var currentQuantity = parseInt( $quantityInput.val() );   
	      $quantityInput.val(currentQuantity+1);
	      var thisProd = $itemInBasket.find('.pretProdus').clone().text().replace(".lei","");
	      thisProd = parseFloat(thisProd);
	      totalProdus = thisProd * (currentQuantity+1);
	      $itemInBasket.find('.totalProdus').html(totalProdus + '.lei');
			}

			addRated.calculateTotalPrice();
			},
			calculateTotalPrice : function() {

		    if(event) {
		      event.preventDefault();
		    }

		    var total = 0;
		    addRated.comandaPanel.find('.totalProdus').each( function(){

		      var pret = $(this).text().replace("lei","");
		      var cantitate = $(this).parents('.item').find('.quantity').val();

		      cantitate = parseInt(cantitate);
		      pret = parseFloat(pret.trim());
		      total += pret;
		    });

		    var transport = 20;
		    var totalCom = transport + total;
		    addRated.afisorComanda.find('.totalPrice').html(total + ' lei');
		    addRated.afisorComanda.find('.transport').html(transport + ' lei');
		    addRated.afisorComanda.find('.totalCom').html(totalCom + ' lei');
		    addRated.sumaProduselor.html(totalCom);
		  },
			selecteazaProdusVotat: function() {
				$(this).parents('.rate-row').find('.pret').hide();
				$(this).find('.pret').show();
			}

	}
	addRated.init();

})();