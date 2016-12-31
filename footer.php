

	 	<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/jquery.toastmessage.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script src="js/script.js"></script>


		<?php 


			if($_SESSION['logged_in'] == 2) {
				$html = "<script>";
				$html .= "$().toastmessage('showErrorToast', \"Reintrodu email-ul și parola!\")";
				$html .= "</script>";
				echo $html;
			}		

		if (isset($_POST['change-submit'])) {
			if (change_password()) {
				$html = "<script>";
				$html .= "$().toastmessage('showSuccessToast', \"Felicitări! Parola a fost schimbată cu succes!\")";
				$html .= "</script>";
				echo $html;
			} else {
				$html = "<script>";
				$html .= "$().toastmessage('showErrorToast', \"Oups! Reintrodu adresa de e-mail!\")";
				$html .= "</script>";
				echo $html;
			}
		}

		if (isset($_POST['register-submit'])) {
			if (register()) {
				$html = "<script>";
				$html .= "$().toastmessage('showSuccessToast', \"Felicitări ".$register_nume."! Ai fost înregistrat cu succes!\")";
				$html .= "</script>";
				echo $html;
			} else {
				$html = "<script>";
				$html .= "$().toastmessage('showErrorToast', \"Oups! A apărut o eroare la înregistrare! Alege o altă adresă de e-mail!\")";
				$html .= "</script>";
				echo $html;
			}
		}

		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
			$html = "<script>";
			$html .= "$().toastmessage('showSuccessToast', \"Bun venit ".$_SESSION['nume_utilizator']."!\")";
			$html .= "</script>";
			echo $html;
		}
		
		?>


	</body>
</html>

