<?php 
require_once 'db.php';

$rec = $db->prepare('SELECT * FROM sac_media_rating RIGHT JOIN sac_produse'.
		' ON sac_media_rating.id_produs = sac_produse.id_produs'		
		);
	$rec->execute(); 
 ?>

 <div class="row">
	<?php foreach ($rec as $row): ?>
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="img/food/produs<?php echo $row['id_produs'];?>.jpg" alt="..."> 
	      <div class="caption">
	        <h4 class="pizaa">
						<?php echo $row['nume_produs']; ?> 
						<span class="badge pret">
							<?php echo $row['pret']; ?>
						</span>
			  	</h4>
			  	<ul class="rating_widget">
						<li class="star" ><span>1</span></li>
						<li class="star" ><span>2</span></li>
						<li class="star" ><span>3</span></li>
						<li class="star" ><span>4</span></li>
						<li class="star" ><span>5</span></li>
					</ul>
				 	<input name="rating" value="0" id="rating_star" type="hidden" postID="1" />
			    <div class="overall-rating">
			    	<?php if($row['voturi'] == NULL): ?>
			    		<p class="no-votes">Produsul nu a primit voturi!</p>
			    	<?php else: ?>
			    	(Rating <span id="media"><?php echo $row['media']; ?></span>
			      Bazat pe <span id="voturi"><?php echo $row['voturi']; ?></span>  voturi.)
			    <?php endif; ?>
			    	<p class="p-ingrediente">Ingrediente: <?php echo $row['ingrediente']; ?></p>
			    </div>
	        <p class="p-ingrediente">Ingrediente: <?php echo $row['ingrediente']; ?></p>
	        <p><a href="#" class="btn btn-primary" role="button">Adauga!</a></p>
	      </div>
	    </div>
	  </div>
	<?php endforeach; ?>
</div>