<?php 


function register() {

	global $db;
	$register_email = $_POST["register_email"];
	$register_nume = $_POST["register_nume"];
	$register_password = $_POST["register_password"];

	if (isset($_POST['register-submit'])) {
		$find =$db->prepare('SELECT * FROM sac_utilizatori WHERE email = "'.$register_email.'"');
		$find->execute();
		if ($find->rowCount() == 1) {
			return false;
		} else {
			$hash = md5($register_password);
			$query =$db->prepare('INSERT INTO sac_utilizatori (email, nume, parola) VALUES (:email, :nume, :parola)');
			$query->bindParam(':email', $register_email);
			$query->bindParam(':nume', $register_nume);
			$query->bindParam(':parola', $hash);
			if($query->execute()) {
				return true;
			} else {
				return false;
			}
		}	
	}
}




 ?>