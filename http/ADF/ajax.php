<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/ClientDAO.php");

	$valid = null;

	if (isset($_POST["aMdp"]) && isset($_POST["nMdp"])){
		$userInfo = ClientDAO::authenticate($_SESSION["codeauditeur"], $_POST["aMdp"]);
		if (isset($userInfo))
			$valid = ClientDAO::changePasswd($_SESSION["codeauditeur"], $_POST["nMdp"]);
		else
			$valid = "Le mot de passe actuel est invalide...";
		echo $valid;
	}

	if (isset($_POST["codeauditeur"])){
		if (isset($_POST["codeauditeur"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["password"])
			  && isset($_POST["admin"]) && isset($_POST["rue"]) && isset($_POST["ville"]) && isset($_POST["codepostal"])
			  && isset($_POST["telephone"]) && isset($_POST["courriel"])){
			ClientDAO::ajouterClient($_POST["codeauditeur"], $_POST["nom"], $_POST["prenom"], $_POST["password"], $_POST["juge"], $_POST["statut"], $_POST["candidatjuge"], $_POST["admin"]);
			$valid = ClientDAO::ajouterCoordClient($_POST["rue"], $_POST["ville"], $_POST["codepostal"], $_POST["noregion"], $_POST["telephone"], $_POST["cell"], $_POST["courriel"]);
		}
		else{
			$valid = "Veuillez remplir tous les champs";
		}
		echo $valid;
	}