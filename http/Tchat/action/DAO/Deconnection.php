<?php
    require_once('action/lib/nusoap.php');

    class Deconnection{
		public static function getDeconnected($clef){
			$soapClient = new nusoap_client('http://apps-de-cours.com/web-chat/server/services.php', false);
			$error = $soapClient->getError();
			$key = null;
			
			if (empty($error)) {
				$key = $soapClient->call('deconnecter', array('clef' => $clef));
				
				if ($soapClient->fault) {
					$error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
					echo $error;
				}
			}
			
		}
	}