<?php 

function change_password() {

	global $db;
	$change_email = $_POST["change_email"];
	$change_password = $_POST["change_password"];

	if (isset($_POST['change-submit'])) {
		$find =$db->prepare('SELECT * FROM sac_utilizatori WHERE email = "'.$change_email.'"');
		$find->execute();
		if ($find->rowCount() != 1) {
			return false;
	  } else {
	  	$hash = md5($change_password);
			$query =$db->prepare('UPDATE sac_utilizatori SET parola = "'.$hash.'" WHERE email = "'.$change_email.'"');
			if($query->execute()) {
				return true;
			} else {
				return false;
			}
	  }		
	}
}




 ?>