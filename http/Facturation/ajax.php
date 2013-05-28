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
	else if (isset($_POST["idC"]) )
		echo ClientDAO::rechercheClientID( $_POST["idC"] );
	else if ( isset( $_POST["idF"]) )
		echo FactureDAO::rechercheFactureParID( $_POST["idF"] );
	else if (isset($_POST["nom"]))
		echo ClientDAO::rechercheClientNom( $_POST["nom"]) ;
	else if(isset($_POST["titre"]) && isset($_POST["rep"]) && isset($_POST["optionConfig"]) )
		echo ClientDAO::optionClient($_POST["titre"] , $_POST["rep"] , $_POST["optionConfig"], $_POST["idClient"]) ;
	else if( isset($_POST["Client"]))
		echo ClientDAO::ajouterUnClient($_POST["repC1"], $_POST["repC2"], $_POST["repC3"], $_POST["repC4"], $_POST["repC5"], $_POST["repC6"]);
	else if(isset($_POST["DIF"]) && isset($_POST["idClient"]) )
		echo CLientDAO:: optionModifierClient( $_POST["DIF"] , $_POST["idClient"]);
	else if(isset($_POST["DelC"]))
		echo CLientDAO:: deleteClient($_POST["DelC"]);
	else if(isset($_POST["addFacture"]) )
		echo FactureDAO:: ajoutItem($_POST["tb"]);
	else if( isset($_POST["DifFacture"]) && isset($_POST["idFacture"])  )
		echo FactureDAO::modifItem( $_POST["DifFacture"] , $_POST["idFacture"]);
	else if(isset( $_POST["DelF"]))
		echo FactureDAO::deleteItem($_POST["DelF"]);
	

	/*else if( isset($_POST["Facture"]))
		echo ClientDAO::ajoutItem(); */