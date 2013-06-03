<?php
	require_once('action/lib/nusoap.php');
	require_once('Connection.php');

    class Inscription{
		public static function getConnection($login, $passwd, $matricule, $prenom, $nom){
			$soapClient = new nusoap_client('http://apps-de-cours.com/web-chat/server/services.php', false);
			$error = $soapClient->getError();
			$key = null;
			$message = null;
			
			if (empty($error)) {
				$key = $soapClient->call('enregistrer', array('matricule' => $matricule, 'prenom' => $prenom, 'nom' => $nom, 'nomUsager' => $login, 'motDePasse' => md5($passwd)));

				if ($key == "SUCCESS"){
					$_SESSION["loggedIn"] = 1;
					$_SESSION["username"] = $login;
					$message = "Succès !";
				}
				
				else{
					$message = "Matricule invalide ou déjà enregistré...";
				}
				
				if ($soapClient->fault) {
					$error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
				}
				
				return $erreur;
			}
		}
	}