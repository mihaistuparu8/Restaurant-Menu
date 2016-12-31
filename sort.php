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

	$query =$db->prepare('SELECT * FROM sac_produse 
		WHERE ingrediente LIKE "%'.$sos_tomat.'%"'.
		'AND ingrediente LIKE "%'.$ardei.'%"'.
		'AND ingrediente LIKE "%'.$branza_mozzarella.'%"'.
		'AND ingrediente LIKE "%'.$ceapa.'%"'.
		'AND ingrediente LIKE "%'.$ciuperci.'%"'.
		'AND ingrediente LIKE "%'.$dublu_pepperoni.'%"'.
		'AND ingrediente LIKE "%'.$masline.'%"'.
		'AND ingrediente LIKE "%'.$porumb.'%"'.
		'AND ingrediente LIKE "%'.$rosii.'%"'.
		'AND ingrediente LIKE "%'.$sunca.'%"'
		);
	$query->execute();

 ?>

	<?php foreach ($query as $row): ?>
		<li class="mancare" data-tag="<?php echo $row['categorie']; ?>" data-li="produs<?php echo $row['id_produs']; ?>">
			<h4 class="pizaa">
				<?php echo $row['nume_produs']; ?> 
				<span class="badge pret">
					<?php echo $row['pret']; ?>
				</span>
		  </h4>
		  <div class="inner-rating">
				<div id='rate' class="rating">
			    <input class="stars" type="radio" id="star5" name="rating<?php echo $row['id_produs']; ?>" value="5" />
			    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
			    <input class="stars" type="radio" id="star4half" name="rating<?php echo $row['id_produs']; ?>" value="4.5" />
			    <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
			    <input class="stars" type="radio" id="star4" name="rating<?php echo $row['id_produs']; ?>" value="4" />
			    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
			    <input class="stars" type="radio" id="star3half" name="rating<?php echo $row['id_produs']; ?>" value="3.5" />
			    <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
			    <input class="stars" type="radio" id="star3" name="rating<?php echo $row['id_produs']; ?>" value="3" />
			    <label class = "full" for="star3" title="Meh - 3 stars"></label>
			    <input class="stars" type="radio" id="star2half" name="rating<?php echo $row['id_produs']; ?>" value="2.5" />
			    <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
			    <input class="stars" type="radio" id="star2" name="rating<?php echo $row['id_produs']; ?>" value="2" />
			    <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
			    <input class="stars" type="radio" id="star1half" name="rating<?php echo $row['id_produs']; ?>" value="1.5" />
			    <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
			    <input class="stars" type="radio" id="star1" name="rating<?php echo $row['id_produs']; ?>" value="1" />
			    <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
			    <input class="stars" type="radio" id="starhalf" name="rating<?php echo $row['id_produs']; ?>" value="0.5" />
			    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
				</div>
			</div>
			<p class="p-ingrediente"><?php echo $row['ingrediente']; ?></p>
		</li>

	<?php endforeach; ?>