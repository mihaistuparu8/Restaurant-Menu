<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL && ~E_NOTICE);

	require_once 'db.php';
	$sos_tomat = $_POST['sos_tomat']; 
	$ardei = $_POST['ardei'];
	$branza_mozzarella = $_POST['branza_mozzarella'];
	$ceapa = $_POST['ceapa'];
	$ciuperci = $_POST['ciuperci'];
	$dublu_pepperoni = $_POST['dublu_pepperoni'];
	$masline = $_POST['masline'];
	$porumb = $_POST['porumb'];
	$rosii = $_POST['rosii'];
	$sunca = $_POST['sunca'];

	$query =$db->prepare('SELECT * FROM sac_media_rating RIGHT JOIN sac_produse'.
		' ON sac_media_rating.id_produs = sac_produse.id_produs'.
		' WHERE ingrediente LIKE "%'.$sos_tomat.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$ardei.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$branza_mozzarella.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$ceapa.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$ciuperci.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$dublu_pepperoni.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$masline.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$porumb.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$rosii.'%" '.
		' AND sac_produse.ingrediente LIKE "%'.$sunca.'%" '
		);
	$query->execute();
 ?>
	<ul class="food">
		<?php foreach ($query as $row): ?>
			<li class="mancare sort-food" data-li="produs<?php echo $row['id_produs']; ?>" data-tag="<?php echo $row['categorie']; ?>" >
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
				
			</li>
		<?php endforeach; ?>
	</ul>

<script src="js/sort.js"></script>