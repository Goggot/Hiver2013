<?php

	// Pour ceux qui ont le warning avec gettimeofday()
	date_default_timezone_set('America/New_York');
	
	// Insertion de la libraire NuSoap
	require_once('action/lib/nusoap.php'); 

	class ServicesAction {

		public function __construct() {
		
		}
		
		public function getUsers($ageMin, $ageMax) {
			$users = array();
			$users[] = array("Fred", 29);
			$users[] = array("Alain", 35);
			$users[] = array("François", 18);
			$users[] = array("Simon", 27);
			$users[] = array("Gabriel", 24);
			$users[] = array("Pierre", 45);
			$users[] = array("Jacques", 52);
			
			$result = array();
			
			foreach ($users as $user) {
				if ($user[1] >= $ageMin && $user[1] <= $ageMax) {
					$result[] = $user[0];
				}
			}
			
			return $result;
		}
	}