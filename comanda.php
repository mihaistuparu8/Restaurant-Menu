<?php 

$nume = $_POST['nume-livrare'];
$adresa = $_POST['adresa-livrare'];
$oras = $_POST['oras-livrare'];
$judet = $_POST['judet-livrare'];
$email = $_POST['email-livrare'];
$telefon = $_POST['telefon-livrare'];



if(isset($_POST['trimite-comanda'])) {
	$to  = $email; 
	$subject = 'Comanda restaurant online';
	$message = "Ai lansat urmatoarea comanda pe numele ".$nume." cu adresa ".$adresa.", nr de telefon ".$telefon.".Vei fi contactat telefonic pentru livrarea comenzii! ";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$result = mail($to, $subject, $message, $headers);

	echo (bool)$result;
}


 ?>