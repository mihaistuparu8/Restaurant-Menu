<?php 

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

	if (isset($_POST['submit'])) {
		$query =$db->prepare('SELECT * FROM sac_produse 
			WHERE ingrediente LIKE "%'.$sos_tomat.'%"'.
			'AND ingrediente LIKE "%'.$ardei.'%"'.
			'AND ingrediente LIKE "%'.$branză_mozzarella.'%"'.
			'AND ingrediente LIKE "%'.$ceapa.'%"'.
			'AND ingrediente LIKE "%'.$ciuperci.'%"'.
			'AND ingrediente LIKE "%'.$dublu_pepperoni.'%"'.
			'AND ingrediente LIKE "%'.$masline.'%"'.
			'AND ingrediente LIKE "%'.$porumb.'%"'.
			'AND ingrediente LIKE "%'.$rosii.'%"'.
			'AND ingrediente LIKE "%'.$sunca.'%"'
			);
		$query->execute();
	}

 ?>