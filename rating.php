<?php 
session_start();
require_once 'db.php';

$nume_produs = $_POST['produs'];
$rate = $_POST['rate'];
$user = $_SESSION['nume_utilizator'];
$id_user = $_SESSION['id_utilizator'];


$prod = $db->prepare('SELECT id_produs FROM sac_produse WHERE nume_produs = "'.$nume_produs.'"');
$prod->execute();

foreach($prod as $id) {
	$prod->fetch(PDO::FETCH_ASSOC);
	$id_produs = $id['id_produs'];
}

$insert = $db->prepare("INSERT INTO sac_rating (user_id, nume,id_produs, nume_produs, rating_number, created, modified) 
	VALUES('".$id_user."','".$user."','".$id_produs."','".$nume_produs."','".$rate."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')");

 	$prevRatingQuery = 'SELECT * FROM sac_rating WHERE user_id = "'.$id_user.'" AND id_produs = "'.$id_produs.'"';
 	
 	$prevRatingResult = $db->query($prevRatingQuery);
	if($prevRatingResult->rowCount() == 1) {
		$query = "UPDATE sac_rating SET rating_number = '".$rate."', modified = '".date("Y-m-d H:i:s")."' WHERE user_id = '".$id_user."' AND id_produs = '".$id_produs."'";
      $update = $db->query($query); //Updateaza votul
	} else {
		$insert->execute(); //insereaza votul
	}
		$media_prod = 'SELECT AVG(rating_number) FROM sac_rating WHERE id_produs = "'.$id_produs.'"';
		$media_result = $db->query($media_prod);
		foreach($media_result as $row) {
			$media_result->fetch(PDO::FETCH_ASSOC);
			$media = $row[0];
		}

		$voturi_prod = 'SELECT COUNT(*) FROM sac_rating WHERE id_produs = "'.$id_produs.'"';
		$voturi_result = $db->query($voturi_prod);
		foreach($voturi_result as $row2) {
			$voturi_result->fetch(PDO::FETCH_ASSOC);
			$voturi = $row2[0];
		}		

		$prevAverageQuery = 'SELECT * FROM sac_media_rating WHERE id_produs = "'.$id_produs.'"';
 		$prevAverageResult = $db->query($prevAverageQuery);
 		
 		if($prevAverageResult->rowCount() == 1) {
 			$average = 'UPDATE sac_media_rating SET voturi ="'.$voturi.'", media="'.$media.'" WHERE id_produs ="'.$id_produs.'"';
 			$updateAverage = $db->query($average);
 		} else {
 			$averageNew = 'INSERT INTO sac_media_rating (id_produs, nume_produs, voturi, media) 
 			VALUES ("'.$id_produs.'","'.$nume_produs.'","'.$voturi.'","'.$media.'")';
 			$updateNewAverage = $db->query($averageNew);
 		}

 ?>