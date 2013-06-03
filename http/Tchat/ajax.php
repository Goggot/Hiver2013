<?php
	require_once('action/CommonAction.php');
	require_once('action/DAO/Transaction.php');
	require_once('action/DAO/Inscription.php');
	
	if (isset($_POST["message"]))
		Transaction::envoieMessage($_SESSION["key"], $_POST["message"]);

	else if (isset($_POST["getMember"]))
		echo Transaction::getMembres($_SESSION["key"]);

	else if (isset($_POST["pseudo"]) && isset($_POST["password"]) && isset($_POST["matricule"]) && isset($_POST["prenom"]) && isset($_POST["nom"])){
		echo Inscription::getConnection($_POST["pseudo"],$_POST["password"], $_POST["matricule"], $_POST["prenom"], $_POST["nom"]);
	}
	else
		echo Transaction::getMessages($_SESSION["key"]);