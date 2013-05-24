<?php


/* ---------------------------------------------------
 *
 *    Projet synthèse : H2013
 *    Fait Par : Erwan Palanque & Augustin Paiement
 *
 *--------------------------------------------------- */


    require_once("action/CommonAction.php");
	require_once("action/DAO/ClientDAO.php");

    class IndexAction extends CommonAction{
		private $resultMessage = 0;
	
		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}
		
		protected function executeAction(){
			if (!empty($_POST["nomLogin"]) && !empty($_POST["mdpLogin"])){
				$password = sha1($_POST["mdpLogin"] . GUERANDE);
				$userInfo = ClientDAO::authenticate($_POST["nomLogin"], $password);
				
				if (isset($userInfo)){
					$_SESSION["loggedIn"] = $userInfo["visibility"];
					$_SESSION["username"] = $userInfo["real_name"];
					
					header("location:client.php");
					exit;
				}
				else{
					echo "Informations de login non valides";
					$this->resultMessage = 2;
					$_SESSION["loggedIn"] = NULL;
				}
			}
		}

		public function retrievePasswd(){
			$message = "Veuillez entrer une adresse email.";
			if (!empty($_POST["email"])){
				$message = ClientDAO::forgotPasswd($_POST("email"));
			}
			return $message;
		}
	
		public function getResultMessage(){
			return $this->resultMessage;
		}
    }