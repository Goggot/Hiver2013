<?php
	include("connect_sql.php");
	try
	{
		$req = $bdd->prepare('INSERT INTO News (titre, contenu) VALUES(?, ?)');
	    $req->execute(array($_POST['titre'], $_POST['contenu']));
		
		// Redirection du visiteur vers la page des nouveautés
   		header('Location:./nouveautes.php');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
?>