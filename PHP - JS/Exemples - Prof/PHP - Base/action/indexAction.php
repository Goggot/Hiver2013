<?php

	function execute() {
	
		if (isset($_POST["champCourriel"])) {
			// Le formulaire a été envoyé
			
			if ($_POST["champCourriel"] === "derek@cvm.qc.ca" &&
				$_POST["champMotDePasse"] === "AAAaaa111") {
				
				// redirection
				header("location:prive.php");
				exit;
			}
		}
	}