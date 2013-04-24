<?php

	// Pour ceux qui ont le warning avec gettimeofday()
	date_default_timezone_set('America/New_York');

	// Insertion de la libraire NuSoap
	require_once('action/lib/nusoap.php'); 

	class IndexAction {
		private $resultat;

		public function __construct() {
		
		}
		
		public function execute() {
		
			if (isset($_POST["ageMin"]) && strlen($_POST["ageMin"]) > 0 && 
				isset($_POST["ageMax"]) && strlen($_POST["ageMax"]) > 0) {
				
				// construction de l'objet
				$soapClient = new nusoap_client('http://127.0.0.1:82/server/services.php', false);
				$err = $soapClient->getError();
				if ($err) {
					// erreur de connexion avec le serveur
					echo "(Erreur : )" . $err;
				}

				// appel de la fonction "getUsers" sur le serveur distant
				$result = $soapClient->call('getUsers', array('ageMin' => $_POST["ageMin"],
															  'ageMax' => $_POST["ageMax"]));
							
				
				if ($soapClient->fault) {
					// Erreur à l’appel de la fonction
					echo "<p>code: " . $soapClient->faultcode . " " . $soapClient->faultstring.  "</p>";
				} else {
					// Succès de l’appel ! On traite la valeur de retour
					
					if ($result != null) {
						$this->resultat = $result;
					}
				}
			}
		}
		
		public function getResultat() {
			return $this->resultat;
		}
	}