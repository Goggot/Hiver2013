<?php

    #date_default_timezone_set('America/New_York');
    session_start();
    require_once("action/DAO/Connection.php");
    require_once("action/DAO/Deconnection.php");
    
    abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;
	
		private $pageVisibility;
	
		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
		}

		public function execute() {
			if (isset($_GET["logout"])) {
				Deconnection::getDeconnected($_SESSION["key"]);
				session_unset();
				session_destroy();
				session_start();
			}
		
			if (!isset($_SESSION["loggedIn"])) {
				$_SESSION["loggedIn"] = CommonAction::$VISIBILITY_PUBLIC;
			}
		
			if ($_SESSION["loggedIn"] < $this->pageVisibility) {
				header("location:index.php");
				exit;
			}
			
			// execution de l'enfant
			$this->executeAction();
		}
	
		public function getUsername() {
			$username = "Invité";
			
			if (isset($_SESSION["username"])) {
				$username = $_SESSION["username"];
			}
			
			return $username;
		}
		
		public function isLoggedIn() {
			return $_SESSION["loggedIn"] > CommonAction::$VISIBILITY_PUBLIC;
		}

		protected abstract function executeAction();
    }