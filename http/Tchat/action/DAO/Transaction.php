<?php
	require_once('action/lib/nusoap.php');

    class Transaction{
		public static function getMembres($key){
			$soapClient = new nusoap_client('http://apps-de-cours.com/web-chat/server/services.php', false);
			$error = $soapClient->getError();
			$liste = null;
			
			if (empty($error)) {
				$liste = $soapClient->call('listeDesMembres', array('clef' => $key));
				
				if ($soapClient->fault) {
					$error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
				}
			}
			return json_encode($liste);
		}
		
		public static function getMessages($key){
			$soapClient = new nusoap_client('http://apps-de-cours.com/web-chat/server/services.php', false);
			$error = $soapClient->getError();
			$liste = null;
			
			if (empty($error)) {
				$liste = $soapClient->call('lireMessages', array('clef' => $key));
				
				if ($soapClient->fault) {
					$error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
				}
			}
			return json_encode($liste);
		}
		
		public static function envoieMessage($key, $message){
			$soapClient = new nusoap_client('http://apps-de-cours.com/web-chat/server/services.php', false);
			$error = $soapClient->getError();
			
			if (empty($error)) {
				$soapClient->call('ecrireMessage', array('clef' => $key, 'message' => $message));
				
				if ($soapClient->fault) {
					$error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
				}
			}
		}
	}