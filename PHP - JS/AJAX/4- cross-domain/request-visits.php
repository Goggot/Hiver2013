<?php
	$count = 0;

	if (isset($_GET["course"])) {
		if ($_GET["course"] === "Web") {
			$count = 123;
		}
		else if ($_GET["course"] === "DBA") {
			$count = 456;
		}
		else if ($_GET["course"] === "DB") {
			$count = 789;
		}
		else if ($_GET["course"] === "Linux") {
			$count = 890;
		}
	}
	
	// Dans un cas d'une requ�te Cross domain
	// i.e. la source du code client (html/js) ne vient pas m�me domaine que la destination
	echo $_GET['callback']."(".json_encode($count).");";
	
	// si c'�tait une requ�te du m�me serveur, j'aurais plut�t fait : 
	// echo $count; 

