<?php
	date_default_timezone_set('America/New_York');

	require_once('action/lib/nusoap.php'); 

	class IndexAction {
		public $key;
		public $error;

		public function __construct() {
		}
		
		public function execute() {		
			$soapClient = new nusoap_client('http://b63server.notes-de-cours.com/services.php', false);
			$this->error = $soapClient->getError();
			
			if (empty($this->error)) {
				$this->key = $soapClient->call('connecter', array('nomUsager' => "guest", 'motDePasse' => md5("guest")));
				
				if ($soapClient->fault) {
					$this->error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
				} 
			}
		}
	}