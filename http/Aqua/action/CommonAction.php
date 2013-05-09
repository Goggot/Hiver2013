<?php
	session_start();	
	require_once("action/Constants.php");
	require_once("action/DAO/Connection.php");
	require_once("action/Translator.php");
	
	abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;
		public static $VISIBILITY_MODERATOR = 2;
		public static $VISIBILITY_ADMIN = 3;
	
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
				header("location:login.php");
				exit;
			}
			
			// execution de l'enfant...
			$this->executeAction();
			Connection::closeConnection();
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
		
		public function translate($page, $node){
			$lang = "fr"; // langue par défaut du site
	
			if (!isset($_SESSION["lang"])) {
				$_SESSION["lang"] = $lang;
			}
			else {
				$lang = $_SESSION["lang"];
			}
			
			if (isset($_GET["lang"])) {
				$lang = $_GET["lang"];
				$_SESSION["lang"] = $lang;
			}
			
			$translator = new Translator($lang);
			return $result = $translator->read($page, $node);
		}
	
		protected abstract function executeAction();
	}