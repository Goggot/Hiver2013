<?php
	session_start();

	function execute() {
	
		if (isset($_POST["champCourriel"])) {
			// Le formulaire a été envoyé
			
			if ($_POST["champCourriel"] === "derek@cvm.qc.ca" &&
				$_POST["champMotDePasse"] === "AAAaaa111") {
				
				$_SESSION["loggedIn"] = true;
				
				// redirection
				header("location:prive.php");
				exit;
			}
		}
	}
	
	
	
	
	
	
	
	
	
	