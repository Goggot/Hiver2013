<?php
	session_start();
	require_once("action/Constants.php");
	require_once("action/DAO/Connection.php");
	
	abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;
		public static $VISIBILITY_ADMIN = 2;
	
		private $pageVisibility;
	
		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
		}
	
		public function execute() {
			if (isset($_GET["logout"])) {
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
			
			// execution de l'enfant...
			$this->executeAction();
			Connection::closeConnection();
		}
		
		public function getUsername() {
			$username = "Invit�";
			
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