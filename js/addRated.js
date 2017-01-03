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
			var text =  "<div class=\"produs-selectat\">" 
										+ "<p class=\"nume-produs\">" + nume_produs + "</p>" + " - " 
			 					    + "<div class=\"pret-produs\">" + pret_produs + "</div>" 
							      + ".lei" 
							      + "<button class='butonx'>x</button>" + 
			 			      "</div>";		
			var total = 0;
			addRated.comandaPanel.append(text);

			$(addRated.comandaPanel).find('.pret-produs').each( function(){ //total sum
	        	total += parseFloat($(this).text().trim());
	    	});

			addRated.sumaProduselor.html(total);
			},
			selecteazaProdusVotat: function() {
				$(this).parents('.rate-row').find('.pret').hide();
				$(this).find('.pret').show();
			}

	}
	addRated.init();

})();