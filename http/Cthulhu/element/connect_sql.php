<?php
	try
	{
		// On se connecte � MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=Skeuleush', 'pouet', 'Gainsbar91');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arr�te tout
		die('Erreur : '.$e->getMessage());
	} 
?>
