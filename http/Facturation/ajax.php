<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/ClientDAO.php");
	require_once("action/DAO/FactureDAO.php");

	if (isset($_POST["email"]))
		echo ClientDAO::forgotPasswd($_POST["email"]);
	else if (isset($_POST["noFacture"]))
		echo FactureDAO::rechercheFactureParID($_POST["noFacture"]);
	else if (isset($_POST["dateFacture"]))
		echo FactureDAO::rechercheFactureParDate($_POST["dateFacture"]);
	else if (isset($_POST["id"]))
		echo ClientDAO::rechercheClientID( $_POST["id"] );
	else if (isset($_POST["nom"]))
		echo ClientDAO::rechercheClientNom( $_POST["nom"]);
	else if(isset($_POST["titre"]) && isset($_POST["rep"]) && isset($_POST["optionConfig"]))
		echo ClientDAO::optionClient( isset($_POST["titre"]) , isset($_POST["rep"]) , isset($_POST["optionConfig"])) ;
	else if( isset($_POST["FF"]))
		echo ClientDAO::ajoutItem(); 
	else if( isset($_POST["CC"]))
		echo ClientDAO::ajouterUnClient($_POST["repC1"], $_POST["repC2"], $_POST["repC3"], $_POST["repC4"], $_POST["repC5"], $_POST["repC6"]);