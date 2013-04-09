<?php 
	function execute() {
		if (isset($_GET["searchBox"])){
			require_once("Utils.php");
			$spyList = getSpyList();
			
			$tabNom = array();
			$nom = $_GET["searchBox"];
			
			foreach ($spyList as $spy){
			# Fonctionne si le nom entier est passé...
				if (strcmp($spy,$nom)==0){
					$tabNom[] = $spy;
				}
			}
			return $tabNom;
		}
	}
?>