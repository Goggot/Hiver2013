<?php
    require_once("action/CommonAction.php");
	require_once("action/DAO/ClientDAO.php");

    class IndexAction extends CommonAction{
		private $resultMessage = 0;
	
		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}
		
		protected function executeAction(){
			if (!empty($_POST["nomLogin"]) && !empty($_POST["mdpLogin"])){
				$userInfo = ClientDAO::authenticate($_POST["nomLogin"], $_POST["mdpLogin"]);
				
				if (isset($userInfo)){
					if ($userInfo["visibility"] == 0)
						$_SESSION["loggedIn"] = 1;
					else
						$_SESSION["loggedIn"] = 2;
					$_SESSION["codeauditeur"] = $userInfo["codeauditeur"];
					
					header("location:accueil.php");
					exit;
				}
				else{
					echo "Informations de login non valides";
					$this->resultMessage = 2;
					$_SESSION["loggedIn"] = NULL;
				}
			}
		}
	
		public function getResultMessage(){
			return $this->resultMessage;
		}
    }