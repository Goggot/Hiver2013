<?php
    require_once('action/lib/nusoap.php');

    class Connection{
		public static function getConnection($login, $passwd){
			$soapClient = new nusoap_client('http://b63server.notes-de-cours.com/services.php', false);
			$error = $soapClient->getError();
			$key = null;
			
			if (empty($error)) {
				$key = $soapClient->call('connecter', array('nomUsager' => $login, 'motDePasse' => md5($passwd)));
				
				if ($key == "INVALID_USERNAME_PASSWORD" || $key == "USER_IS_BANNED"){
					echo "FUCK YOU";
				}
				else{
					$_SESSION["loggedIn"] = 1;
					$_SESSION["username"] = $_POST["login"];
					$_SESSION["key"] = $key;
					header("location:tchat.php");
					exit;
				}
				
				if ($soapClient->fault) {
					$error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
				}
			}
		}
	}