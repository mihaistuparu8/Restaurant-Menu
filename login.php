
<?php 
session_start();

require_once 'db.php';

function login() {

	global $db;
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	if (isset($_POST['login-submit'])) {
		$hash = md5($password);
		$login = $db->prepare('SELECT * FROM sac_utilizatori WHERE email = "'.$email.'" AND parola = "'.$hash.'"');
		$login->execute();
		if ($login->rowCount() == 1) {
			$user = $login->fetch(PDO::FETCH_ASSOC);	
			$_SESSION['nume_utilizator'] = $user['nume'];
			$_SESSION['logged_in'] = 1;
			return true;
		} else {
			
			return false;		
		}
	}
}

if(login()) {	
		
		header("Location: logged.php");
		exit();
		
	} else {
		$_SESSION['logged_in'] = 2;
		header("Location: index.php");
		exit();	
}



 ?>