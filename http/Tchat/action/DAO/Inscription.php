<?php
	require_once('action/lib/nusoap.php');

    class Inscription{
		public static function getConnection($login, $passwd, $matricule, $prenom, $nom){
			$soapClient = new nusoap_client('http://b63server.notes-de-cours.com/services.php', false);
			$error = $soapClient->getError();
			$key = null;
			
			if (empty($error)) {
				$key = $soapClient->call('enregistrer', array('matricule' => $matricule, 'prenom' => $prenom, 'nom' => $nom, 'nomUsager' => $login, 'motDePasse' => md5($passwd)));
				
				if ($key == "USERNAME_ALREADY_IN_USE" || $key == "INVALID_STUDENT_CODE"){
					echo "FUCK YOU ";
				}
				else{
					$_SESSION["loggedIn"] = 1;
					$_SESSION["username"] = $_POST["login"];
					exit;
				}
				
				if ($soapClient->fault) {
					$error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
				}
			}
		}
	}