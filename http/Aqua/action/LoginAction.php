<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");

	class LoginAction extends CommonAction {
		private $resultMessage = 0;
	
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}
		
		protected function executeAction() {
			if (!empty($_POST["username"]) && !empty($_POST["pwd"])) {
				
				$userInfo = UserDAO::authenticate($_POST["username"], $_POST["pwd"]);
				
				if (isset($userInfo)) {
					$_SESSION["loggedIn"] = $userInfo["visibility"];
					$_SESSION["username"] = $userInfo["real_name"];
					
					header("location:modif.php");
					exit;
				}
				else {
					$this->resultMessage = 2;
					$_SESSION["loggedIn"] = null;
				}
			}
		}
	
		public function getResultMessage() {
			return $this->resultMessage;
		}
	}