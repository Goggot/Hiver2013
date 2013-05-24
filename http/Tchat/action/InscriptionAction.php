<?php
    #date_default_timezone_set('America/New_York');
    require_once('action/lib/nusoap.php');
    require_once('action/CommonAction.php');
	require_once('action/DAO/Inscription.php');

    class InscriptionAction extends CommonAction{
		private $error;
		
        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
        }
        
        public function executeAction() {
			if (isset($_POST["login"]) && isset($_POST["passwd"]) && isset($_POST["matricule"]) && isset($_POST["prenom"]) && isset($_POST["nom"])){
				Inscription::getConnection($_POST["login"],$_POST["passwd"], $_POST["matricule"], $_POST["prenom"], $_POST["nom"]);
			}
        }
    }