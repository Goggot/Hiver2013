<?php
    require_once('action/lib/nusoap.php');

    class Delete{
		public static function getDelete($clef){
			$soapClient = new nusoap_client('http://apps-de-cours.com/web-chat/server/services.php', false);
			$error = $soapClient->getError();
			$key = null;
			
			if (empty($error)) {
				$key = $soapClient->call('desenregistrer', array('clef' => $clef));
				
				if ($key == "INVALID_USERNAME_PASSWORD" || $key == "USER_IS_BANNED"){
					echo "FUCK YOU";
				}
				else{
					header("location:index.php?logout=1");
					exit;
				}
				
				if ($soapClient->fault) {
					$error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
					echo $error;
				}
			}
			
		}
	}